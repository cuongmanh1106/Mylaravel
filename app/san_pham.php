<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    protected $table = 'san_pham';
    protected $fillable = ['id','ten_mon_hoc','gia','loai_sp'];	

    public $timestamps = false; //khong hien timestamp
    
}
