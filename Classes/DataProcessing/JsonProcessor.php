<?php

declare(strict_types=1);

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace TYPO3Incubator\ThemeFCBigfoot\DataProcessing;

use TYPO3\CMS\Core\Exception\SiteNotFoundException;
use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Class JsonProcessor
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
     * @param ContentObjectRenderer $contentObjectRenderer
     * @param array $contentObjectConfiguration
     * @param array $processorConfiguration
     * @param array $processedData
     * @return array
     * @throws SiteNotFoundException
     */
    public function process(
        ContentObjectRenderer $contentObjectRenderer,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ): array {
        if (isset($processorConfiguration['if.']) && !$contentObjectRenderer->checkIf($processorConfiguration['if.'])) {
            return $processedData;
        }
        $jsonFile = $contentObjectRenderer->stdWrapValue('jsonFile', $processorConfiguration ?? []);

        if (is_string($jsonFile) && $jsonFile != '') {
            $jsonFileUrl = $contentObjectRenderer->typolink_URL([
                'parameter' => $jsonFile,
                'forceAbsoluteUrl' => true,
            ]);
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
                            'headers' => ['Authorization' => 'Basic ' . $credentials],
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
            $targetVariableName = $contentObjectRenderer->stdWrapValue('as', $processorConfiguration, 'jsonData');
            $processedData[$targetVariableName] = json_decode($content, true);
        }

        return $processedData;
    }
}
