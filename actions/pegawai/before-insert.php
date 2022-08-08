<?php

$sebagai = $_POST['pegawai']['sebagai'] == 'Camat' ? 2 : 3;
unset($_POST['pegawai']['sebagai']);

$user = $db->insert('users',[
    'name' => $_POST['pegawai']['nama'],
    'username' => $_POST['pegawai']['NIP'],
    'password' => md5(12345678),
]);

$db->insert('user_roles',[
    'user_id' => $user->id,
    'role_id' => $sebagai
]);

$_POST['pegawai']['user_id'] = $user->id;