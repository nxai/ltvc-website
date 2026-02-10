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
        // ດຶງຮູບສະໄລ້ທີ່ເປີດໃຊ້ງານ ແລະ ລຽງລຳດັບ (ຖ້າມີ column sort_order)
        $sliders = Slider::where('is_active', true)->latest()->get();

        // ດຶງຂ່າວສານ 3 ອັນລ່າສຸດ
        $latestNews = News::latest()->take(3)->get();

        // ດຶງພາກວິຊາທັງໝົດ
        $departments = Department::all();

        // ສົ່ງຂໍ້ມູນໄປຫາ View
        return view('welcome', compact('sliders', 'latestNews', 'departments'));
    }

    // ຟັງຊັນສຳລັບເບິ່ງລາຍລະອຽດຂ່າວ (ຕຽມໄວ້ສຳລັບຂັ້ນຕອນຕໍ່ໄປ)
    public function showNews($id)
    {
        $news = News::findOrFail($id);
        return view('news_detail', compact('news'));
    }
    public function show($id) {
    // ດຶງຂໍ້ມູນພາກວິຊາ ພ້ອມກັບຫຼັກສູດທີ່ສັງກັດຢູ່ນຳກັນ (Eager Loading)
    $department = Department::with('courses')->findOrFail($id);
    return view('department_detail', compact('department'));
}
public function allDepartments()
{
    $departments = \App\Models\Department::all();
    // ຕ້ອງໃຫ້ຊື່ໃນ view() ກົງກັບຊື່ໄຟລ໌ .blade.php
    return view('departments_index', compact('departments')); 
}
// app/Http/Controllers/HomeController.php

public function contact()
{
    return view('contact'); // ມັນຈະໄປເປີດໄຟລ໌ resources/views/contact.blade.php
}
public function handleContact(Request $request)
{
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'phone'   => 'required|string|max:20',
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    // ບັນທຶກລົງຖານຂໍ້ມູນ
    Contact::create($validated);

    return back()->with('success', 'ຂໍ້ຄວາມຂອງທ່ານຖືກສົ່ງຮຽບຮ້ອຍແລ້ວ! ພວກເຮົາຈະຕິດຕໍ່ກັບໂດຍໄວ.');
}
public function about()
{
    return view('about');
}
}