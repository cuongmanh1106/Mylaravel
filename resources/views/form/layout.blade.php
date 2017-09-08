{!! Form::open(array('route'=>'send-data', 'files'=>true)) !!}

{!! Form::label('hoten','Ho ten')!!}
{!! Form::text('txtHoten','',array('class'=>'input','placeholder'=>'vui long nhap')) !!} <br><br>

{!! Form::label('mk','Mat khau')!!}
{!! Form::password('txtMK','',array('class'=>'input')) !!} <br><br>

{!! Form::label('email','Emai;')!!}
{!! Form::email('txtEmail','',array('class'=>'input')) !!} <br><br>

{!! Form::label('ghichu','Ghi chu')!!}
{!! Form::textarea('txtGhichu','',array('class'=>'input' , 'rows'=>'5')) !!} <br><br>

{!! Form::label('gt','Gioi tinh')!!}
{!! Form::radio('rdoGT','nam',true) !!}Nam
{!! Form::radio('rdoGT','nu') !!}Nu <br><br>

{!! Form::label('tp','Thanh pho')!!}
{!! Form::select('txtGhichu',array(
									'hn'=>'Ha noi',
									'h'=>'Hue',
									'hcn'=>"Ho Chi Minh"
									),'h') !!} <br><br>

{!! Form::label('mh','Mon Hoc')!!}
{!! Form::checkbox('chkMH','toan',true) !!}Toan
{!! Form::checkbox('chkMH','php') !!}PHP
{!! Form::checkbox('chkMH','android') !!}Android <br><br>

{!! Form::hidden('chkHid','MC') !!}

{!! Form::file('fImg') !!}<br><br>

{!! Form::submit('gui') !!}
{!! Form::button('nhap') !!}
{!! Form::reset('xoa') !!}

{!! Form::close() !!}
