<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategorri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('back.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategorri::all();
        return view('back.artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');
        Artikel::create($data);
        return redirect()->route('artikel.index')->with(['success' => 'Artikel baru ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategorri::all();
        $artikel = Artikel::findOrFail($id);
        return view('back.artikel.edit', compact('kategori', 'artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        // dd($request);
        $artikel->update([
            'judul' => $request->judul,
            'body' => $request->body,
            'slug' => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'is_active' => $request->is_active,
            'user_id' => Auth::id(),
        ]);
        if ($request->hasFile('gambar_artikel')) {
            Storage::delete($artikel->gambar_artikel);
            $artikel->update([
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel')
            ]);
        }
        return redirect()->route('artikel.index')->with(['success' => 'Artikel berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        Storage::delete($artikel->gambar_artikel);
        $artikel->delete();
        return redirect()->route('artikel.index')->with(['success' => 'Artikel berhasil dihapus']);
    }
}