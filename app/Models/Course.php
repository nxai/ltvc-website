<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import ເພື່ອໃຊ້ຄວາມສຳພັນ

class Course extends Model
{
    use HasFactory;

    /**
     * ກຳນົດ Column ທີ່ອະນຸຍາດໃຫ້ບັນທຶກຂໍ້ມູນໄດ້ (Mass Assignment)
     */
protected $fillable = ['department_id', 'course_name', 'level', 'duration', 'description', 'image'];

    /**
     * ສ້າງຄວາມສຳພັນແບບ BelongsTo ຫາ Department
     * (ໝາຍຄວາມວ່າ: ຫຼັກສູດນີ້ ສັງກັດຢູ່ໃນ ພາກວິຊາໃດໜຶ່ງ)
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}