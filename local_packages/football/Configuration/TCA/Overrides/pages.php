<?php
defined('TYPO3') or die('Access denied.');
call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'football';
    $table = 'pages';

    $fields = [
        'data_privacy' => [
            'label' => 'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:pages.data_privacy',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'link',
                'allowedTypes' => ['page','url'],
            ],
        ],
        'copyright' => [
            'label' => 'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:pages.copyright',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'input',
                'size' => 100
            ],
        ],
        'social' => [
            'label' => 'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:pages.social',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_football_domain_model_link',
                'foreign_table_field' => 'parenttable',
                'foreign_field' => 'parentid',
                'appearance' => [
                    'useSortable' => true
                ],
                'overrideChildTca' => [
                    'types' => [
                        [
                            'showitem' => 'url,icon'
                        ],
                    ],
                    'columns' => [
                        'url' => [
                            'config' => [
                                'allowedTypes' => ['page', 'url'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    /**
     * add fields to pages
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns($table, $fields);

    /**
     * add new palette for footer config
     */
    $GLOBALS['TCA']['pages']['palettes']['footer'] = [
        'label' => 'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:pages.palettes.footer',
        'showitem' => 'data_privacy,--linebreak--,copyright,--linebreak--,social'
    ];

    /**
     * Add palette footer in new tab in pages
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        $table,
        '--div--;LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:pages.tab.footer,
            --palette--;;footer'
    );

    /**
     * Default PageTS for Football
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/Page/All.tsconfig',
        'Football'
    );
});
