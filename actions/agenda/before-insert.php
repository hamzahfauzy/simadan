<?php
$user = auth()->user;

if(get_role($user->id)->name != 'administrator')
{
    $pegawai = $db->single('pegawai',['user_id'=>$user->id]);
    $_POST['agenda']['pegawai_id'] = $pegawai->id;
}
