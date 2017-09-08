<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validation; // bai 37
use App\san_pham;//them model
use App\Http\Requests\san_phamRequest; //them request

class Mycontroller extends Controller
{
    //
    public function hello()
    {
    	//echo "hello everyone";

    	return view('thongtin');//goi view
    }

    //bai 5: dinh danh
    public function HC()
    {
    	echo "Action trong Mycontroller";
    	return redirect()->route("hcm");
    }

    public function index()
    {
        return "Welcome MC";
    }
    public function Them(san_phamRequest $request)
    {
        //bai 37 validation

        /*chuyen qua san_phamRequest.php bai 38

        // $v = Validator::make($request->all(),
        //     [
        //         'ten'=>'required|unique:san_pham,ten_mon_hoc', //require:bat buoc nhap  unique:ten_bang,ten_field (khong duoc nhap trung)
        //         'gia'=>'required',
        //         'loai_sp'=>'required'
        //     ],
        //     [
        //         'ten.required'=>'vui long nhap ten mon hoc',//chuyen thong bao loi theo y muon
        //         'gia.required'=>'vui long nhap gia'
        //
             ]);
        */
        
        $san_pham = new san_pham();
        $san_pham->ten_mon_hoc = $request->ten;
        $san_pham->gia = $request->gia;
        $san_pham->ghichu = $request->ghichu;
        $san_pham->loai_sp = $request->loai_sp;
        $san_pham->hinh = $request->file('f_img')->getClientOriginalName();
        $san_pham->save();
        echo "<script>alert('Them thanh cong')</script>";
        return redirect('form-dangki');
    }

    //bai 40
    public function Upload(san_phamRequest $request)
    {

        // echo "Ten hinh:".$request->file('f_img')->getClientOriginalName()."<br>";
        // echo "Size:".$request->file('f_img')->getSize()."<br>";
        // echo "Đường dẫn:".$request->file('f_img')->getRealPath()."<br>";
        // echo "Loại hình:".$request->file('f_img')->getMimeType()."<br>";
        $san_pham = new san_pham();
        $san_pham->ten_mon_hoc = $request->ten;
        $san_pham->gia = $request->gia;
        $san_pham->ghichu = $request->ghichu;
        $san_pham->loai_sp = $request->loai_sp;
        $san_pham->hinh = $request->file('f_img')->getClientOriginalName();
        $img = $request->file('f_img');
        $img_name = $img->getClientOriginalName();
        $des = "public/upload/images";
        $img->move($des,$img_name);
        $san_pham->save();
        
        return redirect('form-upload');
    }

}

