<?php

$table = 'kehadiran';
Page::set_title(ucwords($table));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$fields = config('fields')[$table];

$fields = array_merge($fields, [
    'status' => [
        'label' => 'Status',
        'type'  => 'text'
    ]
]);

$data = $db->all($table);

$data = array_map(function($d) use ($db) {
    $items = $db->all('kehadiran_item',['kehadiran_id'=>$d->id]);
    $status = '';
    foreach($items as $item)
    {
        $waktu = date('H:i',strtotime($item->waktu));
        $db->query = "SELECT * FROM jam_kerja WHERE TIME(jam_mulai) <= TIME('$waktu') AND TIME(jam_selesai) >= TIME('$waktu')";
        $jam_kerja = $db->exec('single');
        $status .= '<b>'.$jam_kerja->nama.' ('.$waktu.')</b><br>';
    }
    $d->status = $status;
    return $d;
}, $data);

return [
    'datas' => $data,
    'table' => $table,
    'success_msg' => $success_msg,
    'fields' => $fields
];