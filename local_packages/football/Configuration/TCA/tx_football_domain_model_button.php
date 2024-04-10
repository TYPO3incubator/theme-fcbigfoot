<?php

$ext = 'football';
$table = 'tx_football_domain_model_button';
$dbLangFile = 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.xlf';

return [
    'ctrl' => [
        'title' => $dbLangFile . ':' . $table,
        'label' => 'text',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'searchFields' => 'text, link',
        'typeicon_classes' => [
            'default' => 'actions-link',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ]
    ],
    'types' => [
        '1' => ['showitem' => 'text, link'],
    ],
    'columns' => [
        'text' => [
            'exclude' => true,
            'label' => $dbLangFile . ':' . $table . '.text',
            'config' => [
                'type' => 'text',
                'rows' => 1,
                'eval' => 'trim'
            ],
        ],
        'link' => [
            'l10n_mode' => 'mergeIfNotBlank',
            'exclude' => 1,
            'label' => $dbLangFile . ':' . $table . '.link',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim',
                'required' => 1,
                'renderType' => 'inputLink',
            ],
        ],
    ],
];
