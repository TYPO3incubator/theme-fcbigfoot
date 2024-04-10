<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(static function() {
    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.sponsors.xlf:title',
            'value' => 'sponsors',
            'icon' => 'actions-heart-alt',
        ]
    );

    $temporaryColumns = [
        'sponsors' => [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.sponsors.xlf:sponsors',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_football_domain_model_sponsor',
                'foreign_table_field' => 'parenttable',
                'foreign_field' => 'parentid',
                'appearance' => [
                    'useSortable' => true
                ],
            ],
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        $temporaryColumns
    );

    $GLOBALS['TCA']['tt_content']['types']['sponsors'] = [
        'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
            sponsors,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
            rowDescription,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    ];
});
