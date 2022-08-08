<?php


if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    if(isset($_FILES['file_url']) && !empty($_FILES['file_url']['name']))
    {
        $ext  = pathinfo($_FILES['file_url']['name'], PATHINFO_EXTENSION);
        $name = strtotime('now').'.'.$ext;
        $file = 'uploads/lapor/'.$name;
        copy($_FILES['file_url']['tmp_name'],$file);
        $_POST['lapor']['file_url'] = $file;
    }

    $db->insert('lapor',$_POST['lapor']);

    set_flash_msg(['success'=>'Sukses! Laporan berhasil disimpan']);
    header('location:'.routeTo('lapor'));
    die();
}

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');
$fields = config('fields')['lapor'];

return compact('fields','success_msg','error_msg');