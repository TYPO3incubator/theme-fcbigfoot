<?php

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items']['3']['label'] =
    'LLL:EXT:football/Resources/Private/Language/locallang_db.tt_content.hero.xlf:title';

$temporaryColumns = [
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    $temporaryColumns
);

$GLOBALS['TCA']['tt_content']['types']['image'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
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
