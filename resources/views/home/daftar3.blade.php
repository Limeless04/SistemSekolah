@extends('layouts.main_home')

@section('home_content')
<form action="/store3" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Sekolah</label>
      <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_kepsek" value="{{$data->nama_sekolah}} " name="nama_sekolah">
      @error('nama_sekolah')
      <div class="invalid-feedback">
        Isian tidak boleh kosong    
      </div>
      @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Alamat Sekolah</label>
      <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror" id="alamat_sekolah" value="{{$data->alamat_sekolah }}" name="alamat_sekolah">
      @error('alamat_sekolah')
      <div class="invalid-feedback">
        Isian tidak boleh kosong    
      </div>
      @enderror
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">NPSN Sekolah</label>
          <input type="text" class="form-control" id="npsn " value=" {{$data->npsn}}" name="npsn">
          @error('npsn_sekolah')
          <div class="invalid-feedback">
            Isian tidak boleh kosong    
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Jenjang</label>
          <input type="text" class="form-control" id="jenjang" value="{{$data->jenjang}}" name="jenjang"> 
        </div>

        <div class="form-group">
            <label for="nama_kepsek">Nama Kepala Sekolah</label>
            <input type="text" class="form-control @error('nama_kepsek') is-invalid @enderror" id="nama" value="{{$data->nama}} " name="nama">
            @error('nama_kepsek')
            <div class="invalid-feedback">
              Isian tidak boleh kosong    
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama_kepsek">ID Kepala Sekolah</label>
            <input type="text" class="form-control @error('id_kepsek') is-invalid @enderror" id="id_kepsek" value="{{$data->id_kepsek}}" name="id_kepsek">
            @error('id_kepsek')
            <div class="invalid-feedback">
              Isian tidak boleh kosong    
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="no_hp">No Hp</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="{{$data->no_hp }}" name="no_hp">
            @error('no_hp')
            <div class="invalid-feedback">
              Isian tidak boleh kosong    
            </div>
            @enderror  
        </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$data->email }}" name="email" id="email">
            @error('email')
            <div class="invalid-feedback">
              Isian tidak boleh kosong    
            </div>
            @enderror  
        </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
            @error('password')
            <div class="invalid-feedback">
              Isian tidak boleh kosong    
            </div>
            @enderror  
        </div> 
        <div class="form-group">
          <label for="password">Confirm Password</label>
        <input type="password" class="form-control @error('c_password') is-invalid @enderror" name="c_password" id="c_password">
          @error('c_password')
          <div class="invalid-feedback">
            Isian tidak boleh kosong    
          </div>
          @enderror  
      </div>

    <a type="button" href="/create1" class="btn btn-warning">Back to Step 1</a>
    <a type="button" href="/create2" class="btn btn-warning">Back to Step 2</a>
    <button type="submit" class="btn btn-primary">Buat Sekolah</button>

@endsection