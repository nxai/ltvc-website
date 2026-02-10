<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. ນັບຈຳນວນພາກວິຊາທັງໝົດ
        $totalDepartments = Department::count();

        // 2. ນັບຈຳນວນຫຼັກສູດທັງໝົດ
        $totalCourses = Course::count();
        $totalNews = \App\Models\News::count(); // ເພີ່ມບັນທັດນີ້
        // 3. ດຶງ 5 ຫຼັກສູດລ່າສຸດທີ່ຫາເພີ່ມເຂົ້າ
        $recentCourses = Course::with('department')->latest()->take(5)->get();
        // ນັບຂໍ້ຄວາມທີ່ຍັງບໍ່ທັນອ່ານ
    $unreadMessages = \App\Models\Contact::where('is_read', false)->count();
    // ດຶງ 5 ຂໍ້ຄວາມລ່າສຸດ
    $recentMessages = \App\Models\Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalDepartments', 'totalCourses','totalNews', 'recentCourses','unreadMessages', 'recentMessages'));
    }
}