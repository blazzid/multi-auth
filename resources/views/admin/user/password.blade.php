@extends('layouts.mst')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ubah Sandi</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Ubah Sandi</li>
        </ol>
    </div><!-- /.col -->
</div>
@endsection

@section('content-body')
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><i class="fas fa-lock"></i> Ubah Sandi</h4>
        <div class="card-tools">
            <a href="/home" class="btn btn-tool"><i class="fas fa-times"></i></a>
        </div>
    </div>
    <form action="{{ route('change.password') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Sandi Saat ini</label>
                <input type="password" class="form-control" name="current_password">
                @include('layouts.error', ['name' => 'current_password'])
            </div>
            <div class="form-group">
                <label>Sandi Baru</label>
                <input type="password" class="form-control" name="new_password">
                @include('layouts.error', ['name' => 'new_password'])
            </div>
            <div class="form-group">
                <label>Ulangi Sandi Baru</label>
                <input type="password" class="form-control" name="new_confirm_password">
                @include('layouts.error', ['name' => 'new_confirm_password'])
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
