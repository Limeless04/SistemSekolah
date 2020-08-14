@extends('layouts.main_admin')

@section('content_admin')
<table class="table table-bordered" id="kepsek-table">
    <thead>
        <tr>
            <th>ID Kepsek</th>
            <th>Nama Kepsek</th>
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
        $('#kepsek-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/json',
            columns: [
                { data: 'id_kepsek', name: 'id_kepsek' },
                { data: 'nama', name: 'nama' },
                { data: 'no_hp', name: 'no_hp' },
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