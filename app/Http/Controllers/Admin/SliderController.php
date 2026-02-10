<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage; // ຢ່າລືມ Import ບ່ອນນີ້ຢູ່ທາງເທິງສຸດ
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. ດຶງຂໍ້ມູນຈາກ Database
        $sliders = Slider::latest()->get();

        // 2. ສົ່ງໄປຫາ View (ກວດເບິ່ງຊື່ View ໃຫ້ຖືກຕ້ອງ)
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
    $data = $request->validate([
        'image' => 'required|image|max:2048',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('sliders', 'public');
    }

    \App\Models\Slider::create($data);
    return redirect()->back()->with('success', 'ເພີ່ມຮູບສະໄລ້ສຳເລັດ!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // 1. ສະແດງຟອມແກ້ໄຂ
public function edit($id)
{
    $slider = \App\Models\Slider::findOrFail($id);
    return view('admin.sliders.edit', compact('slider'));
}

// 2. ບັນທຶກການອັບເດດ
public function update(Request $request, $id)
{
    $slider = \App\Models\Slider::findOrFail($id);

    $data = $request->validate([
        'image' => 'nullable|image|max:2048', // ບໍ່ບັງຄັບໃຫ້ໃສ່ຮູບໃໝ່
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);

    if ($request->hasFile('image')) {
        // ລຶບຮູບເກົ່າຖິ້ມກ່ອນ ຖ້າມີການອັບໂຫຼດຮູບໃໝ່
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        $data['image'] = $request->file('image')->store('sliders', 'public');
    }

    $slider->update($data);

    return redirect()->route('sliders.index')->with('success', 'ແກ້ໄຂຮູບສະໄລ້ສຳເລັດ!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // 1. ຊອກຫາຂໍ້ມູນສະໄລ້ຕາມ ID
    $slider = \App\Models\Slider::findOrFail($id);

    // 2. ກວດເບິ່ງວ່າໄຟລ໌ຮູບມີຢູ່ແທ້ບໍ່, ຖ້າມີໃຫ້ລຶບໄຟລ໌ອອກຈາກ Storage
    if ($slider->image) {
        Storage::disk('public')->delete($slider->image);
    }

    // 3. ລຶບຂໍ້ມູນອອກຈາກຖານຂໍ້ມູນ
    $slider->delete();

    // 4. ສົ່ງກັບໄປໜ້າເກົ່າ ພ້ອມຂໍ້ຄວາມແຈ້ງເຕືອນ
    return redirect()->route('sliders.index')->with('success', 'ລຶບຮູບສະໄລ້ສຳເລັດແລ້ວ!');

    }
    public function toggleStatus($id)
{
    $slider = \App\Models\Slider::findOrFail($id);
    $slider->is_active = !$slider->is_active; // ສະຫຼັບຄ່າ true/false
    $slider->save();

    return redirect()->back()->with('success', 'ປ່ຽນສະຖານະການສະແດງຜົນສຳເລັດ!');
}
}
