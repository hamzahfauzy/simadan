<?php

$fields = array_merge($fields, [
    'status' => [
        'label' => 'Status',
        'type'  => 'text'
    ]
]);

unset($fields['tanggal']);

return $fields;