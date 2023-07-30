<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $pageTitle = 'Daftar Produk';
        $products = Product::all();

        return view('products.index', compact('pageTitle', 'products'));
    }
    public function create()
    {
        $pageTitle = 'Tambah Produk Baru';

        return view('products.create', compact('pageTitle'));
    }


    public function store(Request $request)
{
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

    return redirect()->route('products.index')->with('success', 'Produk telah ditambahkan');
}
public function edit($id)
{
    $product = Product::find($id);
    $pageTitle = 'Edit Produk: ' . $product->name;

    return view('products.edit', compact('pageTitle', 'product'));
}

    /**
     * Memperbarui produk yang ada di dalam database.
     */
    public function update(Request $request, $id)
{
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

    return redirect()->route('products.index')->with('success', 'Produk telah diperbarui');
}
public function destroy($id)
    {
        $product = Product::find($id);
            // Hapus foto dari storage jika ada
        if (!empty($product->image)) {
            Storage::delete('public/images/' . $product->image);
        }

        // Hapus data produk dari database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk telah dihapus');
    }



    public function listmadu()
    {
        $pageTitle = 'Daftar madu';
        $products = Product::all();

        return view('products.listmadu', compact('pageTitle', 'products'));
    }

}
