<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('hoclaravel',function(){
	echo "Hello mc";
});

Route::get('thongtin','Mycontroller@hello');

//bai 4:route co ban
Route::get('mc/mc-dep-trai',function(){
	return "Khoa hoc Laravel";
});	
Route::get('lap-trinh/{monhoc}/{thoigian}',function($monhoc,$thoigian){
	return "Khoa hoc $monhoc luc:".$thoigian ;
});
Route::get('mon-an/{tenmonan?}',function($tenmonan="ABC"){
	return $tenmonan;
});
//them dk cho cac tham so cho an toan
Route::get('nha-hang/{ten}/{tuoi}',function($ten,$tuoi){
	return "Thong tin cua ban la:$ten $tuoi";
})->where(['ten'=>'[a-zA-Z]+','tuoi'=>'[0-9]']);


//bai 5 :
Route::get('call-view',function(){
	$hoten = "Cuong dep Zai";
	$view = "admin";
	return view('thongtin',compact('hoten','view'));
});
//dinh danh
Route::get('h-c-m','Mycontroller@HC');
Route::get('quoc-te',['as'=>'hcm',function(){
	return "HCM dep lam ban oi";
}]);
//gom nhom

Route::group(['prefix'=>'thuc-don'],function(){

	Route::get('bun-bo',function(){
		echo "Ban bun bo";
	});
	Route::get('bun-mam',function(){
		echo "Ban bun mam";
	});
});

//goi view bai6
Route::get('goi-view',function(){
	return view('layout.sub.view');
});
Route::get('goi-layout',function(){
	return view('layout.sub.view2');
});
//view share
View::share('title','Lap tring Laravel');//share duoc tat ca cac view
//view composer
View::composer(['layout.sub.view2','layout.sub.view'],function($view){ //chi share nhung view duoc chi dinh
	return $view->with('thongtin','Day la trang chinh');
});
//kkiem tra su ton tai cua mot view 
Route::get('check-view',function(){
	if(view()->exists('layout.sub.views'))
	{
		echo "ton tai view";
	}
	else
	{
		echo "khong ton tai view";
	}
});

//Bai7:tim hieu ve Blade Template P1

Route::get('goi-view1',function(){
	return view('views.layout');
});
Route::get('Nhung_sub_view',function(){
	return view();
});

//URL
Route::get('url/full',function(){
	return URL::full();
});
Route::get('url/asset',function(){
	//return URL::asset('css/style.css');
	return asset('css/style.css',true);//true la https
});
//kem theo bien
Route::get('url/to',function(){
	return URL::to('nha-hang',['abc','2']);
});

//Databse tao bang
Route::get('schema/create',function(){
	Schema::create('san_pham',function($table){
		$table->increments('id');
		$table->string('ten_mon_hoc',500);
		$table->integer('gia');
		$table->text('ghichu')->nullable();//co hoac khong co
		$table->timestamps();
	});
});

//thay doi ten bang
Route::get('schema/rename',function(){
	return Schema::rename('san_pham','sanpham');//ten bang hien tai, ten bang muon chuyen
});

//xoa bang
Route::get('schema/drop',function(){
	Schema::drop('sanpham');
});
Route::get('schema/dropexist',function(){
	Schema::dropIfExists('san_pham');
});

//thay doi thuoc tinh cua mot cot
Route::get('schema/change-col',function(){
	Schema::table('san_pham',function($table){
		$table->string('ten_mon_hoc',100)->changle();
	});
});

//Query Builder

//lay toan bo du lieu
Route::get('query/get-all',function(){
	$data = DB::table('loaisp')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/get-col',function(){
	$data = DB::table('loaisp')->select('hoten')->where('id',2)->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/where-or',function(){
	$data = DB::table('loaisp')->where('id',1)->orwhere('hoten','manh huy')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/where',function(){
	$data = DB::table('loaisp')->where('id',1)->where('hoten','manh cuong')->get(); //dk AND
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/order',function(){
	$data = DB::table('loaisp')->select('hoten','id')->where('id','>','1')->orderBy('id','ASC')->get(); 
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/limit',function(){
	$data = DB::table('loaisp')->skip(1)->take(2)->orderBy('id','ASC')->get(); //limit 1,2
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/between',function(){
	$data = DB::table('loaisp')->wherebetween('id',[2,3])->orderBy('id','ASC')->get(); //limit 1,2
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/not-between',function(){
	$data = DB::table('loaisp')->whereNotBetween('id',[2,3])->orderBy('id','ASC')->get(); //limit 1,2
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/where-in',function(){
	$data = DB::table('loaisp')->whereIn('id',[2])->orderBy('id','ASC')->get(); //limit 1,2
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/where-not-in',function(){
	$data = DB::table('loaisp')->whereNotIn('id',[2])->orderBy('id','ASC')->get(); //limit 1,2
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});
Route::get('query/count',function(){
	$data = DB::table('loaisp')->count();
	echo $data;
});
Route::get('query/max',function(){
	$data = DB::table('loaisp')->min('id');
	echo $data;
});
Route::get('query/avg',function(){
	$data = DB::table('loaisp')->avg('id');
	echo $data;
});
Route::get('query/sum',function(){
	$data = DB::table('loaisp')->sum('id');
	echo $data;
});
//join cac bang vs nhau
Route::get('query/join',function(){
	$data = DB::table('loaisp')->join('san_pham','loaisp.id','=','san_pham.loai_sp')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});
