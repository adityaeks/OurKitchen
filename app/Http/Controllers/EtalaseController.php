<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EtalaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pageTitle = 'Daftar Produk';
        $products = Product::all();

        return view('admin.etalase.index', compact('pageTitle', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pageTitle = 'Tambah Produk Baru';

        return view('admin.etalase.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3148',
            'name' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|numeric',
        ]);

        $product = new Product();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $product->storeImage($file); // Simpan gambar ke direktori storage/app/public/images dan dapatkan nama filenya
            $product->image = $file_name;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->size = $request->size;

        $product->save();

        return redirect()->route('admin.etalase.index')->with('success', 'Produk telah ditambahkan');
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
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        $pageTitle = 'Edit Produk: ' . $product->name;

        return view('admin.etalase.edit', compact('pageTitle', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|numeric',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->size = $request->size;

        // Cek apakah ada file gambar baru diunggah
        if ($request->hasFile('image')) {
            // Hapus foto lama dari storage jika ada
            if (!empty($product->image)) {
                Storage::delete('images/' . $product->image);
            }

            // Unggah foto baru dan simpan nama file ke dalam database
            $file = $request->file('image');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $file_name);
            $product->image = $file_name;
        }

        $product->save();

        return redirect()->route('admin.etalase.index')->with('success', 'Produk telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        // Hapus foto dari storage jika ada
        if (!empty($product->image)) {
            Storage::delete('public/images/' . $product->image);
        }

        // Hapus data produk dari database
        $product->delete();

        return redirect()->route('admin.etalase.index')->with('success', 'Produk telah dihapus');
    }
}
