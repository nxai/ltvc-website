<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // <--- 1. ຕ້ອງມີບັນທັດນີ້

class Department extends Model
{
    protected $fillable = ['name_la', 'icon', 'image', 'description'];

    // 2. ຕ້ອງມີ Method ນີ້ (ຊື່ຕ້ອງເປັນ courses ໂຕພິມນ້ອຍ ແລະ ມີ s)
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}