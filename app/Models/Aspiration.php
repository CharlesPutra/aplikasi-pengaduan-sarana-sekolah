<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'aspirations';
    protected $fillable = [
        'student_id',
        'id_kategori',
        'lokasi',
        'ket',
        'status',
        'feedback'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

  public function category()
{
    return $this->belongsTo(Category::class, 'id_kategori');
}

}
