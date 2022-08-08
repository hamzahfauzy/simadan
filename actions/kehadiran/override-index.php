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
        if($item->nama != 'Masuk')
        {
            $status .= '<b>'.$item->nama.'</b><br>'.$item->keterangan.'<br>';
        }
        else
        {
            $status .= '<b>'.$item->nama.'</b><br>'.$item->status.' - '.$item->waktu.'<br>';
        }
    }
    $d->status = $status;
    return $d;
}, $data);

return $data;