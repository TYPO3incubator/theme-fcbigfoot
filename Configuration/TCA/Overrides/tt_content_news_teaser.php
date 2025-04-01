<?php
declare(strict_types=1);

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') || die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addRecordType(
    [
        'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.news_teaser.title',
        'description' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.news_teaser.description',
        'value' => 'news_teaser',
        'icon' => 'content-news',
        'group' => 'fcbigfoot',
    ],
    '
            --palette--;;headers,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
    '
);
