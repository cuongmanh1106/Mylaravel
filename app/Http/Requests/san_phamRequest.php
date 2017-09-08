<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class san_phamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //bai 38
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ten'=>'required|unique:san_pham,ten_mon_hoc', //require:bat buoc nhap  unique:ten_bang,ten_field (khong duoc nhap trung)
            'gia'=>'required',
            'loai_sp'=>'required',
            'f_img' => 'required|image|max:150' 
                ];
    }
    public function messages(){ //Phai viet dung ten messages nha
        return [
                'ten.required'=>'vui long nhap ten mon hoc',//chuyen thong bao loi theo y muon
                'ten.unique'=>'Ten san pham da ton tai',
                'gia.required'=>'vui long nhap gia',
                'f_img.max'=>'Hinh k qua 150KB'

                ];
        
    }
}
