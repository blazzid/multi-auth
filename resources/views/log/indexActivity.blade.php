@extends('layouts.mst')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">logActivity</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active">logActivity</li>
        </ol>
    </div><!-- /.col -->
</div>
@endsection

@section('content-body')
<div class="card">
    <div class="card-header">
        <div class="card-tools">
            <a href="/home" class="btn btn-tool"><i class="fas fa-times"></i></a>
        </div>
    </div>
    <div class="card-body table-responsive">
        <div class="post">
            <div class="row">
                <div class="col-md-12">
                    <label>Periode logActivity</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="from_date" id="from_date" class="form-control tanggal" readonly>
                </div>
                <div class="col-md-4">
                    <input type="text" name="to_date" id="to_date" class="form-control tanggal" readonly>
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div>
        </div>
        <table class="table table-hover" id="tblogActivity" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Subject</th>
                    <th>IP</th>
                    <th>User</th>
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
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('storage/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('storage/adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('storage/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('storage/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Custom -->
<script src="{{ mix('js/logActivity.js') }}"></script>
@endpush