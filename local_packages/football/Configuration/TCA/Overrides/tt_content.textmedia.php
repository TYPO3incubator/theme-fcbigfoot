<?php
declare(strict_types=1);

call_user_func(static function() {
    $GLOBALS['TCA']['tt_content']['types']['textmedia']['columnsOverrides'] = [
        'header' => [
            'config' => [
                'required' => true
            ]
        ],
        'header_link' => [
            'config' => [
                'allowedTypes' => ['page','url']
            ]
        ],
        'bodytext' => [
            'config' => [
                'enableRichtext' => 1,
            ],
        ],
        'assets' => [
            'config' => [
                'allowed' => 'gif,jpg,jpeg,png,svg',
                'maxitems' => '1',
            ],
        ],
    ];
});
