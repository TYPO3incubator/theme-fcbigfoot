<?php

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
    'ctrl' => [
        'title' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_sponsor',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'hideTable' => true,
        'searchFields' => 'title, url',
        'typeicon_classes' => [
            'default' => 'actions-link',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'title, url, image'],
    ],
    'columns' => [
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_sponsor.title',
            'config' => [
                'type' => 'text',
                'rows' => 1,
                'cols' => 30,
                'eval' => 'trim',
            ],
        ],
        'url' => [
            'exclude' => true,
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_sponsor.url',
            'config' => [
                'type' => 'link',
                'eval' => 'trim',
            ],
        ],
        'image' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.images',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
    ],
];
