<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisposisiController extends Controller
{
    public function index()
    {
        // Ambil semua data disposisi beserta relasi surat dan user
        $disposisis = Disposisi::with(['surat', 'dari'])->latest()->get();

        return view('admin.disposisi', compact('disposisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'surat_id' => 'required|exists:surat_masuks,id',
            'kepada_bidang' => 'required|array',
            'kepada_bidang.*' => 'string',
            'isi_disposisi' => 'required|string',
        ]);

        Disposisi::create([
            'surat_id' => $request->surat_id,
            'dari_id' => Auth::id(),
            'kepada_bidang' => implode(',', $request->kepada_bidang),
            'isi_disposisi' => $request->isi_disposisi,
            'tanggal' => now(),
        ]);

        // Tambahkan setelah Disposisi::create(...);
        $surat = SuratMasuk::find($request->surat_id);
        $surat->status_disposisi = 'Didisposisikan';
        $surat->save();

        return redirect()->route('kepala.dataSuratMasuk')->with('success', 'Disposisi berhasil dikirim!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Disposisi $disposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disposisi $disposisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disposisi $disposisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disposisi $disposisi)
    {
        //
    }
    public function detail($id)
{
    $disposisi = Disposisi::with(['surat', 'dari'])->findOrFail($id);
    return view('admin.detail_disposisi', compact('disposisi'));
}

}
