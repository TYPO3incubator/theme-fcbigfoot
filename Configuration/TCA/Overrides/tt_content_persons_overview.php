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
        'fcbigfoot_persons' => [
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tt_content.fcbigfoot_persons',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_fcbigfoot_domain_model_person',
                'foreign_table_field' => 'parenttable',
                'foreign_field' => 'parentid',
                'minitems' => 1,
                'appearance' => [
                    'useSortable' => true,
                ],
            ],
        ],
    ],
);

ExtensionManagementUtility::addRecordType(
    [
        'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.persons_overview.title',
        'description' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:CType.persons_overview.description',
        'value' => 'persons_overview',
        'icon' => 'content-user',
        'group' => 'fcbigfoot',
    ],
    '
            --palette--;;headers,
            fcbigfoot_persons,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
    '
);
