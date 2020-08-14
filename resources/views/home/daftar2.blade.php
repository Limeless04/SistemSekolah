@extends('layouts.main_home')

@section('home_content')
<form action="/store2" method="post">
  @csrf

      <div class="form-group">
        <label for="nama_kepsek">Nama Kepala Sekolah</label>
        <input type="text" class="form-control @error('nama_kepsek') is-invalid @enderror" id="nama" value="@if(empty($data)) {{old('nama')}} @else {{$data->nama }}  @endif" name="nama">
        @error('nama_kepsek')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="nama_kepsek">ID Kepala Sekolah</label>
        <input type="text" class="form-control @error('id_kepsek') is-invalid @enderror" id="id_kepsek" value="@if(empty($data)) {{old('id_kepsek')}} @else {{$data->id_kepsek }} @endif" name="id_kepsek">
        @error('id_kepsek')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="no_hp">No Hp</label>
        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="@if(empty($data)) {{old('no_hp')}} @else {{$data->no_hp  }} @endif" name="no_hp">
        @error('no_hp')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
        @enderror  
    </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" value="@if(empty($data)) {{old('email')}} @else {{$data->email  }} @endif" name="email" id="email">
        @error('email')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
        @enderror  
    </div>
 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection