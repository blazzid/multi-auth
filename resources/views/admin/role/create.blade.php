@extends('layouts.mst')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Role</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </div><!-- /.col -->
</div>
@endsection

@section('content-body')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Data</h4>
        <div class="card-tools">
            <a href="{{ route('role.index') }}" class="btn btn-tool"><i class="fas fa-times"></i></a>
        </div>
    </div>
    <form action="{{ route('role.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @include('admin.role.form', ['formMode' => '1'])
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection

@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('storage/adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('storage/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@push('scripts')
<!-- Select2 -->
<script src="{{ asset('storage/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function()
    {
        $('.select2').select2()
    })
</script>
@endpush