<?php

declare(strict_types=1);

namespace SurfcampTeam4\Football\DataProcessing;

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
            // ToDo: Get absolute Uri for file link
            $jsonFileUrl = $linkFactory->createUri($jsonFile);

            $targetVariableName = $cObj->stdWrapValue('as', $processorConfiguration, 'jsonData');
            $processedData[$targetVariableName] = json_decode(file_get_contents($jsonFileUrl->getUrl()), true);
        }

        return $processedData;
    }
}
