<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(static function() {
    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.hero.xlf:title',
            'value' => 'hero',
            'icon' => 'mimetypes-x-content-text',
        ]
    );

    $temporaryColumns = [
        'header' => [
            'config' => [
                'type' => 'text',
                'cols' => 20,
                'rows' => 2,
            ]
        ],
        'button_text' => [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.hero.xlf:button_text',
            'config' => [
                'type' => 'input',
                'size' =>  50,
                'eval' => 'trim'
            ]
        ],
        'button_link' => [
            'label' => 'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.hero.xlf:button_link',
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

    $GLOBALS['TCA']['tt_content']['types']['hero'] = [
        'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            button_text,
            button_link,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:images,
            image,
            --palette--;;mediaAdjustments,
            --palette--;;gallerySettings,
            --palette--;;imagelinks,
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
