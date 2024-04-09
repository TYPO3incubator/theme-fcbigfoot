<?php

/*
 *
 * Dieses Programm einschließlich Programmdaten und Dokumentation unterliegt den ausschließlichen Rechten von
 * "queo GmbH", soweit nicht anders gekennzeichnet. Insbesondere jede Vervielfältigung, Verbreitung oder
 * Zugänglichmachung dieses Programms oder Teilen davon sowie die Unterlizenzierung oder Weitergabe bedarf der
 * vorherigen Zustimmung der "queo GmbH" (Lizenz). Unzulässig sind die Bearbeitung oder andere
 * Umarbeitungen des Programms ohne Zustimmung der "queo GmbH". Unberührt bleiben die
 * Rechte nach §§ 69 d) Abs. 2 und 3 sowie e) UrhG. Die Entfernung dieses Rechtehinweises ist untersagt.
 *
 * User: kreitz
 * Date: 19.01.2024
 * Time: 14:15
 */

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
            'group' => 'common',
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
