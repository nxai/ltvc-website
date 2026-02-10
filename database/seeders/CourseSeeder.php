<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Department;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. ພາກວິຊາ ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ (IT)
        $itDept = Department::where('name_la', 'like', '%ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ%')->first();
        if ($itDept) {
            $itCourses = [
                ['course_name' => 'ຊ່າງເຕັກນິກເຄືອຂ່າຍດ້ານຄອມພິວເຕີ', 'level' => 'ຊັ້ນສູງ (3 ປີ)', 'description' => 'ຮຽນຮູ້ການຕິດຕັ້ງ ແລະ ບໍລິຫານລະບົບເນັດເວີກ'],
                ['course_name' => 'ສ້ອມແປງຄອມພິວເຕີ', 'level' => 'ຊັ້ນສູງ (3 ປີ)', 'description' => 'ການບຳລຸງຮັກສາ Hardware ແລະ ຊອບແວ'],
                ['course_name' => 'ການອອກແບບກຣາບຟິກ ແລະ ສື່', 'level' => 'ຊັ້ນສູງ (3 ປີ)', 'description' => 'ການອອກແບບສື່ສິ່ງພິມ ແລະ ມັລຕິມີເດຍ'],
                ['course_name' => 'ການຕິດຕັ້ງ ແລະ ສ້ອມແປງອຸປະກອນ ICT', 'level' => 'ຊັ້ນສູງ (3 ປີ)', 'description' => 'ການຈັດການອຸປະກອນເຕັກໂນໂລຊີ'],
            ];
            foreach ($itCourses as $course) {
                $itDept->courses()->create($course);
            }
        }

        // 2. ພາກວິຊາ ໄຟຟ້າ-ເອເລັກໂຕຼນິກ
        $elecDept = Department::where('name_la', 'like', '%ໄຟຟ້າ%')->first();
        if ($elecDept) {
            $elecCourses = [
                ['course_name' => 'ໄຟຟ້າເຕັກນິກ', 'level' => 'ຊັ້ນສູງ/ຊັ້ນກາງ', 'description' => 'ລະບົບໄຟຟ້າອຸດສາຫະກຳ'],
                ['course_name' => 'ການຕິດຕັ້ງ ແລະ ສ້ອມແປງເຄື່ອງເຮັດຄວາມເຢັນ', 'level' => 'ຊັ້ນສູງ', 'description' => 'ເຕັກນິກເຄື່ອງປັບອາກາດ ແລະ ຕູ້ເຢັນ'],
                ['course_name' => 'ເອເລັກໂຕຼນິກ', 'level' => 'ຊັ້ນສູງ/ຊັ້ນກາງ', 'description' => 'ການສ້ອມແປງອຸປະກອນເອເລັກໂຕຼນິກ'],
                ['course_name' => 'ເຂື່ອນໄຟຟ້າພະລັງງານນໍ້າ', 'level' => 'ຊັ້ນສູງ', 'description' => 'ການບໍລິຫານຈັດການເຂື່ອນ'],
            ];
            foreach ($elecCourses as $course) {
                $elecDept->courses()->create($course);
            }
        }

        // 3. ພາກວິຊາ ບໍລິຫານ-ການບັນຊີ
        $accDept = Department::where('name_la', 'like', '%ບັນຊີ%')->first();
        if ($accDept) {
            $accCourses = [
                ['course_name' => 'ການບັນຊີ', 'level' => 'ຊັ້ນສູງ/ຊັ້ນກາງ', 'description' => 'ລະບົບບັນຊີວິສາຫະກິດ'],
                ['course_name' => 'ຄຸ້ມຄອງຫ້ອງການ', 'level' => 'ຊັ້ນສູງ/ຊັ້ນກາງ', 'description' => 'ວຽກງານບໍລິຫານເອກະສານ'],
                ['course_name' => 'ເລຂານຸການ', 'level' => 'ຊັ້ນສູງ', 'description' => 'ທັກສະການເປັນເລຂານຸການມືອາຊີບ'],
                ['course_name' => 'ການຂົນສົ່ງສິນຄ້າ (Logistics)', 'level' => 'ຊັ້ນສູງ', 'description' => 'ການຈັດການລະບົບຂົນສົ່ງ'],
            ];
            foreach ($accCourses as $course) {
                $accDept->courses()->create($course);
            }
        }
    }
}