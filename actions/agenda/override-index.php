<?php

$user = auth()->user;
if(get_role($user->id)->name != 'administrator')
{
    $pegawai = $db->single('pegawai',['user_id' => $user->id]);
    return $db->all('agenda',[
        'pegawai_id' => $pegawai->id
    ]);
}

return $data;