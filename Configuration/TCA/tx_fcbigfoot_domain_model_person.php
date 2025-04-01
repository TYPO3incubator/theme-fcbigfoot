<?php

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
    'ctrl' => [
        'title' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_person',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'hideTable' => true,
        'searchFields' => 'name',
        'typeicon_classes' => [
            'default' => 'actions-user',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'name, image'],
    ],
    'columns' => [
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_person.name',
            'config' => [
                'type' => 'text',
                'rows' => 1,
                'cols' => 30,
                'eval' => 'trim',
            ],
        ],
        'image' => [
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_person.image',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
    ],
];
