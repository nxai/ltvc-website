<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\News;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =========================================================================
// ສ່ວນໜ້າເວັບສາທາລະນະ (Public)
// =========================================================================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/mission', fn () => view('mission'))->name('mission');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'handleContact'])->name('contact.send');

// ພາກວິຊາ
Route::get('/departments', [HomeController::class, 'allDepartments'])->name('departments.index');
Route::get('/department/{id}', [HomeController::class, 'show'])->name('department.show');

// ຂ່າວສານ
Route::get('/news', function () {
    $news = News::latest()->paginate(9);
    return view('news.index', compact('news'));
})->name('news.index');

Route::get('/news/{id}', function ($id) {
    $news = News::findOrFail($id);
    $news->increment('views');

    $relatedNews = News::where('id', '!=', $id)
        ->latest()
        ->take(3)
        ->get();

    return view('news.show', compact('news', 'relatedNews'));
})->name('news.show');

// =========================================================================
// ສ່ວນ Admin (ຕ້ອງ Login ກ່ອນ)
// =========================================================================

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // ຂ່າວສານ
    Route::resource('news', AdminNewsController::class);

    // Sliders
    Route::patch('sliders/{id}/toggle', [SliderController::class, 'toggleStatus'])->name('sliders.toggle');
    Route::resource('sliders', SliderController::class);

    // ພາກວິຊາ
    Route::resource('departments', DepartmentController::class);

    // ຫຼັກສູດ
    Route::resource('courses', CourseController::class);

    // ຂໍ້ຄວາມຕິດຕໍ່
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // ຕັ້ງຄ່າ
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/logo', [SettingController::class, 'updateLogo'])->name('settings.updateLogo');
});

// =========================================================================
// Profile (Breeze Default)
// =========================================================================

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';