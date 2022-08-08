<?php

$user = auth()->user;

if(get_role($user->id)->name != 'administrator')
{
    unset($fields['pegawai_id']);
}

return $fields;