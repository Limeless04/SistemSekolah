@extends('layouts.main_kepsek')

@section('content_admin')
<form action="/kepsek/import_data" enctype="multipart/form-data" method="post">
    @csrf
    <div class="form-group">
        <label for="file">Data Excel Guru</label>
      <input type="file" class="form-control @error('nama_sekolah') is-invalid @enderror" id="file_guru"   name="file_guru">
      @error('file_guru')
      <div class="invalid-feedback">
        Isian tidak boleh kosong    
      </div>
      @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-4">Submit</button>
</form>
@endsection