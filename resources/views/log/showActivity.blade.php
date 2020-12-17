@extends('layouts.mst')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">logActivity</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/log/logActivity">logActivity</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
</div>
@endsection

@section('content-body')
<div class="card">
    <div class="card-header no-print">
        <h4 class="card-title">Detail Data</h4>
        <div class="card-tools">
            <a href="/log/logActivity" class="btn btn-tool"><i class="fas fa-times"></i></a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
                <tr><th>Tanggal</th></tr>
                <tr><td>{{ $LogActivityModel->updated_at }}</td></tr>
                <tr><th>Subject</th></tr>
                <tr><td>{{ $LogActivityModel->subject }}</td></tr>
                <tr><th>U R L</th></tr>
                <tr><td>{{ $LogActivityModel->url }}</td></tr>
                <tr><th>Method</th></tr>
                <tr><td>{{ $LogActivityModel->method }}</td></tr>
                <tr><th>IP Address</th></tr>
                <tr><td>{{ $LogActivityModel->ip }}</td></tr>
                <tr><th>User Agent</th></tr>
                <tr><td>{{ $LogActivityModel->agent }}</td></tr>
                <tr><th>User ID</th></tr>
                <tr><td>{{ $user->email }}</td></tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer no-print">
        <a href="/log/logActivity" class="btn btn-default">Tutup</a>
    </div>
</div>
@endsection