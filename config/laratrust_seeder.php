<?php
return [
    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d,a,l',
            'products' => 'c,r,u,d,a,l',
            'materials' => 'c,r,u,d,a,l',
            'colors' => 'c,r,u,d,a,l',
            'orders' => 'c,r,u,d,a,l',
            'review' => 'c,r,u,d,a,l',
            'shipping' => 'c,r,u,d,a,l'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'l' => 'list',
        'a' => 'access'
    ],
    
];
