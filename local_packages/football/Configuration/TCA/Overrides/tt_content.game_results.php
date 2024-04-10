<?php

defined('TYPO3') || die();

call_user_func(function () {

    $ext = 'football';
    $cType = 'game_results';
    $languageFile =  'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements/' . $cType . '.xlf';

    // Adds the content element to the "Type" dropdown
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => $languageFile . ':title',
            'value' => $cType,
            'icon' => 'actions-dice',
            'group' => 'default',
            'description' => $languageFile . ':description',
        ],
    );

    // add the icon to the typeicon_class
    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$cType] = 'actions-dice';

    // Configure the default backend fields for the content element
    $GLOBALS['TCA']['tt_content']['types'][$cType] = [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                --linebreak--,header,
                --linebreak--,game_results_mode,
                --linebreak--,file_link,
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
        'columnsOverrides' => [
            'file_link' => [
                'label' => $languageFile . ':file_link',
            ],
        ]
    ];
});
