<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisp extends Model
{
    protected $table = 'loaisp';
    protected $fillable = ['id','hoten','sdt','email'];	

    public $timestamps = false; //khong hien timestamp

    public function san_pham(){
    	    return $this->hasMany('App\san_pham');

    }
}
