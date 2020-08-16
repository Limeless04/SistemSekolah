@extends('layouts.main_siswa')

@section('content_admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Check Aktifitas</h1>
  </div>

<h5>Tabel Tugas</h5>
<table class="table table-bordered" id="tasks-table">
    <thead>
        <tr>
            <th>Mapel</th>
            <th>Materi</th>
            <th>Kelas</th>
            <th>Keterangan</th>
            <th>Tanggal Kumpul</th>
            <th>Aksi</th>
        </tr>
    </thead>    
</table>

<h5>Tabel Quiz</h5>
<table class="table table-bordered" id="quizes-table">
    <thead>
        <tr>
            <th>Paket Soal</th>
            <th>Mapel</th>
            <th>Kelas</th>
            <th>Tanggal Quiz</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Durasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>
@stop

@push('scripts')
<script>
    $(function() {
        $('#tasks-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/siswa/jsonTugas',
            columns: [
                { data: 'mapel', name: 'mapel' },
                { data: 'materi', name: 'materi' },
                { data: 'kelas', name: 'kelas' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'tgl_kumpul', name: 'tgl_kumpul' },
                { data: 'aksi', name: 'aksi' },
            ]
        });
    });
    </script>

<script>
    $(function() {
        $('#quizes-table').DataTable({
            processing: true,
            serverSide: true,
        ajax: '/siswa/jsonQuiz',
            columns: [
                { data: 'paket_quiz', name: 'paket_quiz' },
                { data: 'mapel', name: 'mapel' },
                { data: 'kelas', name: 'kelas' },
                { data: 'quiz_date', name: 'quiz_date' },
                { data: 'time_start', name: 'time_start' },
                { data: 'time_end', name: 'time_end' },
                { data: 'duration', name: 'duration' },
                { data: 'quiz_desc', name: 'quiz_desc' },
                { data: 'aksi', name: 'aksi' },
            ]
        });
    });
    </script>
@endpush