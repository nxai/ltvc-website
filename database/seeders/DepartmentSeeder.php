<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department; // ຢ່າລືມ Import Model ນີ້ເຂົ້າມາ

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ກຸ່ມຂໍ້ມູນ 10 ພາກວິຊາ ຕາມລາຍການທີ່ກຳນົດ
        $departments = [
            ['name_la' => 'ບໍລິຫານ-ທຸລະກິດ', 'icon' => 'bi-briefcase'],
            ['name_la' => 'ເຕັກໂນໂລຊີໄຟຟ້າ', 'icon' => 'bi-lightning-charge'],
            ['name_la' => 'ອຸດສາຫະກໍາ', 'icon' => 'bi-gear'],
            ['name_la' => 'ບໍລິຫານໂຮງແຮມ ແລະ ການທ່ອງທ່ຽວ', 'icon' => 'bi-cup-hot'],
            ['name_la' => 'ກໍ່ສ້າງເຄຫາສະຖານ', 'icon' => 'bi-building'],
            ['name_la' => 'ສຸນເຝິກອົບຮົມການບໍລິການໂຮງແຮມ ແລະ ການທອງທຽວ', 'icon' => 'bi-award'],
        ];

        // ວົນລູບເພື່ອບັນທຶກລົງ Database
        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}