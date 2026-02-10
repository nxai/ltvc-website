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
        // ກຸ່ມຂໍ້ມູນ 8 ພາກວິຊາ ຕາມ Profile ຂອງ LTVC
        $departments = [
            ['name_la' => 'ພາກວິຊາ ພື້ນຖານວິຊາຊີບ', 'icon' => 'bi-tools'],
            ['name_la' => 'ພາກວິຊາ ກົນຈັກ', 'icon' => 'bi-gear-wide-connected'],
            ['name_la' => 'ພາກວິຊາ ໄຟຟ້າ-ເອເລັກໂຕຼນິກ', 'icon' => 'bi-lightning-charge'],
            ['name_la' => 'ພາກວິຊາ ກໍ່ສ້າງເຄຫາສະຖານ', 'icon' => 'bi-building'],
            ['name_la' => 'ພາກວິຊາ ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ', 'icon' => 'bi-laptop'],
            ['name_la' => 'ພາກວິຊາ ບໍລິຫານ-ການບັນຊີ', 'icon' => 'bi-calculator'],
            ['name_la' => 'ພາກວິຊາ ກະສິກຳ', 'icon' => 'bi-tree'],
            ['name_la' => 'ພາກວິຊາ ບໍລິການ ແລະ ທ່ອງທ່ຽວ', 'icon' => 'bi-cup-hot'],
        ];

        // ວົນລູບເພື່ອບັນທຶກລົງ Database
        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}