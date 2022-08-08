<?php

$db->insert('kehadiran_item',[
    'kehadiran_id' => $insert->id,
    'nama' => $_POST['kehadiran_items']['status'],
    'status' => $_POST['kehadiran_items']['status'],
    'keterangan' => $_POST['kehadiran_items']['keterangan'],
]);