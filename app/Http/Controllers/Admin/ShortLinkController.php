<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
   public function index()
{
    $links = ShortLink::latest()->paginate(10); // ✅ gunakan paginate
    return view('admin.shortlinks.index', compact('links'));
}

    public function create()
    {
        return view('admin.shortlinks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'slug' => 'required|alpha_dash|unique:short_links,slug',
        ], [
            'slug.required' => 'Custom link wajib diisi.',
            'slug.alpha_dash' => 'Url hanya boleh huruf, angka, strip (-), dan underscore (_).',
            'slug.unique' => 'Url sudah digunakan, pilih yang lain.',
        ]);

        ShortLink::create([
            'slug' => $request->slug,
            'original_url' => $request->original_url,
        ]);

        return redirect()
            ->route('shortlinks.index')
            ->with('success', 'Link berhasil dibuat: ' . url($request->slug));
    }

    public function edit($id)
    {
        $link = ShortLink::findOrFail($id);
        return view('admin.shortlinks.edit', compact('link'));
    }

    public function update(Request $request, $id)
    {
        $link = ShortLink::findOrFail($id);

        $request->validate([
            'original_url' => 'required|url',
            'slug' => 'required|alpha_dash|unique:short_links,slug,' . $link->id,
        ]);

        $link->update([
            'slug' => $request->slug,
            'original_url' => $request->original_url,
        ]);

        return redirect()
            ->route('shortlinks.index')
            ->with('success', 'Link berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $link = ShortLink::findOrFail($id);
        $link->delete();

        return redirect()
            ->route('shortlinks.index')
            ->with('success', 'Link berhasil dihapus.');
    }

  public function redirect($slug)
{
    $link = ShortLink::where('slug', $slug)->firstOrFail();
    return view('admin.shortlinks.redirect', compact('link'));
}
}
