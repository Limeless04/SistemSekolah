@extends('layouts.main_guru')

@section('content_admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Quis Option</h1>
  </div>
  <form action="/guru/quiz" method="post">
    @csrf
      <div class="form-group">
        <label for="mapel">Mata Pelajaran</label>
        <input type="text" class="form-control d-inline" id="mapel" readonly name="mapel" value="{{$quiz['pilih_pelajaran']}}">   
      </div>
      <div class="form-group">
        <label for="kelas">Kelas</label>
        <input type="text" class="form-control  d-inline" id="kelas" readonly name="kelas" value="{{$quiz['pilih_kelas']}}">
      </div>  
      <div class="form-group">
        <label for="kegiatan">Kegiatan</label>
        <input type="text" class="form-control  d-inline" id="kegiatan" readonly name="kegiatan" value="{{$quiz['kegiatan']}}">
      </div>
  
      
      <div class="form-group">      
        <label for="materi">Pilih Paket Soal</label>
        <select name="question" id="question" class="form-control">
            <option value="">Pilih Paket Soal</option>
            @foreach($questions as $q)
                <option value="{{$q->paket_soal}}">{{$q->paket_soal}}</option>
            @endforeach
        </select>
        
      </div>
  
      <div class="form-group">      
        <label for="start_time">Waktu Mulai</label>
        <input type="text" class="form-control  d-inline @error('start_time') is-invalid @enderror" id="timepicker-start" name="start_time" value="{{old('start_time')}}">
        @error('start_time')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
        @enderror
      </div>

      <div class="form-group">      
        <label for="start_time">Waktu Selesai</label>
        <input type="text" class="form-control  d-inline @error('end_time') is-invalid @enderror" id="timepicker-end" name="end_time" value="{{old('end_time')}}">
        @error('end_time')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
        @enderror
      </div>


      <div class="form-group">      
        <label for="start_time">Durasi</label>
        <input type="number" class="form-control  d-inline @error('duration') is-invalid @enderror" name="duration" value="{{old('duration')}}">
        @error('end_time')
        <div class="invalid-feedback">
          Isian tidak boleh kosong    
        </div>
        @enderror
      </div>
      
      <div class="form-group">      
        <label for="keterangan">Keterangan Quis</label>
        <textarea name="keterangan_quis" class="form-control  d-inline @error('keterangan') is-invalid @enderror" id="keterangan" cols="30" rows="10"></textarea>
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
    <script>
        $('#timepicker-start').wickedpicker({twentyFour: true});
        $('#timepicker-end').wickedpicker({twentyFour: true});
     </script>
    @endpush
