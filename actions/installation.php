<?php

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    // save application installation
    $db->insert('application',$_POST['app']);

    // create user login
    $_POST['users']['name'] = "Admin ".$_POST['app']['name'];
    $_POST['users']['password'] = md5($_POST['users']['password']);
    $user = $db->insert('users',$_POST['users']);

    // create roles
    $role = $db->insert('roles',[
        'name' => 'administrator'
    ]);

    // assign role to user
    $db->insert('user_roles',[
        'user_id' => $user->id,
        'role_id' => $role->id
    ]);

    // create roles route
    $role = $db->insert('role_routes',[
        'role_id' => $role->id,
        'route_path' => '*'
    ]);

    $routes = [
        'camat' => [
            'default/*',
            'crud/index?table=agenda',
            'crud/create?table=agenda',
            'crud/edit?table=agenda',
            'crud/delete?table=agenda',
            'crud/index?table=kehadiran',
            'pantau/*',
        ],
        'pegawai' => [
            'default/*',
            'crud/index?table=agenda',
            'crud/create?table=agenda',
            'crud/edit?table=agenda',
            'crud/delete?table=agenda',
            'crud/index?table=kehadiran',
        ]
    ];

    foreach(['camat','pegawai'] as $role)
    {
        $_role = $db->insert('roles',[
            'name' => $role
        ]);

        foreach($routes[$role] as $route)
        {
            $db->insert('role_routes',[
                'role_id' => $_role->id,
                'route_path' => $route
            ]);
        }
    }

    mkdir('uploads');
    mkdir('uploads/lapor');

    set_flash_msg(['success'=>'Instalasi Berhasil']);
    header('location:'.routeTo('auth/login'));
    die();

}