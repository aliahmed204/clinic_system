<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];

    public static $rules = [
        'name'=>'required|string|max:255',
        'major_id'=>'required|exists:majors,id',
    ];

    public const IMAGE_PATH = 'uploads/doctors/';

    public function major(){
        return $this->belongsTo(Major::class);
    }
}
