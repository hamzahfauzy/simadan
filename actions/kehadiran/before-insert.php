<?php

$_POST['kehadiran_items']['status'] = $_POST['kehadiran']['status'];
$_POST['kehadiran_items']['keterangan'] = $_POST['kehadiran']['keterangan'];

unset($_POST['kehadiran']['status']);
unset($_POST['kehadiran']['keterangan']);