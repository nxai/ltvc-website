<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController; // Import Controller ໃໝ່
use App\Http\Controllers\Admin\NewsController as AdminNews;
use App\Models\News;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ສ່ວນຂອງໜ້າເວັບຫຼັກ (Public) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// ເພີ່ມ Route ນີ້ເຂົ້າໄປສຳລັບຮັບຂໍ້ມູນຈາກຟອມ
Route::post('/contact', [HomeController::class, 'handleContact'])->name('contact.send');
// ໜ້າ About
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/departments', [App\Http\Controllers\HomeController::class, 'allDepartments'])->name('departments.index');
Route::get('/department/{id}', [HomeController::class, 'show'])->name('department.show');
Route::get('/department/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('department.show');
// ປ່ຽນຊື່ບ່ອນນີ້: ຈາກ departments.index ໃຫ້ເປັນ public.departments.index
// --- ສ່ວນຂອງຄົນທົ່ວໄປ ---
Route::get('/news', function() {
    $news = News::latest()->paginate(9);
    return view('news.index', compact('news'));
})->name('news.index');

// ປັບປຸງ Route ນີ້ໃນໄຟລ໌ routes/web.php
Route::get('/news/{id}', function($id) {
    // 1. ດຶງຂໍ້ມູນຂ່າວທີ່ກຳລັງອ່ານ
    $news = \App\Models\News::findOrFail($id);

    // 2. ນັບຍອດວິວ
    $news->increment('views');

    // 3. ດຶງຂ່າວອື່ນໆ 3 ອັນ (ທີ່ບໍ່ແມ່ນ ID ປັດຈຸບັນ) ເພື່ອສົ່ງໄປເປັນ Related News
    $relatedNews = \App\Models\News::where('id', '!=', $id)
                                    ->latest()
                                    ->take(3)
                                    ->get();

    // 4. ສົ່ງຕົວປ່ຽນທັງ $news ແລະ $relatedNews ໄປຫາ View
    return view('news.show', compact('news', 'relatedNews'));
})->name('news.show');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/logo', [App\Http\Controllers\Admin\SettingController::class, 'updateLogo'])->name('settings.updateLogo');
});
// --- ສ່ວນຂອງ Admin (ຕ້ອງ Login ກ່ອນ - Middleware: Auth) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. ໜ້າ Dashboard (ສະແດງສະຖິຕິລວມ)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin/news', AdminNews::class)->names('admin.news');
    Route::patch('/admin/sliders/{id}/toggle', [App\Http\Controllers\Admin\SliderController::class, 'toggleStatus'])->name('sliders.toggle');
    Route::resource('admin/sliders', App\Http\Controllers\Admin\SliderController::class);
    Route::resource('admin/sliders', SliderController::class);
Route::resource('admin/departments', DepartmentController::class);
    // ຈັດການພາກວິຊາ (ກຳນົດ .names ໃຫ້ຊັດເຈນ)
    Route::resource('admin/departments', DepartmentController::class)->names([
        'index' => 'admin.departments.index',
        'create' => 'admin.departments.create',
        'store' => 'admin.departments.store',
        'edit' => 'admin.departments.edit',
        'update' => 'admin.departments.update',
        'destroy' => 'admin.departments.destroy',
    ]);

    // 3. ຈັດການຂໍ້ມູນຫຼັກສູດ (CRUD & Live Search)
    // ໝາຍເຫດ: Route Resource ນີ້ຈະຮອງຮັບທັງ index, store, edit, update, destroy
    Route::resource('admin/courses', CourseController::class);

    // 4. ຈັດການ Profile ຜູ້ໃຊ້ (Breeze Default)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';