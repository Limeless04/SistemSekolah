@extends('layouts.main_home')

@section('home_content')
<form action="/store1" method="post">
  @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Sekolah</label>
    <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_kepsek" value="@if(empty($data)) {{ old('nama_sekolah')}} @else {{$data->nama_sekolah }} @endif" name="nama_sekolah">
    @error('nama_sekolah')
    <div class="invalid-feedback">
      Isian tidak boleh kosong    
    </div>
    @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Alamat Sekolah</label>
    <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror" id="alamat_sekolah" value="@if(empty($data)) {{old('alamat_sekolah')}} @else {{$data->alamat_sekolah }} @endif" name="alamat_sekolah">
    @error('alamat_sekolah')
    <div class="invalid-feedback">
      Isian tidak boleh kosong    
    </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">NPSN Sekolah</label>
        <input type="text" class="form-control" id="npsn" value="@if(empty($data)) {{ old('npsn')}} @else {{$data->npsn }} @endif" name="npsn">
        @error('npsn_sekolah')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Jenjang</label>
        <select name="jenjang" id="jenjang" class="form-control @error('jenjang') is-invalid @enderror" >
            <option value="">Pilih Jenjang</option>
            <option value="SMA">SMA sederajat</option>
            <option value="SMP">SMP sederajat</option>
            <option value="SD">SD sederajat</option>
        </select>
        @error('alamat_sekolah')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
    @enderror
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection