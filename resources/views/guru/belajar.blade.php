@extends('layouts.main_guru')

@section('content_admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Aktifitas Pembelajaran</h1>
</div>

<form action="/guru/belajar" method="post">
  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
@endif
@if(session('hapus'))
<div class="alert alert-danger">
  {{session('hapus')}}
</div>
@endif
  @csrf
    <div class="form-group">
      <label for="phpkelas">Pilih Kelas</label>
      <select class="form-control" id="#pilih_kelas" name="pilih_kelas">
        <option value="">Pilih Kelas</option>
          @foreach ($kelas as $s)
          <option value="{{$s->kelas}}">Kelas {{$s->kelas}}</option>
          @endforeach
    </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Pilih Pelajaran</label>
      <select class="form-control" id="#pilih_pelajaran" name="pilih_pelajaran">
          <option value="">Pilih Pelajaran</option>
          @foreach ($mapel as $m)
          <option value="{{$m->mapel}}">{{$m->mapel}}</option>
          @endforeach
      </select>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Kegiatan</label>
        <select class="form-control" id="#kegiatan" name="kegiatan">
            <option value="">Kegiatan</option>
            <option value="zoom">Zoom</option>
            <option value="tugas">Tugas</option>
            <option value="quiz">Quiz</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>




@endsection

@push('scripts')

@endpush