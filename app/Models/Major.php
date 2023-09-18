<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    public $guarded = [];

    public static $rules = [
        'title'=>'required|string|max:255|unique:majors,title',
    ];

    public const Major_PATH = 'uploads/majors/';


    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
