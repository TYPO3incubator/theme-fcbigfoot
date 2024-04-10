<?php

defined('TYPO3') or die('Access denied.');
call_user_func(function () {
    $ext = 'football';
    $table = 'tt_content';
    $dbLanguageFile = 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.xlf';

    $fields = [
        'file_link' => [
            'label' => $dbLanguageFile . ':' . $table . '.file_link',
            'config' => [
                'type' => 'link',
                'eval' => 'trim',
                'required' => true,
                'allowedTypes' => ['file', 'url'],
                'appearance' => [
                    'allowedOptions' => [],
                    'allowedFileExtensions' => ['json']
                ]
            ]
        ],
        'game_results_mode' => [
            'label' => $dbLanguageFile . ':' . $table . '.game_results_mode',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [$dbLanguageFile . ':' . $table . '.game_results_mode.slider', 'slider'],
                    [$dbLanguageFile . ':' . $table . '.game_results_mode.table', 'table']
                ],
                'default' => 'slider'
            ]
        ]
    ];

    /**
     * add fields to tt_content
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns($table, $fields);
});
