<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'nis',
        'kelas',
    ];

    /**
     * Relasi ke user (1 student milik 1 user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function aspirations()
    {
        return $this->hasMany(Aspiration::class);
    }
}
