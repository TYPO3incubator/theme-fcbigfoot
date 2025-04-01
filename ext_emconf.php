<?php

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'FC Bigfoot Theme',
    'description' => 'TYPO3 theme for the football club FC Bigfoot',
    'category' => 'distribution',
    'state' => 'stable',
    'author' => 'The TYPO3 Community',
    'author_email' => 'info@typo3.org',
    'author_company' => '',
    'version' => '0.1.1',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
