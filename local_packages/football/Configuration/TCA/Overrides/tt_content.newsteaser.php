<?php
declare(strict_types=1);

defined('TYPO3') || die();

call_user_func(static function() {
    $ext = 'football';
    $cType = 'news_teaser';

    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.tt_content.' . $cType . '.xlf:title',
            'value' => $cType,
            'group' => 'special',
            'icon' => 'content-news',
            'description' => 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.tt_content.' . $cType . '.xlf:description',
        ]
    );

    // add the icon to the typeicon_class
    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$cType] = 'content-news';

    $GLOBALS['TCA']['tt_content']['types'][$cType] = [
        'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            header,header_layout,
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
