<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostExchange extends Model
{
    use HasFactory;

    protected $table = 'bdtraodoi';
    protected $fillable = [
        'id_user',
        'id_baidang',
        'Tendovat',
        'id_danhmuc',
        'Soluong',
        'Slmuondoi',
        'Diachi',
        'Mota',
        'Hinhanh',
        'Gia',
        'trangthai',
    ];
    public function traodoi()
    {
        return $this->belongsTo(Post::class, 'id_baidang', 'id');
    }
    public function danhmuc()
    {
        return $this->belongsTo(Menu::class, 'id_danhmuc', 'id');
    }
}
