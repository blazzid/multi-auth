@extends('layouts.mst')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">User</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active">Ubah</li>
        </ol>
    </div><!-- /.col -->
</div>
@endsection

@section('content-body')
<div class="row">
    <div class="col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Data</h4>
                <div class="card-tools">
                    <a href="{{ route('user.index') }}" class="btn btn-tool"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method("PATCH")
                <div class="card-body">
                    <div class="form-group">
                        <label>User</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ isset($user->name) ? old('name', $user->name) : old('name') }}">
                        @include('layouts.error', ['name' => 'name'])
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ isset($user->email) ? old('email', $user->email) : old('email') }}">
                        @include('layouts.error', ['name' => 'email'])
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="select2 @error('status') is-invalid @enderror" id="status"
                            style="width:100%">
                            <option disabled selected value>Pilih data ...</option>
                            @foreach (json_decode('{"0":"Suspend","1":"Aktif"}', true) as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}"
                                {{ old('status', (isset($user->status) && $user->status == $optionKey)) ? 'selected' : ''}}>
                                {{ $optionValue }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role[]" id="role" class="select2" multiple="multiple" style="width: 100%">
                            @foreach($roles as $id => $roles)
                            <option value="{{ $id }}"
                                {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>
                                {{ $roles }}</option>
                            @endforeach
                        </select>
                        @include('layouts.error', ['name' => 'role'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Sandi</h4>
            </div>
            <form action="/admin/ubahsandi/{{ $user->id }}" method="POST">
                @csrf
                @method("PATCH")
                <div class="card-body">
                    <div class="form-group">
                        <label>Sandi</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ isset($user->password) ? old('password', $user->password) : old('password') }}">
                        @include('layouts.error', ['name' => 'password'])
                    </div>
                    <div class="form-group">
                        <label>Ulangi Sandi</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
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