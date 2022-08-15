<?php
$conn = conn();
$db   = new Database($conn);

echo "Sukses"; // json_encode($_POST);
die();

$finger_id = $_POST['finger_id'];
$tanggal   = $_POST['tanggal'];
$nama      = $_POST['verifikasi'];
$status    = $_POST['status'];

$pegawai = $db->single('pegawai',['finger_id' => $finger_id]);

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

$item = $db->single('kehadiran_item',[
    'kehadiran_id' => $kehadiran->id,
    'nama'  => $nama,
    'status'  => $status,
    'waktu'  => $tanggal,
]);

if($item)
{
    echo json_encode([
        'status'  => 'success',
        'message' => 'data exists',
        'data'    => []
    ]);
    die();
}

$db->insert('kehadiran_item',[
    'kehadiran_id' => $kehadiran->id,
    'nama'    => $nama,
    'status'  => $status,
    'waktu'   => $tanggal,
]);

echo json_encode([
    'status'  => 'success',
    'message' => 'push data success',
    'data'    => []
]);
die();
