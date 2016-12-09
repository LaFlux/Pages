<?php
namespace ExtensionsValley\Pages\Events;


\Event::listen('admin.menu.groups', function ($collection) {

    $collection->put('extensionsvalley.pages', [
        'menu_text' => 'Pages'
        , 'menu_icon' => '<i class="fa fa-file-o"></i>'
        , 'acl_key' => 'extensionsvalley.pages.pagespanel'
        , 'sub_menu' => [
            '0' => [
                'link' => '/admin/ExtensionsValley/pages/list/pages'
                , 'menu_text' => 'Manage Pages'
                , 'acl_key' => 'extensionsvalley.pages.pages'
            ],
        ],
    ]);


});
