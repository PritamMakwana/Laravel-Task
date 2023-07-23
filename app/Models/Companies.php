<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;

class Companies extends Model
{
    use HasFactory;

    protected $table="companies";

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];


    public function foreignEmployee(){
        return $this->hasMany(Employees::class,'company','id');
    }

}
