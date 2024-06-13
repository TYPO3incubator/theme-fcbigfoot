<?php

$ext = 'football';
$table = 'tx_football_domain_model_person';
$dbLangFile = 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.xlf';

return [
    'ctrl' => [
        'title' => $dbLangFile . ':' . $table,
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'searchFields' => 'name',
        'typeicon_classes' => [
            'default' => 'actions-user',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ]
    ],
    'types' => [
        '1' => ['showitem' => 'name, image'],
    ],
    'columns' => [
        'name' => [
            'exclude' => true,
            'label' => $dbLangFile . ':' . $table . '.name',
            'config' => [
                'type' => 'text',
                'rows' => 1,
                'cols' => 30,
                'eval' => 'trim',
            ]
        ],
        'image' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.images',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'minitems' => 1,
                'maxitems' => 1,
            ]
        ],
    ],
];
