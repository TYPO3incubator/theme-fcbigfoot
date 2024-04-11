<?php

$ext = 'football';
$table = 'tx_football_domain_model_sponsor';
$dbLangFile = 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.xlf';

return [
    'ctrl' => [
        'title' => $dbLangFile . ':' . $table,
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'searchFields' => 'title, url',
        'typeicon_classes' => [
            'default' => 'actions-link',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ]
    ],
    'types' => [
        '1' => ['showitem' => 'title, url, image'],
    ],
    'columns' => [
        'url' => [
            'exclude' => true,
            'label' => $dbLangFile . ':' . $table . '.url',
            'config' => [
                'type' => 'link',
                'eval' => 'trim',
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => $dbLangFile . ':' . $table . '.title',
            'config' => [
                'type' => 'text',
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
