<!DOCTYPE html>
<html>
<head>

	<title>Lapor Online SMA UAS Kelas 11</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript"> $("#fab-dom-order").click(function() {
		$([document.documentElement, document.body]).animate({
			scrollTop: $('.container').offset().top
		}, 2000);
	});</script>


	<link rel="stylesheet" type="text/css" href="{{asset('css/float.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/dropdown.css')}}"/>

</head>
<body>


	@if(count($errors)>0)
	<div class="alert alert-danger">
		Upload Validation Error<br><br>
		<ul>
			@foreach($erros->all() as $error)
			<li>{{error}}</li>
			@endforeach
		</ul>
	</div>
	@endif

	@if($message = Session::get('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>{{$message}}</strong>
	</div>	
	@endif
	<form method="post" enctype="multipart/form-data" action="{{url('/GuruUas11/importUas11')}}">
		{{csrf_field()}}
		<div class="form-group">
			<table class="table">
				<tr>
					<td width="40%" align="right"><label>Select File for Upload</label></td>
					<td width="30">
						<input type="file" name="select_file" />
					</td>
					<td width="30%" align="left">
						<input type="submit" name="upload" class="btn btn-primary" value="Upload">
					</td>
				</tr>
				<tr>
					<td width="40%" align="right"></td>
					<td width="30"><span class="text-muted">.xls, .xslx</span></td>
					<td width="30%" align="left"></td>
				</tr>
			</table>
		</div>
	</form>
	<button type="button" id="fab-dom-order " class="btn fa-arrow btn-primary floatingActionButton text-center">
		BACK to TOP
	</button> 
	<form method="post" enctype="multipart/form-data" action="{{url('/GuruUas11/downloadDataUas11')}}">
	</form>
	<a href="{{ url('downloadDataUas11/xlsx') }}"><button class="btn btn-dark">Download Excel xlsx</button></a>

	<a href="/home" class="btn btn-success my-3" target="_blank">Tampilan Dashboard</a>
	<a href="/SikapSiswaKelas11Uas" class="btn btn-success my-3" target="_blank">Tampilan Sikap Siswa Kelas 11</a>


	<div class="dropdown" style="float: right;">
		<button class="dropbtn">Tampilan Nilai</button>
		<div class="dropdown-content">
			<a href="GuruUts10">Nilai Uts Kelas 10</a>
			<a href="GuruUas10">Nilai Uas Kelas 10</a>	
			<a href="GuruUts11">Nilai Uts Kelas 11</a>
			<a href="GuruUts12">Nilai Uts Kelas 12</a>
			<a href="GuruUas12">Nilai Uas Kelas 12</a>
			<a href="home">Dashboard</a>
		</div>		
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Nilai Siswa UAS Kelas 11</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped" table id="siswa">
					<tr>
						<th>Name</th>
						<th>Nis</th>
						<th>Nilai</th>
					</tr>
					@foreach($data as $row)
					<tr>
						<td>{{ $row->nama }}</td>
						<td>{{ $row->nis }}</td>
						<td>{{ $row->nilai }}</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
</body>
</html>