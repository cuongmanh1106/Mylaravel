@if(count($errors) > 0)
	<ul>
		@foreach($errors->all() as $error)
		<li>{!! $error !!}</li>
		@endforeach
	</ul>

@endif
<form method="POST" enctype="multipart/form-data" action="{!! route('dang-ki') !!}">
     <input type="hidden" name="_token" value="{!! csrf_token() !!}">
	Ten_SP:<input type="text" name="ten"> {!! $errors->first('ten') !!}<br>   <!--bai 39-->
	Gia:<input type="text" name="gia">{!! $errors->first('gia') !!}<br>
	Ghichu:<input type="text" name="ghichu">{!! $errors->first('ghichu') !!}<br>
	Loai san Pham:<input type="text" name="loai_sp">{!! $errors->first('loai_sp') !!}<br>
	hinh:<input type="file" name="f_img"><br>
	<input type="submit" name="subGui" value="Gui">
</form>