@extends('layouts.app')
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" >Tampilan Guru</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Akademik Siswa
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="GuruUts10">Nilai Uts Kelas 10</a>
          <a class="dropdown-item" href="GuruUas10">Nilai Uas Kelas 10</a>
          <a class="dropdown-item" href="GuruUts11">Nilai Uts Kelas 11</a>
          <a class="dropdown-item" href="GuruUas11">Nilai Uas Kelas 11</a>
          <a class="dropdown-item" href="GuruUts12">Nilai Uts Kelas 12</a>
          <a class="dropdown-item" href="GuruUas12">Nilai Uas Kelas 12</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">chat dengan siswa</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
