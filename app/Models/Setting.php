<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // ເພີ່ມບັນທັດນີ້ເພື່ອອະນຸຍາດໃຫ້ບັນທຶກຂໍ້ມູນໃນ Column key ແລະ value
    protected $fillable = [
        'key',
        'value',
    ];
}