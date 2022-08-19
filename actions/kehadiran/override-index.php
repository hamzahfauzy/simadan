<?php

$user = auth()->user;
if(get_role($user->id)->name != 'administrator')
{
    $pegawai = $db->single('pegawai',['user_id' => $user->id]);
    $data = $db->all('kehadiran',[
        'pegawai_id' => $pegawai->id
    ]);
}

$data = array_map(function($d) use ($db) {
    $items = $db->all('kehadiran_item',['kehadiran_id'=>$d->id]);
    $status = '';
    foreach($items as $item)
    {
        if($item->status == '0')
        {
            $status .= '<b>Masuk ('.$item->waktu.')</b><br>';
        }
        else
        {
            $status .= '<b>Pulang ('.$item->waktu.')</b><br>';
        }
    }
    $d->status = $status;
    return $d;
}, $data);

return $data;