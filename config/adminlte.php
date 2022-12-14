
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Menu',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>VirtualExpo</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Menu',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => null,
    'right_sidebar_push' => null,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        [
            'text' => '新製品情報',
            'url'  => '#',
            'icon' => 'far fa-folder',
            'submenu' => [
                [
                    'text' => 'キーワード検索',
                    'url'  => 'search',
                    'icon' => '	fas fa-search',
                ],
                [
                    'text'    => 'カテゴリー別',
                    'icon'    => 'fas fa-th-list',
                    'submenu' => [
                        [
                            'text' => '常温',
                            'icon'    => 'fas fa-circle',
                            'url'  => '#',
                            'submenu' => [
                                [
                                    'text' => '調味料',
                                    'url'  => 'item/1/13',
                                ],
                                [
                                    'text' => '食用油',
                                    'url'  => 'item/1/11',
                                ],
                                [
                                    'text' => 'スプレッド',
                                    'url'  => 'item/1/3',
                                ],
                                [
                                    'text' => '乳製品',
                                    'url'  => 'item/1/15',
                                ],
                                [
                                    'text' => '調理品',
                                    'url'  => 'item/1/14',
                                ],
                                [
                                    'text' => 'スープ',
                                    'url'  => 'item/1/2',
                                ],
                                [
                                    'text' => 'ビン・缶詰',
                                    'url'  => 'item/1/6',
                                ],
                                [
                                    'text' => '粉類',
                                    'url'  => 'item/1/16',
                                ],
                                [
                                    'text' => 'ホームメイキング材料',
                                    'url'  => 'item/1/7',
                                ],
                                [
                                    'text' => '麺類',
                                    'url'  => 'item/1/17',
                                ],
                                [
                                    'text' => 'パン・シリアル類',
                                    'url'  => 'item/1/5',
                                ],
                                [
                                    'text' => '穀物',
                                    'url'  => 'item/1/10',
                                ],
                                [
                                    'text' => '乾物',
                                    'url'  => 'item/1/9',
                                ],
                                [
                                    'text' => '嗜好飲料',
                                    'url'  => 'item/1/18',
                                ],
                                [
                                    'text' => '果実・トマト・野菜飲料',
                                    'url'  => 'item/1/8',
                                ],
                                [
                                    'text' => '清涼飲料',
                                    'url'  => 'item/1/12',
                                ],
                                [
                                    'text' => 'ギフト',
                                    'url'  => 'item/1/1',
                                ],
                                [
                                    'text' => 'その他加工食品',
                                    'url'  => 'item/1/4',
                                ],
        
                            ],
                        ],
                        [
                            'text'    => '低温',
                            'icon'    => 'fas fa-circle',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => '乳製品',
                                    'url'  => 'item/2/12',
                                ],
                                [
                                    'text'    => '冷凍食品',
                                    'url'     => 'item/2/3',
                                ],
                                [
                                    'text'    => '麺類',
                                    'url'     => 'item/2/5',
                                ],
                                [
                                    'text'    => '練製品',
                                    'url'     => 'item/2/14',
                                ],
                                [
                                    'text'    => '漬物',
                                    'url'     => 'item/2/6',
                                ],
                                [
                                    'text'    => '佃煮・煮豆',
                                    'url'     => 'item/2/16',
                                ],
                                [
                                    'text'    => '水物',
                                    'url'     => 'item/2/4',
                                ],
                                [
                                    'text'    => '卵加工品',
                                    'url'     => 'item/2/17',
                                ],
                                [
                                    'text'    => 'チルド調理加工品',
                                    'url'     => 'item/2/8',
                                ],
                                [
                                    'text'    => '惣菜',
                                    'url'     => 'item/2/7',
                                ],
                                [
                                    'text'    => '水産加工品',
                                    'url'     => 'item/2/15',
                                ],
                                [
                                    'text'    => 'チルドデザート・ヨーグルト',
                                    'url'     => 'item/2/2',
                                ],
                                [
                                    'text'    => 'アイスクリーム',
                                    'url'     => 'item/2/1',
                                ],
                                [
                                    'text'    => '清涼飲料',
                                    'url'     => 'item/2/9',
                                ],
                                [
                                    'text'    => '乳飲料',
                                    'url'     => 'item/2/11',
                                ],
                                [
                                    'text'    => 'その他チルド飲料',
                                    'url'     => 'item/2/10',
                                ],
                            ],
                        ],
                        [
                            'text' => '酒類',
                            'icon'    => 'fas fa-circle',
                            'url'  => '#',
                            'submenu' => [
                                [
                                    'text' => 'その他飲料',
                                    'url'  => 'item/3/10',
                                ],
                                [
                                    'text'    => '清酒・合成清酒',
                                    'url'     => 'item/3/5',
                                ],
                                [
                                    'text' => '焼酎',
                                    'url'  => 'item/3/4',
                                ],
                                [
                                    'text'    => 'ビール',
                                    'url'     => 'item/3/3',
                                ],
                                [
                                    'text' => '発泡酒',
                                    'url'  => 'item/3/8',
                                ],
                                [
                                    'text'    => '果実酒・甘味果実酒',
                                    'url'     => 'item/3/6',
                                ],
                                [
                                    'text' => 'ウイスキー・ブランデー',
                                    'url'  => 'item/3/2',
                                ],
                                [
                                    'text'    => 'スピリッツ・リキュール',
                                    'url'     => 'item/3/1',
                                ],
                                [
                                    'text' => 'その他酒類',
                                    'url'  => 'item/3/7',
                                ],
                                [
                                    'text'    => 'その他酒類関連商品',
                                    'url'     => 'item/3/9',
                                ],
        
                            ],
                        ],
                        [
                            'text' => '菓子',
                            'icon'    => 'fas fa-circle',
                            'url'  => '#',
                            'submenu' => [
                                [
                                    'text' => '菓子',
                                    'url'  => 'item/4/2',
                                ],
                                [
                                    'text'    => '催事菓子',
                                    'url'     => 'item/4/5',
                                ],
                                [
                                    'text' => 'その他菓子',
                                    'url'  => 'item/4/1',
                                ],
                                [
                                    'text'    => '日配菓子（常温）',
                                    'url'     => 'item/4/3',
                                ],
                                [
                                    'text'    => 'その他菓子類',
                                    'url'     => 'item/4/4',
                                ],
                            ],
                        ],
                    ],
                ],

            ]
        ],
        [
            'text' => 'ランキング',
            'url'  => '#',
            'icon' => 'fas fa-crown',
            'submenu' => [
                [
                    'text' => '”いいね”ランキング',
                    'url'  => 'rank/good',
                    'icon' => 'fas fa-crown',
                ],
                [
                    'text' => '”キーワード”ランキング',
                    'url'  => 'rank/keyword',
                    'icon' => 'fas fa-crown',
                ],
            ]
        ],
        [
            'text' => 'マイページ',
            'url'  => 'mypage',
            'icon' => 'far fa-address-card',
        ],
        [
            'text' => '商品登録',
            'url'  => 'items/add',
            'icon' => 'far fa-edit',
            'can'  => 'register',
            'can'  => 'authorizer'
        ],
        [
            'text' => '承認画面',
            'url'  => 'items/authorize',
            'icon' => 'fa fa-gavel',
            'can'  => 'authorizer'
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,

];