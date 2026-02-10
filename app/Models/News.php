<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // ເພີ່ມບັນທັດນີ້ເຂົ້າໄປ
    protected $fillable = [
        'title', 
        'content', 
        'image', 
        'views'
    ];
}