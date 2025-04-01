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
        'fcbigfoot_teaser' => [
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tt_content.fcbigfoot_teaser',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_fcbigfoot_domain_model_teaser',
                'foreign_table_field' => 'parenttable',
                'foreign_field' => 'parentid',
                'maxitems' => 4,
                'appearance' => [
                    'useSortable' => true,
                ],
            ],
        ],
    ]
);

ExtensionManagementUtility::addRecordType(
    [
        'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.teaser_group.title',
        'description' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.teaser_group.description',
        'value' => 'teaser_group',
        'icon' => 'content-card-group',
        'group' => 'fcbigfoot',
    ],
    '
            --palette--;;headers,
            bodytext,
            fcbigfoot_teaser,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
    ',
    [
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
                    'enableRichtext' => true,
                ],
            ],
        ],
    ],
);
