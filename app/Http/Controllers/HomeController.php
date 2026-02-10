<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Slider;
use App\Models\News;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ດຶງຮູບສະໄລ້ທີ່ເປີດໃຊ້ງານ ແລະ ລຽງລຳດັບ
        $sliders = Slider::where('is_active', true)->latest()->get();

        // ດຶງຂ່າວສານ 3 ອັນລ່າສຸດ
        $latestNews = News::latest()->take(3)->get();

        // ດຶງພາກວິຊາທັງໝົດ
        $departments = Department::all();

        return view('welcome', compact('sliders', 'latestNews', 'departments'));
    }

    public function show($id)
    {
        // ດຶງຂໍ້ມູນພາກວິຊາ ພ້ອມກັບຫຼັກສູດທີ່ສັງກັດຢູ່ນຳກັນ (Eager Loading)
        $department = Department::with('courses')->findOrFail($id);
        return view('departments.show', compact('department'));
    }

    public function allDepartments()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function handleContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return back()->with('success', 'ຂໍ້ຄວາມຂອງທ່ານຖືກສົ່ງຮຽບຮ້ອຍແລ້ວ! ພວກເຮົາຈະຕິດຕໍ່ກັບໂດຍໄວ.');
    }

    public function about()
    {
        return view('about');
    }
}