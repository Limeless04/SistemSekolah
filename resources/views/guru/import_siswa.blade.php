@extends('layouts.main_guru')

@section('content_admin')
<form action="/guru/import_data" enctype="multipart/form-data" method="post">
    @csrf
    <div class="form-group">
        <label for="file">Data Excel Siswa</label>
      <input type="file" class="form-control @error('file_siswa') is-invalid @enderror" id="file_siswa"   name="file_siswa">
      @error('file_siswa')
      <div class="invalid-feedback">
        Isian tidak boleh kosong    
      </div>
      @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-4">Submit</button>
</form>
@endsection