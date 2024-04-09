<?php

$ext = 'football';
$type = 'tx_football_domain_model_link';
$langDB = 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.xlf';

return [
    'ctrl' => [
        'title' => $langDB . ':' . $type,
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
        '1' => ['showitem' => 'url, title, icon'],
    ],
    'columns' => [
        'url' => [
            'exclude' => true,
            'label' => $langDB . ':' . $type . '.url',
            'config' => [
                'type' => 'link',
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => $langDB . ':' . $type . '.title',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => 30
            ]
        ],
        'icon' => [
            'exclude' => true,
            'label' => $langDB . ':' . $type . '.icon',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'Select'
                    ],
                    [
                        'label' => 'Discord',
                        'icon' => 'actions-brand-discord',
                        'value' => 'discord'
                    ],
                    [
                        'label' => 'Facebook',
                        'icon' => 'actions-brand-facebook',
                        'value' => 'facebook'
                    ],
                    [
                        'label' => 'Instagram',
                        'icon' => 'actions-brand-instagram',
                        'value' => 'instagram'
                    ],
                    [
                        'label' => 'LinkedIn',
                        'icon' => 'actions-brand-linkedin',
                        'value' => 'linkedin'
                    ],
                    [
                        'label' => 'Mastodon',
                        'icon' => 'actions-brand-mastodon',
                        'value' => 'mastodon'
                    ],
                    [
                        'label' => 'Threads',
                        'icon' => 'actions-brand-threads',
                        'value' => 'threads'
                    ],
                    [
                        'label' => 'X',
                        'icon' => 'actions-brand-x',
                        'value' => 'x'
                    ],
                    [
                        'label' => 'Xing',
                        'icon' => 'actions-brand-xing',
                        'value' => 'xing'
                    ],
                    [
                        'label' => 'YouTube',
                        'icon' => 'actions-brand-youtube',
                        'value' => 'youtube'
                    ],
                ],
            ]
        ],
    ],
];
