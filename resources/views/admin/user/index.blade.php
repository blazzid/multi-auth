@extends('layouts.mst')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">User</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </div><!-- /.col -->
</div>
@endsection

@section('content-body')
<div class="card">
    <div class="card-header">
        <a href="{{ route('user.create') }}" class="btn btn-success">Tambah data</a>
        <div class="card-tools">
            <a href="/home" class="btn btn-tool"><i class="fas fa-times"></i></a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover" id="tbUser" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Online</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">
@endsection

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('storage/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('storage/adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('storage/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Sweetalert -->
<script src="{{ asset('/vendor/sweetalert/sweetalert.all.js') }}"></script>
<script src="{{ mix('js/user.js') }}"></script>
@endpush