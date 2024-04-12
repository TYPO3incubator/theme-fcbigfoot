<?php

declare(strict_types=1);

namespace SurfcampTeam4\Football\DataProcessing;

use TYPO3\CMS\Core\Exception\SiteNotFoundException;
use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Frontend\Typolink\LinkFactory;

/**
 * Class JsonProcessor
 * @package SurfcampTeam4\Football\DataProcessing
 */
class JsonProcessor implements DataProcessorInterface
{
    /**
     * @var RequestFactory
     */
    private RequestFactory $requestFactory;

    public function __construct(
        RequestFactory $requestFactory,
    ) {
        $this->requestFactory = $requestFactory;
    }

    /**
     * @param ContentObjectRenderer $cObj
     * @param array $contentObjectConfiguration
     * @param array $processorConfiguration
     * @param array $processedData
     * @return array
     * @throws SiteNotFoundException
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ): array {
        if (isset($processorConfiguration['if.']) && !$cObj->checkIf($processorConfiguration['if.'])) {
            return $processedData;
        }
        $jsonFile = $cObj->stdWrapValue('jsonFile', $processorConfiguration ?? []);

        if (
            is_string($jsonFile)
            && $jsonFile != ''
        ) {
            $linkFactory = GeneralUtility::makeInstance(LinkFactory::class);
            $jsonFile = $linkFactory->createUri($jsonFile);
            $jsonFileUrl = $jsonFile->getUrl();

            // if link is a file we need to create an absolute link with siteFinder
            if ($jsonFile->getType() == 'file') {
                $sitePid = $processedData['data']['pid'];
                $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
                $site = $siteFinder->getSiteByPageId($sitePid);
                $jsonFileUrl = $site->getBase()->getScheme() . '://' . $site->getBase()->getHost() . $jsonFileUrl;
            }

            $targetVariableName = $cObj->stdWrapValue('as', $processorConfiguration, 'jsonData');
            $content = file_get_contents($jsonFileUrl);
            if (
                isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['http_basic_auth_user'])
                && $GLOBALS['TYPO3_CONF_VARS']['SYS']['http_basic_auth_pwd']
            ) {
                $credentials = base64_encode(
                    $GLOBALS['TYPO3_CONF_VARS']['SYS']['http_basic_auth_user']
                    . ':' . $GLOBALS['TYPO3_CONF_VARS']['SYS']['http_basic_auth_pwd']
                );
                try {
                    $response = $this->requestFactory->request(
                        $jsonFileUrl,
                        'GET',
                        [
                            'headers' => ['Authorization' => 'Basic ' . $credentials]
                        ]
                    );
                    $content = $response->getBody()->getContents();
                } catch (\Exception $e) {
                    $content = false;
                }
            }

            if ($content === false) {
                return $processedData;
            }

            // get the jsonData as array and put it in the processedData
            $processedData[$targetVariableName] = json_decode($content, true);
        }

        return $processedData;
    }
}
