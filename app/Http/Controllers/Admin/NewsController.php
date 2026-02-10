<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // ສະແດງລາຍຊື່ຂ່າວ
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    // ບັນທຶກຂ່າວໃໝ່
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // ຮອງຮັບ 2MB
        ]);

        if ($request->hasFile('image')) {
            // ອັບໂຫຼດໄປໄວ້ໃນ folder 'news' ໃນ disk 'public'
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'ເພີ່ມຂ່າວສານສຳເລັດແລ້ວ!');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    // ອັບເດດຂໍ້ມູນຂ່າວ
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // ລຶບຮູບເກົ່າຖ້າມີການອັບໂຫຼດຮູບໃໝ່
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'ອັບເດດຂ່າວສານສຳເລັດແລ້ວ!');
    }

    // ລຶບຂ່າວ
    public function destroy(News $news)
    {
        // ລຶບຮູບພາບອອກຈາກ Storage ກ່ອນລຶບຂໍ້ມູນໃນ DB
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'ລຶບຂ່າວສານສຳເລັດແລ້ວ!');
    }
}