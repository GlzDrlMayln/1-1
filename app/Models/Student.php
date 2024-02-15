<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ["name","age","address"];
    use HasFactory;

    public function countries() {
        return $this->hasOne(Countries::class);
    }

    public function academics() {
        return $this->hasOne(Academics::class);
    }
}
