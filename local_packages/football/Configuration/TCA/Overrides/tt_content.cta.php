<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(static function() {
    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.cta.xlf:title',
            'value' => 'cta',
            'group' => 'default',
            'description' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.cta.xlf:description',
            'icon' => 'mimetypes-x-content-text',
        ]
    );

    $temporaryColumns = [
        'buttons' => [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.cta.xlf:buttons',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_football_domain_model_button',
                'appearance' => [
                    'showSynchronizationLink' => 1,
                    'showAllLocalizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                ],
            ],
        ],
        'button_text' => [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.cta.xlf:button_text',
            'config' => [
                'type' => 'input',
                'size' =>  50,
                'eval' => 'trim'
            ]
        ],
        'button_link' => [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.cta.xlf:button_link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 50,
                'eval' => 'trim',
            ],
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        $temporaryColumns
    );

    $GLOBALS['TCA']['tt_content']['types']['cta'] = [
        'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            buttons,
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
