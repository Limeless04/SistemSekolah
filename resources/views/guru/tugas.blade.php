@extends('layouts.main_guru')

@section('content_admin')

<form action="/guru/task" method="post">
  @csrf
  <div class="form-group">
    <label for="mapel">Guru Pengampu</label>
    <input type="text" class="form-control d-inline" id="guru" readonly name="guru" value="{{Auth::user()->nama_guru}}">   
  </div>
    <div class="form-group">
      <label for="mapel">Mata Pelajaran</label>
      <input type="text" class="form-control d-inline" id="mapel" readonly name="mapel" value="{{$task['pilih_pelajaran']}}">   
    </div>
    <div class="form-group">
      <label for="kelas">Kelas</label>
      <input type="text" class="form-control  d-inline" id="kelas" readonly name="kelas" value="{{$task['pilih_kelas']}}">
    </div>

    <div class="form-group">
      <label for="kegiatan">Kegiatan</label>
      <input type="text" class="form-control  d-inline" id="kegiatan" readonly name="kegiatan" value="{{$task['kegiatan']}}">
    </div>

    
    <div class="form-group">      
      <label for="materi">Materi</label>
      <input type="text" class="form-control  d-inline @error('materi') is-invalid @enderror" id="materi" name="materi" value="{{old('materi')}}">
      @error('materi')
      <div class="invalid-feedback">
        Isian tidak boleh kosong    
      </div>
      @enderror
    </div>

    <div class="form-group">      
      <label for="kumpul">Tanggal Kumpul</label>
      <input type="date" class="form-control  d-inline @error('kumpul') is-invalid @enderror" id="kumpul" name="kumpul" value="{{old('kumpul')}}">
      @error('kumpul')
      <div class="invalid-feedback">
        Isian tidak boleh kosong    
      </div>
      @enderror
    </div>
    
    <div class="form-group">      
      <label for="keterangan">Penjelasan Tugas</label>
      <textarea name="keterangan" class="form-control  d-inline @error('keterangan') is-invalid @enderror" id="keterangan" cols="30" rows="10"></textarea>
      @error('keterangan')
      <div class="invalid-feedback">
        Isian tidak boleh kosong    
      </div>
      @enderror
    </div>

      <button type="submit" class="btn btn-primary">Submit</button>
  </form>




@endsection

@push('scripts')

@endpush