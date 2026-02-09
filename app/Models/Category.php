<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'categories';
    protected $fillable = ['ket_kategori'];

  public function aspirations()
{
    return $this->hasMany(Aspiration::class, 'id_kategori');
}

}
