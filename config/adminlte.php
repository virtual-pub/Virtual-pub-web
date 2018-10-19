<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Virtual Pub admin',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Virtual</b>PUB',

    'logo_mini' => '<b>V</b>P',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'yellow',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        [
            'text'        => 'Categorias',
            'icon'         => 'reorder',
            'icon_color'  => 'red',
            'submenu' => [
                [
                    'text'        => 'Estilos',
                    'url'         => 'categoria/estilo',
                    'icon'         => 'circle-o',
                    'icon_color'  => 'maroon',
                ],
                [
                    'text'        => 'Copos',
                    'url'         => 'categoria/copo',
                    'icon'         => 'circle-o',
                    'icon_color'  => 'teal',
                ],
                [
                    'text'        => 'Coloração',
                    'url'         => 'categoria/cor',
                    'icon'         => 'circle-o',
                    'icon_color'  => 'purple',
                ],
            ],

        ],
        [
            'header'      => 'Dados do Sistema',
            'can'         => 'isMantenedor',
        ],
        [
            'text'        => 'Configurações de Cervejas',
            'icon'        => 'beer',
            'icon_color'  => 'orange',
            'can'         => 'isMantenedor',
            'submenu' => [
                [
                    'text'        => 'Lista de Cervejas',
                    'url'         => 'cervejas',
                    'icon_color'  => 'maroon',
                    'can'         => 'isMantenedor',
                ],
                [
                    'text'        => 'Lista de Estilos',
                    'url'         => 'estilos',
                    'icon_color'  => 'green',
                    'can'         => 'isMantenedor',
                ],
                [
                    'text'        => 'Colorações',
                    'url'         => 'colors',
                    'icon_color'  => 'blue',
                    'can'         => 'isMantenedor',
                ],
                [
                    'text'        => 'Lista de Copos',
                    'url'         => 'copos',
                    'icon_color'  => 'purple',
                    'can'         => 'isMantenedor',
                ],
            ],
        ],
        [
            'text'        => 'Feed',
            'url'         => 'feed',
            'icon'         => 'feed',
            'icon_color'  => 'orange',
        ],  
        [
            'text'        => 'Lista de Usuários',
            'url'         => 'users/',
            'icon'        => 'users',
            'icon_color'  => 'aqua',
            'can'         => 'isMantenedor',
        ],
        [
            'text'        => 'Lista de Publicações',
            'url'         => 'posts/',
            'icon'        => 'users',
            'icon_color'  => 'green',
            'can'         => 'isMantenedor',
        ],
       
        [
            'header'      => 'SUA REDE',
            'can'         => 'isUser',
        ],
        [
            'text'        => 'Cervejas Favoritas',
            'url'         => 'cervejas-favoritas',
            'icon'        => 'star',
            'icon_color'  => 'yellow',
        ],
        [
            'text'        => 'Usuários Seguidos',
            'url'         => 'user-seguidos',
            'icon'        => 'users',
            'icon_color'  => 'red',
            'cannot'         => 'isMantenedor',
        ],
        [
            'text'        => 'Seus Seguidores',
            'url'         => 'user-seguidores',
            'icon'        => 'users',
            'icon_color'  => 'aqua',
            'cannot'         => 'isMantenedor',
        ],
        [
            'text'        => 'Suas Publicações',
            'url'         => 'posts/',
            'icon'        => 'edit',
            'icon_color'  => 'aqua',
            'cannot'         => 'isMantenedor',
        ],
        
        'CONTA',
        
        [
            'text' => 'Cervejas Cadastradas',
            'icon' => 'beer',
            'icon_color'  => 'yellow',
            'can' => 'isFabricante',
            'submenu' => [
                [
                    'text'        => 'sua Lista',
                    'url'         => 'cervejas',
                    'icon_color'  => 'yellow',
                ],
                
            ],
        ],
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
