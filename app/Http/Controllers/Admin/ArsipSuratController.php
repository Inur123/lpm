<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArsipSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipSuratController extends Controller
{
    public function index(Request $request)
    {
        $query = ArsipSurat::query();

        // Filter cari kata kunci
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nomor_surat', 'like', "%$search%")
                    ->orWhere('subjek', 'like', "%$search%")
                    ->orWhere('pengirim', 'like', "%$search%");
            });
        }

        // Filter jenis surat
        if ($request->filled('jenis_surat')) {
            $query->where('jenis_surat', $request->jenis_surat);
        }

        // Filter tanggal
        if ($request->filled('date_from')) {
            $query->whereDate('tanggal_surat', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('tanggal_surat', '<=', $request->date_to);
        }

        // Ambil arsip dengan pagination
        $arsip = $query->latest()->paginate(10)->withQueryString();

        // Statistik kartu
        $totalLetters = $query->count(); // total sesuai filter
        $incomingLetters = (clone $query)->where('jenis_surat', 'Masuk')->count();
        $outgoingLetters = (clone $query)->where('jenis_surat', 'Keluar')->count();
        $thisMonthLetters = (clone $query)
            ->whereMonth('tanggal_surat', now()->month)
            ->whereYear('tanggal_surat', now()->year)
            ->count();

        return view('admin.arsip_surat.index', compact('arsip', 'totalLetters', 'incomingLetters', 'outgoingLetters', 'thisMonthLetters'));
    }



    public function create()
    {
        return view('admin.arsip_surat.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('arsip_surat', 'public');
        }

        ArsipSurat::create($data);

        return redirect()->route('arsip_surat.index')->with('success', 'Arsip surat berhasil ditambahkan');
    }

    public function show(ArsipSurat $arsipSurat)
    {
        return view('admin.arsip_surat.show', compact('arsipSurat'));
    }

    public function edit(ArsipSurat $arsipSurat)
    {
        return view('admin.arsip_surat.edit', compact('arsipSurat'));
    }

    public function update(Request $request, ArsipSurat $arsipSurat)
    {
        $data = $request->all();

        if ($request->hasFile('file')) {
            if ($arsipSurat->file) {
                Storage::disk('public')->delete($arsipSurat->file);
            }
            $data['file'] = $request->file('file')->store('arsip_surat', 'public');
        }

        $arsipSurat->update($data);

        return redirect()->route('arsip_surat.index')->with('success', 'Arsip surat berhasil diupdate');
    }

    public function destroy(ArsipSurat $arsipSurat)
    {
        if ($arsipSurat->file) {
            Storage::disk('public')->delete($arsipSurat->file);
        }

        $arsipSurat->delete();

        return redirect()->route('arsip_surat.index')->with('success', 'Arsip surat berhasil dihapus');
    }
}
