<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Aquí puede cambiar el título predeterminado de su panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */
    //title que sale pestaña de forma normal
    'title' => 'Codex wolf',
    //si en una pogina tiene otro titulo queremos poner antes un prefijo
    // Codex wolf | titulo en la vista
    'title_prefix' => 'Codex Wolf | ',
    //Postfix seria igual a titulo de la vista|codex wolf
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Aquí puede activar el favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */
    //todo dentro de una cartpeta favicons
    //si uso un favicon
    'use_ico_only' => false,
    //si uso varios favicon es decir la generacion del https://www.favicon-generator.org/
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Aquí puede cambiar el logo de su panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */
    //texto al lado del logo en menu lateral
    'logo' => '<b>Codex</b> WOLF',
    //ubicación del logo se mostrará en el menu lateral
    'logo_img' => 'vendor/adminlte/dist/img/logo.png',
    //estilos del logotipo
    'logo_img_class' => 'brand-image-xs rounded ',
    //si tengo un logo más grande pasar la ubicación
    'logo_img_xl' => null,
    //estilo de la imagen xl
    'logo_img_xl_class' => 'brand-image-xs',
    //nombre de la imagen
    'logo_img_alt' => 'codexwolf',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Aquí puede activar y cambiar el menú de usuario.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */
    // configuración de la barra superior, del lado derecho
    // si esta esta true aparece un dropdrown, dentro boton de cierre de session
    //si es falso, desaparece dropdrown para que solo salga el boton de cierre de session
    'usermenu_enabled' => true,
    //si pones true se vera la cabecera dentro del dropdrown
    'usermenu_header' => true,
    // estilos de la cabezera
    'usermenu_header_class' => 'bg-dark',
    // si tiene valor true el se muestra la foto de perfil
    //se llama en user con metodo adminlte_image()
    'usermenu_image' => true,
    //si es true muestra la descripcion o rol del usuario
    //se llama desde el metodo adminlte_desc
    'usermenu_desc' => true,
    //boton del perfil usuario se llama desde adminlte_profile_url
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Aquí cambiamos el diseño de su panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */
    //navbar clasico con todo en la parte superior
    'layout_topnav' => null,
    //le agrega un espacion dejando todo el contenido en un caja
    'layout_boxed' => null,
    //se mantien fijo el navegador del lado izquierdo
    'layout_fixed_sidebar' => true,
    //se mantiene fijo el navegador superior
    'layout_fixed_navbar' => true,
    //en el caso de tener un footer lo tendriamos fixeado
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Aquí puede cambiar el aspecto y el comportamiento de las vistas de autenticación.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */
    //linea superior de la caja de formulario de login y registro
    'classes_auth_card' => 'bg-gradient-dark',
    //personalizar el titulo del formulario
    'classes_auth_header' => '',
    //personalizar el body del formulario
    'classes_auth_body' => 'bg-gradient-dark',
    //personalizar el footer del formulario
    'classes_auth_footer' => 'text-center text-light',
    //personalizar el color del texto
    'classes_auth_icon' => 'text-light',
    //personalizar el boton del formulario
    'classes_auth_btn' => 'btn-flat btn-dark text-light',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Aquí puede cambiar el aspecto y el comportamiento del panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */
    //le agrega un a class a tdo el body del panel
    'classes_body' => '',
    //le agrega un estilo al cuadro del sider bar donde esta nuestro logo
    'classes_brand' => '',
    //le agrega un estilo al texto del sider bar donde esta nuestro logo
    'classes_brand_text' => '',
    //agrega estilos tdo el contenido dentro de nuestro @section content
    'classes_content_wrapper' => '',
    //le damos una clase a tdo nuestro contenido por debajo del titulo
    'classes_content_header' => 'text-center',
    //le damos una clase a tdo nuestro contenido por debajo del titulo
    'classes_content' => '',
    //perzonalizar el siderbar link activos
    'classes_sidebar' => 'sidebar-dark-light elevation-4',
    //class para el sider bar nav
    'classes_sidebar_nav' => '',
    //perzonalizar navbar
    'classes_topnav' => 'navbar-dark navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Aquí podemos modificar la barra lateral del panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */
    //Habilita / deshabilita la mini barra lateral contraída para el escritorio y pantallas más grandes (> = 992px),
    // puede configurar esta opción en true, falseo 'md'habilitarla para tabletas pequeñas y pantallas más grandes (> = 768px).
    'sidebar_mini' => true,
    //Activa / desactiva el modo contraído de forma predeterminada.
    'sidebar_collapse' => true,
    //Habilita / deshabilita el colapso automático estableciendo un ancho mínimo para colapsar automáticamente.
    'sidebar_collapse_auto_size' => false,
    //Habilita / deshabilita la secuencia de comandos para recordar y contraer.
    'sidebar_collapse_remember' => false,
    //Habilita / deshabilita la transición después de volver a cargar la página.
    'sidebar_collapse_remember_no_transition' => false,
    // Cambia el tema de la barra de desplazamiento de la barra lateral.
    'sidebar_scrollbar_theme' => 'os-theme-light',
    //Cambia el activador de ocultación automática de la barra de desplazamiento de la barra lateral.
    'sidebar_scrollbar_auto_hide' => 'l',
    //Activa / desactiva la función de acordeón de navegación de la barra lateral.
    'sidebar_nav_accordion' => false,
    //Cambia la velocidad de animación de la diapositiva de la barra lateral.
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Aquí podemos modificar la barra lateral derecha,
    | también conocida como barra lateral de control del panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
    |
    */
    //Activa / desactiva la barra lateral derecha.
    'right_sidebar' => false,
    //Cambia el icono del botón alternador de la barra lateral derecha en la navegación superior.
    'right_sidebar_icon' => 'fas fa-cogs',
    //Cambia el tema de la barra lateral derecha, las siguientes opciones están disponibles: dark& light.
    'right_sidebar_theme' => 'dark',
    //Activa / desactiva la animación de diapositivas.
    'right_sidebar_slide' => false,
    //Habilita / deshabilita la inserción de contenido en lugar de superposición para la barra lateral derecha.
    'right_sidebar_push' => false,
    //Habilita / deshabilita la inserción de contenido en lugar de superposición para la barra lateral derecha.
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    //Cambia el activador de ocultación automática de la barra de desplazamiento de la barra lateral.
    // El valor predeterminado es l.
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Aquí podemos modificar la configuración de la URL del panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'admin/home/',

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
    |Aquí podemos habilitar la opción Laravel Mix para el panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
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
    |Aquí podemos modificar la barra lateral / navegación superior del panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => false,
            'topnav' => false,

        ],
        [
            'text' => 'blog',
            'route'  => '/',
            'can'  => 'manage-blog',
        ],
        [
            'text' => 'Inicio',
            'route' => 'inicio',
            'icon' => 'fab fa-wolf-pack-battalion fa-2x',
        ],
        [
            'text'        => 'Dashboard',
            'route'       => 'home',
            'icon'        => 'fas fa-tachometer-alt fa-lg',
//            'label'       => 4,
//            'label_color' => 'success',
        ],
        ['header' => 'Area de Administración',],
