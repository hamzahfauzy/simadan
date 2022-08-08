<?php

return [
    'dashboard' => 'default/index',
    'pegawai'   => 'crud/index?table=pegawai',
    'agenda'    => 'crud/index?table=agenda',
    'kehadiran' => 'crud/index?table=kehadiran',
    'pantau'    => 'pantau/index',
    'lapor'     => 'crud/index?table=lapor',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];