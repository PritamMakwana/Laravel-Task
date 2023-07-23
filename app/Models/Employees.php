<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;

class Employees extends Model
{
    use HasFactory;

    protected $table="employees";

    protected $fillable = [
     'first_name',
     'last_name',
     'company',
     'email',
     'phone',
     'profile_picture'
    ];

    public function companyData(){
        return $this->belongsTo(Companies::class,'company','id');
    }



}
