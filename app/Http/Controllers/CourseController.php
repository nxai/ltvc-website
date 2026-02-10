<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // 1. ຕ້ອງ Import ໂຕນີ້ເພື່ອຈັດການໄຟລ໌

class CourseController extends Controller
{
   public function index(Request $request)
{
    $search = $request->input('search');

    // ຄົ້ນຫາຂໍ້ມູນຕາມຊື່ຫຼັກສູດ ຫຼື ຊື່ພາກວິຊາ
    $courses = Course::with('department')
        ->when($search, function ($query, $search) {
            return $query->where('course_name', 'like', "%{$search}%")
                         ->orWhereHas('department', function ($q) use ($search) {
                             $q->where('name_la', 'like', "%{$search}%");
                         });
        })
        ->latest()
        ->paginate(10);

    // ຖ້າເປັນການ Request ແບບ AJAX ໃຫ້ສົ່ງຄືນສະເພາະສ່ວນຂອງ Table
    if ($request->ajax()) {
        return view('admin.courses._table', compact('courses'))->render();
    }

    return view('admin.courses.index', compact('courses'));
}

    public function create() {
        $departments = Department::all();
        return view('admin.courses.create', compact('departments'));
    }

    public function store(Request $request) {
        // 2. ເພີ່ມການ Validate ຮູບພາບ
        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'course_name'   => 'required|string|max:255',
            'level'         => 'required',
            'duration'      => 'nullable|string',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // ຈຳກັດ 2MB
        ]);

        // 3. ຈັດການການອັບໂຫຼດຮູບ
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        Course::create($data);
        return redirect()->route('courses.index')->with('success', 'ເພີ່ມຫຼັກສູດໃໝ່ສຳເລັດ!');
    }

    public function edit(Course $course) {
        $departments = Department::all();
        return view('admin.courses.edit', compact('course', 'departments'));
    }

    public function update(Request $request, Course $course) {
        // 4. Validate ຂໍ້ມູນໃນການ Update
        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'course_name'   => 'required|string|max:255',
            'level'         => 'required',
            'duration'      => 'nullable|string',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // 5. ຈັດການປ່ຽນຮູບໃໝ່
        if ($request->hasFile('image')) {
            // ລຶບຮູບເກົ່າອອກຈາກ Storage ຖ້າມີ
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            // ເກັບຮູບໃໝ່
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($data);
        return redirect()->route('courses.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    public function destroy(Course $course) {
        // 6. ລຶບຮູບພາບອອກຈາກ Storage ກ່ອນລຶບຂໍ້ມູນໃນ Database
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }
        
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'ລຶບຫຼັກສູດອອກແລ້ວ!');
    }
}