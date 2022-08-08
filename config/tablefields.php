<?php

return [
    'pegawai'    => [
        'finger_id','NIP','nama','jabatan','pangkat','unit_kerja',
        'status' => [
            'label' => 'Status',
            'type'  => 'options:PNS|Honorer'
        ]
    ],
    'agenda' => [
        'pegawai_id' => [
            'label' => 'Pegawai',
            'type'  => 'options-obj:pegawai,id,nama'
        ],
        'nama',
        'tanggal' => [
            'label' => 'Tanggal',
            'type'  => 'date'
        ],
        'waktu_mulai' => [
            'label' => 'Waktu Mulai',
            'type'  => 'time'
        ],
        'waktu_selesai' => [
            'label' => 'Waktu Selesai',
            'type'  => 'time'
        ]
    ],
    'kehadiran' => [
        'pegawai_id' => [
            'label' => 'Pegawai',
            'type'  => 'options-obj:pegawai,id,nama'
        ],
        'tanggal' => [
            'label' => 'Tanggal',
            'type'  => 'date'
        ]
    ],
    'lapor' => [
        'NIK','nama','alamat',
        'judul','deskripsi','lokasi',
        'file_url' => [
            'label' => 'Lampiran',
            'type'  => 'file'
        ]
    ]
];