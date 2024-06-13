<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(static function() {

    $ext = 'football';
    $cType = 'persons_overview';
    $languageFile =  'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.tt_content.' . $cType . '.xlf';

    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => $languageFile . ':title',
            'value' => $cType,
            'group' => 'special',
            'icon' => 'actions-users',
            'description' => $languageFile . ':description',
        ]
    );

    $temporaryColumns = [
        'persons' => [
            'label' => $languageFile . ':persons',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_football_domain_model_person',
                'foreign_table_field' => 'parenttable',
                'foreign_field' => 'parentid',
                'minitems' => 1,
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

    // add the icon to the typeicon_class
    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$cType] = 'actions-users';

    $GLOBALS['TCA']['tt_content']['types'][$cType] = [
        'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
            persons,
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
