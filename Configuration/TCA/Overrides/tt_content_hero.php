<?php
declare(strict_types=1);

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    [
        'fcbigfoot_button_text' => [
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tt_content.fcbigfoot_button_text',
            'config' => [
                'type' => 'input',
                'size' =>  50,
                'eval' => 'trim',
            ],
        ],
        'fcbigfoot_button_link' => [
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tt_content.fcbigfoot_button_link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 50,
                'eval' => 'trim',
            ],
        ],
    ]
);

ExtensionManagementUtility::addRecordType(
    [
        'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.hero.title',
        'description' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.hero.description',
        'value' => 'hero',
        'icon' => 'content-header',
        'group' => 'fcbigfoot',
    ],
    '
            --palette--;;headers,
            image,
            fcbigfoot_button_text,
            fcbigfoot_button_link,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
    ',
    [
        'columnsOverrides' => [
            'image' => [
                'config' => [
                    'minitems' => 1,
                    'maxitems' => 1,
                    'appearance' => [
                        'enabledControls' => ['hide' => false],
                    ],
                ],
            ],
        ],
    ],
);
