<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Department;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDepartments = Department::count();
        $totalCourses = Course::count();
        $totalNews = News::count();

        // ດຶງ 5 ຫຼັກສູດລ່າສຸດ
        $recentCourses = Course::with('department')->latest()->take(5)->get();

        // ນັບຂໍ້ຄວາມທີ່ຍັງບໍ່ທັນອ່ານ
        $unreadMessages = Contact::where('is_read', false)->count();

        // ດຶງ 5 ຂໍ້ຄວາມລ່າສຸດ
        $recentMessages = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalDepartments', 'totalCourses', 'totalNews',
            'recentCourses', 'unreadMessages', 'recentMessages'
        ));
    }
}