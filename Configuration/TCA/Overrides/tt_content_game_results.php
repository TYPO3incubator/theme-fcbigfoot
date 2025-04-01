<?php

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') || die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    [
        'fcbigfoot_game_results_mode' => [
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tt_content.fcbigfoot_game_results_mode',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tt_content.fcbigfoot_game_results_mode.slider', 'slider'],
                    ['LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tt_content.fcbigfoot_game_results_mode.table', 'table'],
                ],
                'default' => 'slider',
            ],
        ],
        'fcbigfoot_file_link' => [
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tt_content.fcbigfoot_file_link',
            'config' => [
                'type' => 'link',
                'eval' => 'trim',
                'required' => true,
                'allowedTypes' => ['file', 'url'],
                'appearance' => [
                    'allowedOptions' => [],
                    'allowedFileExtensions' => ['json'],
                ],
            ],
        ],
    ],
);

ExtensionManagementUtility::addRecordType(
    [
        'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.game_results.title',
        'description' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.game_results.description',
        'value' => 'game_results',
        'icon' => 'content-trophy',
        'group' => 'fcbigfoot',
    ],
    '
            --palette--;;headers,
            fcbigfoot_game_results_mode,
            fcbigfoot_file_link,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
    '
);
