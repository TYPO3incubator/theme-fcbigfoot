<?php

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
    'ctrl' => [
        'title' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_button',
        'label' => 'label',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'hideTable' => true,
        'searchFields' => 'label, link',
        'typeicon_classes' => [
            'default' => 'actions-link',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'label, link'],
    ],
    'columns' => [
        'label' => [
            'exclude' => true,
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_button.label',
            'config' => [
                'type' => 'text',
                'rows' => 1,
                'cols' => 30,
                'eval' => 'trim',
            ],
        ],
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:fcbigfoot/Resources/Private/Language/locallang_db.xlf:tx_fcbigfoot_domain_model_button.link',
            'config' => [
                'type' => 'link',
                'eval' => 'trim',
                'required' => true,
            ],
        ],
    ],
];