//insert 
Route::get('query/insert',function(){
	DB::table('loaisp')->insert([
		'hoten'=>'huy tien',
		'sdt' => '012365412',
		'email'=>'tiendp@gmail.com'
		]);
	return "Insert thanh cong";
});
//insertgetID: lay id cua du lieu vua insert
Route::get('query/insertGetID',function(){
	$id = DB::table('loaisp')->insertGetID([
		'hoten'=>'Phuong duy',
		'sdt' => '0122222223',
		'email'=>'pd@gmail.com'
		]);
	echo $id;
});

//UPDATE
Route::get('query/update',function(){
	DB::table('loaisp')->where('id',4)->update(['hoten'=>'Ha Mia','sdt'=>'06547699','email'=>'mia@gmail.com']);
	return "Update thanh cong";
});

Route::get('query/delete',function(){
	DB::table('loaisp')->where('id',5)->delete();
	return "delete thanh cong";
});

//ORM
Route::get('model/select-all',function(){
	$data = App\san_pham::all()->toJson();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('model/select-id',function(){
	$data = App\san_pham::find(3)->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('model/select-idfail',function(){
	$data = App\san_pham::findOrFail(4)->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});
Route::get('model/where',function(){
	$data = App\san_pham::where('gia',500000)->firstOrFail()->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});
Route::get('model/limit',function(){
	$data = App\san_pham::select('ten_mon_hoc')->skip(1)->take(2)->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});
Route::get('model/count',function(){
	$data = App\san_pham::count();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});
//truyen tham so
Route::get('model/raw',function(App\san_pham $san_pham){
	$data = $san_pham::whereRaw('gia=? OR gia=?',[50000,70000])->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});
//Them dl
Route::get('model/insert',function(){
	$san_pham = new App\san_pham;
	$san_pham->ten_mon_hoc='Ao jean';
	$san_pham->gia=10000;
	$san_pham->ghichu='thick';
	$san_pham->loai_sp='3';
	$san_pham->save();
	echo "finish";

});
// route::get('model/create',function(){
// 	$data = array(
// 		'ten_mon_hoc'=>'Belt',
// 		'gia'=>160000,
// 		'ghichu'=>'loose',
// 		'loai_sp'=>3
// 		);
// 	App\san_pham::create($data);
// 	echo "finish";

// });

Route::get('model/update',function(){
	$san_pham = App\san_pham::find(4);
	$san_pham->ten_mon_hoc='quan jean';
	$san_pham->gia=100000;
	$san_pham->save();
});

Route::get('model/delete',function(){
	App\san_pham::destroy(4);
});

Route::get('relation/one-many',function(){
	$data = App\loaisp::find(1)->san_pham()->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";

//form request
});
Route::get('form/layout',function(){
	return view('form/layout');
});


Route::post('form-data',['as'=>'send-data',function(){
	return "gui thanh cong";
}]);
//bai 36
Route::get('form-dangki',function(){
	return view('form.dangki');
});
Route::post('form/dk-tv',['as'=>'dang-ki','uses'=>'Mycontroller@Them']);
//bai 37:

//bai 39


//bai 40: upload file
Route::get('form-upload',function(){
	return view('form.upload');
});
Route::post('form/file',['as'=>'up-load','uses'=>'Mycontroller@Upload']);


//Bai 42:response

Route::get('res/json',function(){
	$arr = array(
		'mon hoc'=>'Laravel FrameWork 5.x',
		'Hoc vien'=>'Nguyen Manh Cuong',
		'thoi gian'=>'right now'
		);
	return Response::json($arr);
});

Route::get('res/xml',function(){
	$content = '<?xml version="1.0" encoding ="UTF-8" ?>
		<root>
			<lop>D14CQCN01</lop>
			<danhsach>
				<sv>Nguyễn Mạnh Cường</sv>
				<sv>Nguyễn huy Tiến</sv>
				<sv>Đoàn Phương Duy</sv>
			</danhsach>
		</root>	
	';
	$status = 200;
	$value = 'text/xml';
	return Response($content,$status)->header('Content-Type',$value);
});
//bai 43 redirect

Route::get('res/redirect',function(){
	return redirect('res/xml');
});

Route::get('res/demo',['as'=>'demo',function(){
	return view('Redirect.form');
}]);
//redirect 1 route res/demo
Route::get('res/redirect-route',function(){
	return redirect()->route('demo');
});

//redirect with a messge;
//refresh lai trang sẽ mât message
Route::get('res/redirect-route',function(){
	return redirect()->route('demo')->with([
			'level' =>'danger',
			'message'=>'Chao ban'
		]);
});

Route::get('res/redirect-back',function(){
	return redirect()->back();
});
Route::get('res/download',function(){

	$url='public/download/demo.rar';
	return Response::download($url);
});
Route::get('res/downloadAndDelete',function(){
	
	$url='public/download/demo.rar';
	return Response::download($url)->deleteFileAfterSend(true);
});
//Bai 44
//In hoa chu cai
Route::get('res/macro-cap',function(){
	return Response()->cap('manh cuong hoc lap trinh laravel');
});

Route::get('res/input',function(){
	return Response()->input('http://localhost:81/Mylaravel/res/macro-cap');
});


//Bai 45
Route::get('auth/login',['as'=>'getLogin','uses'=>'ThanhVienController@getLogin']);
Route::post('auth/login',['as'=>'postLogin','uses'=>'ThanhVienController@postLogin']);





route::any('{all?}','Mycontroller@index')->where('all','(.*)'); //chuyen tat ca url khong co ve trang chu

	


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
