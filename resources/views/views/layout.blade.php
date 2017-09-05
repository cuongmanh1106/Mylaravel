@extends('views.sub');
@section('title','Layout template')

@section('sidebar')
	@parent

	<!--su dung VONG LAP trong laravel-->
	<br>
	@for($i =0 ; $i <=10 ; $i++)
		stt:{{ $i }}
	@endfor
	<br>
	<?php $i = 0;?>
	@while($i<=10)
		STT:{{ $i }}<br>
		<?php $i++;?>

	@endwhile

	<!--Mang-->
	<?php $array=["com","Chao","Pho"]?>
	@foreach($array as $item)
		{{ $item }}
	@endforeach

@stop

@section('content')

Day la layout
<br>
<?php $hoten = "<b>Laravel MC</b>"?>
{{ $hoten }}
<br />
{!! $hoten !!}<!--khuyen dung-->

<br />
<!--su dung if trong laravel-->
<?php $diem = 10?>
@if($diem<=5)
	Hoc sinh YEu
@elseif ($diem<=7 && $diem>5)
	Hoc sinh TB
@else
	Hoc Sinh Gioi
@endif

{{ isset($diem) ? $diem:"Khong co dem"}}

<br />
{{ $diemm or "Khong ton tai bien diem"}}

<!--su dung VONG LAP trong laravel-->
@for($i =0 ; $i <=10 ; $i++)
	stt:{{ $i }}
@endfor

@stop

