<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $table = 'products'; // Nama tabel di database
    protected $fillable = ['name', 'price', 'size', '', 'image'];


    public function storeImage($file)
{
    $file_name = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('images', $file_name, 'public');
    return $file_name;
}
}
