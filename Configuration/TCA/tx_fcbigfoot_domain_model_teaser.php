<?php

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
    'ctrl' => [
        'title' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_teaser',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'hideTable' => true,
        'searchFields' => 'name',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
        'typeicon_classes' => [
            'default' => 'content-card',
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'name, image, link'],
    ],
    'columns' => [
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_teaser.name',
            'config' => [
                'type' => 'input',
                'size' =>  50,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'image' => [
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_teaser.image',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_teaser.link',
            'config' => [
                'type' => 'link',
                'eval' => 'trim',
            ],
        ],
    ],
];
