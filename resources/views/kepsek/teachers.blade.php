@extends('layouts.main_kepsek')

@section('content_admin')
<table class="table table-bordered" id="teachers-table">
    <thead>
        <tr>
            <th>ID Guru</th>
            <th>Nama Guru</th>
            <th>No HP</th>
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
        $('#teachers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/kepsek/jsonGuru',
            columns: [
                { data: 'id_guru', name: 'id_guru' },
                { data: 'nama_guru', name: 'nama_guru' },
                { data: 'no_hp_guru', name: 'no_hp_guru' },
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