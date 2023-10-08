<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $table = 'ttnguoidung';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'Sdt',
        'Diachi',
        'Anhdaidien',
        'Sodu',
    ];
    public function detail()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
