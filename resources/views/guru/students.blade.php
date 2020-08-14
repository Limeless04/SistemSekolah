@extends('layouts.main_guru')

@section('content_admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    <a href="/guru/import_data" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Import Data Siswa</a>
  </div>

<table class="table table-bordered" id="students-table">
    <thead>
        <tr>
            <th>ID Siswa</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Nomor HP Orang Tua</th>
            <th>Nama Sekolah</th>
            <th>Alamat Sekolah</th>
            <th>NPSN</th>
            <th>Jenjang</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>
@stop
@push('scripts')
<script>
    $(function() {
        $('#students-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/guru/jsonSiswa',
            columns: [
                { data: 'id_siswa', name: 'id_siswa' },
                { data: 'nama', name: 'nama_siswa' },
                { data: 'kelas', name: 'kelas' },
                { data: 'no_hp_ortu', name: 'no_hp_ortu' },
                { data: 'nama_sekolah', name: 'nama_sekolah' },
                { data: 'alamat_sekolah', name: 'alamat_sekolah' },
                { data: 'npsn', name: 'npsn' },
                { data: 'jenjang', name: 'jenjang' },
                { data: 'email', name: 'email' },
                { data: 'aksi', name: 'aksi' }
            ]
        });
    });
    </script>
@endpush