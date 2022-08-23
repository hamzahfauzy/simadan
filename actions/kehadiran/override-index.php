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
        $waktu = date('H:i',strtotime($item->waktu));
        $db->query = "SELECT * FROM jam_kerja WHERE jam_mulai >= $waktu AND jam_selesai <= $waktu";
        $jam_kerja = $db->exec('single');
        $status .= '<b>'.$jam_kerja->nama.' ('.$waktu.')</b><br>';
    }
    $d->status = $status;
    return $d;
}, $data);

return $data;