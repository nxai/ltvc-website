<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index() {
        $logo = Setting::where('key', 'site_logo')->first();
        return view('admin.settings.index', compact('logo'));
    }

    public function updateLogo(Request $request) {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            // 1. ຊອກຫາ Record ເກົ່າ
            $setting = Setting::firstOrCreate(['key' => 'site_logo']);

            // 2. ລຶບຮູບເກົ່າ (ຖ້າມີ)
            if ($setting->value) {
                Storage::disk('public')->delete($setting->value);
            }

            // 3. ເກັບຮູບໃໝ່
            $path = $request->file('logo')->store('settings', 'public');
            $setting->update(['value' => $path]);
        }

        return redirect()->back()->with('success', 'ອັບເດດ Logo ວິທະຍາໄລສຳເລັດ!');
    }
}