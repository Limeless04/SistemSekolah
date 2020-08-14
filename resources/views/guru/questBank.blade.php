@extends('layouts.main_guru')

@section('content_admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bank Soal</h1>
    <a href="/guru/import_quest" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Import Soal</a>
  </div>
<table class="table table-bordered" id="quests-table">
    <thead>
        <tr>
            <th>Mapel</th>
            <th>Paket Soal</th>
            <th>Soal</th>
            <th>Jenis Soal</th>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>E</th>
            <th>Jawaban</th>
            <th>Nama Guru</th>
        </tr>
    </thead>
</table>
@stop
@push('scripts')
<script>
    $(function() {
        $('#quests-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/guru/jsonQuest',
            columns: [
                { data: 'mapel', name: 'mapel' },
                { data: 'paket_soal', name: 'paket_soal' },
                { data: 'soal', name: 'soal' },
                { data: 'jenis_soal', name: 'jenis_soal' },
                { data: 'a', name: 'a' },
                { data: 'b', name: 'b' },
                { data: 'c', name: 'c' },
                { data: 'd', name: 'd' },
                { data: 'e', name: 'e' },
                { data: 'jawaban', name: 'jawaban' },
                { data: 'nama_guru', name: 'nama_guru' }
            ]
        });
    });
    </script>
@endpush