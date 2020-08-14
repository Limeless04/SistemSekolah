@extends('layouts.main_guru')

@section('content_admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
</div>
<form action="/guru/postAbsensi" method="post">
@csrf
<label for="mapel">Mata Pelajaran</label>
<input type="text" class="form-control d-inline" id="mapel" readonly name="mapel" value="{{$task['pilih_pelajaran']}}">


<label for="kelas">Kelas</label>
<input type="text" class="form-control  d-inline" id="kelas" readonly name="kelas" value="{{$task['pilih_kelas']}}">


<label for="kegiatan">Kegiatan</label>
<input type="text" class="form-control  d-inline" id="kegiatan" readonly name="kegiatan" value="{{$task['kegiatan']}}">


<label for="materi">Materi</label>
<input type="text" class="form-control  d-inline @error('materi') is-invalid @enderror" id="materi" name="materi" value="{{old('materi')}}">
@error('materi')
<div class="invalid-feedback">
  Isian tidak boleh kosong    
</div>
@enderror

<table class="table">
    <thead>
      <tr>
        <th scope="col">Id Siswa</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">Kelas</th>
        <th scope="col">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($student as $s)
      <th scope="row">
          <input type="hidden" value="{{ $s->id_siswa}}" name="id_siswa">
          {{$s->id_siswa}}
      </th>
      <td>
        <input type="hidden" value="{{ $s->nama}}" name="nama_siswa">
        {{$s->nama}}
      </td>
      <td>
        <input type="hidden" value="{{ $s->kelas}}" name="kelas_siswa">
          {{$s->kelas}}
      </td>
      <td>
        <div class="form-check form-check-inline">
            <input class="form-check-input @error('ketHadirRadio') is-invalid @enderror" type="radio" name="ketHadirRadio" id="hadirRadio" value="hadir" checked>
            <label class="form-check-label" for="hadirRadio">
            Hadir
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input @error('ketHadirRadio') is-invalid @enderror" type="radio" name="ketHadirRadio" id="alphaRadio" value="alpha" >
            <label class="form-check-label" for="alphaRadio">
            Alpha
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input @error('ketHadirRadio') is-invalid @enderror" type="radio" name="ketHadirRadio" id="sakitRadio" value="sakit" >
            <label class="form-check-label" for="sakitRadios">
            Sakit
            </label>
        </div>
      </td>
        @endforeach
      </tr>
    </tbody>
  </table>
  <button type="submit" class="btn btn-primary">Presensi</button>
</form>

@endsection