//        [
//            'text' => 'profile',
//            'url'  => 'admin/settings',
//            'icon' => 'fas fa-fw fa-bars',
//            'can' =>'permiso'
//        ],
//        [
//            'text' => 'change_password',
//            'url'  => 'admin/settings',
//            'icon' => 'fas fa-fw fa-lock',
//        ],
        [
            'text'    => 'Publicaciones',
            'icon'    => 'fas fa-fw fa-bars fa-lg',
            'url'  => 'admin/posts*',
            'can' => 'Posts',
            'submenu' => [
                [
                    'text' => 'Ver publicaciones',
                    'route'  => 'admin.posts.index',
                    'icon' => 'far fa-list-alt fa-lg'
                ],
            ],
        ],
        [
            'text'    => 'Usuarios',
            'icon'    => 'fas fa-users-cog fa-lg',
            'url'  => 'admin/users*',
            'can' => 'View_U',
            'submenu' => [
                [
                    'text' => 'Ver Usuarios',
                    'route'  => 'admin.users.index',
                    'icon' => 'fas fa-user-cog fa-lg',
                    'can' => 'View_U'
                ],
                [
                    'text' => 'Crear Usuarios',
                    'route'  => 'admin.users.create',
                    'icon' => 'fas fa-user-plus',
                    'can' => 'Create_u'
                ],
            ],
        ],
        [
            'text'    => 'Roles',
            'icon'    => 'fas fa-user-shield fa-lg',
            'url'  => 'admin/roles*',
            'can' => 'View_U',
            'submenu' => [
                [
                    'text' => 'Ver Roles',
                    'route'  => 'admin.roles.index',
                    'icon' => 'fas fa-user-tag fa-lg',
                    'can' => 'Role_v'
                ],
                [
                    'text' => 'Crear Rol',
                    'route'  => 'admin.roles.create',
                    'icon' => 'fas fa-user-lock fa-lg',
                    'can' => 'Role_c'
                ],
            ],
        ],
        [
            'text'    => 'Permisos',
            'icon'    => 'fas fa-user-shield fa-lg',
            'url'  => 'admin/permissions*',
            'can' => 'permissions_c',
            'submenu' => [
                [
                    'text' => 'Ver Permisos',
                    'route'  => 'admin.permissions.index',
                    'icon' => 'far fa-id-card fa-lg',
                    'can' => 'permissions_c'
                ],
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Aquí podemos modificar los filtros de menú del panel de administración.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/datatables/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/datatables/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/datatables/dataTables.responsive.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/datatables/responsive.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/adminlte/datatables/dataTables.bootstrap4.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/adminlte/datatables/responsive.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/select2/js/select2.full.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/adminlte/select2/css/select2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/adminlte/select2-bootstrap4-theme/select2-bootstrap4.css',
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
        'Moment' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/moment/moment.min.js',
                ]

            ],
        ],
        'Tempus' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/adminlte/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
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
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-corner-indicator.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'icheck-bootstrap' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css',
                ],
            ],
        ],
        'Ckeditor' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/ckeditor/ckeditor.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/adminlte/ckeditor/lang/es.js',
                ],

            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];
