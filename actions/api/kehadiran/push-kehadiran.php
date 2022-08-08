<?php
$conn = conn();
$db   = new Database($conn);

$NIP     = '';
$tanggal = '';
$nama    = '';
$status  = '';
$waktu   = '';
$tanggal = '';

$pegawai = $db->single('pegawai',['NIP' => $NIP]);

if(!$pegawai)
{
    echo json_encode([
        'status'  => 'fail',
        'message' => 'data pegawai tidak valid',
        'data'    => []
    ]);
    die();
}

// check kehadiran
$kehadiran = $db->single('kehadiran',[
    'pegawai_id' => $pegawai->id,
    'tanggal'    => $tanggal
]);

if(!$kehadiran)
{
    $kehadiran = $db->insert('kehadiran',[
        'pegawai_id' => $pegawai->id,
        'tanggal'    => $tanggal
    ]);
}

$db->insert('kehadiran_item',[
    'kehadiran_id' => $kehadiran->id,
    'nama'    => $nama,
    'status'  => $status,
    'waktu'   => $waktu,
]);

echo json_encode([
    'status'  => 'success',
    'message' => 'push data success',
    'data'    => []
]);
die();
