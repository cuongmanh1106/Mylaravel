<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    protected $table = 'thanhvien';
    protected $fillable = ['id','user','pass','level'];	

    public $timestamps = false; //khong hien timestamp
}
