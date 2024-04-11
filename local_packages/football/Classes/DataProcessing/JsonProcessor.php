<?php

declare(strict_types=1);

namespace SurfcampTeam4\Football\DataProcessing;

use TYPO3\CMS\Core\Exception\SiteNotFoundException;
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
            // get the jsonData as array and put it in the processedData
            $processedData[$targetVariableName] = json_decode(file_get_contents($jsonFileUrl), true);
        }

        return $processedData;
    }
}
