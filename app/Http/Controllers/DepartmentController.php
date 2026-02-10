<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    // 1. ໜ້າລາຍຊື່ທັງໝົດ
    public function index() 
    {
        // ດຶງຂໍ້ມູນລ່າສຸດມາສະແດງ
        $departments = Department::latest()->get();
        return view('admin.departments.index', compact('departments'));
    }

    // 2. ໜ້າຟອມເພີ່ມໃໝ່
    public function create() 
    {
        return view('admin.departments.create');
    }

    // 3. ບັນທຶກຂໍ້ມູນໃໝ່
    public function store(Request $request) 
    {
        $data = $request->validate([
            'name_la' => 'required|string|max:255',
            'icon'    => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // ຈຳກັດ 2MB
        ]);

        // ຈັດການອັບໂຫຼດຮູບພາບ
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('departments', 'public');
        }

        Department::create($data);

        return redirect()->route('admin.departments.index')->with('success', 'ເພີ່ມພາກວິຊາສຳເລັດແລ້ວ!');
    }

    // 4. ໜ້າຟອມແກ້ໄຂ
    public function edit(Department $department) 
    {
        return view('admin.departments.edit', compact('department'));
    }

    // 5. ອັບເດດຂໍ້ມູນ
    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name_la' => 'required|string|max:255',
            'icon'    => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // ລຶບຮູບເກົ່າຖິ້ມ (ຖ້າມີ) ກ່ອນຈະເອົາຮູບໃໝ່ລົງ
            if ($department->image) {
                Storage::disk('public')->delete($department->image);
            }
            // ເກັບຮູບໃໝ່
            $data['image'] = $request->file('image')->store('departments', 'public');
        }

        $department->update($data);

        return redirect()->route('admin.departments.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນພາກວິຊາສຳເລັດ!');
    }

    // 6. ລຶບຂໍ້ມູນ
    public function destroy(Department $department)
    {
        // ລຶບໄຟລ໌ຮູບພາບອອກຈາກ Storage ກ່ອນລຶບ Record ໃນຖານຂໍ້ມູນ
        if ($department->image) {
            Storage::disk('public')->delete($department->image);
        }

        $department->delete();

        return redirect()->route('admin.departments.index')->with('success', 'ລຶບພາກວິຊາອອກຈາກລະບົບແລ້ວ!');
    }
}