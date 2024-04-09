<?php

defined('TYPO3') or die('Access denied.');
call_user_func(function () {
    $ext = 'football';
    $table = 'tt_content';
    $dbLanguageFile = 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.xlf';

    $fields = [
        'file_link' => [
            'label' => $dbLanguageFile . ':tt_content.file_link',
            'config' => [
                'type' => 'link',
                'eval' => 'trim',
                'required' => true,
                'allowedTypes' => ['file', 'url'],
                'appearance' => [
                    'allowedOptions' => [],
                    'allowedExtensions' => ['json']
                ]
            ]
        ]
    ];

    /**
     * add fields to tt_content
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns($table, $fields);
});
