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
            <a href="{{ route('user.index') }}" class="btn btn-tool"><i class="fas fa-times"></i></a>
        </div>
    </div>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-xs-12">       
                    <div class="form-group">
                        <label>Nama Operator</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @include('layouts.error', ['name' => 'name'])
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @include('layouts.error', ['name' => 'email'])
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role[]" class="select2" multiple="multiple" style="width: 100%">
                            @foreach($roles as $id => $roles)
                            <option value="{{ $id }}"
                                {{ (in_array($id, old('role', [])) || isset($role) && $role->roles->contains($id)) ? 'selected' : '' }}>
                                {{ $roles }}</option>
                            @endforeach
                        </select>
                        @include('layouts.error', ['name' => 'role'])
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
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
                    <label>Status</label> <br>
                    <input type="checkbox" id="status" name="status"
                    value="{{ old('status') }}"
                    {{ old('status') == "1" ? "checked":"" }}
                    data-off-color="danger"
                    data-on-color="success"> 
                </div>
            </div>
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
<!-- Bootstrap Switch -->
<script src="{{ asset('storage/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
    $(function()
    {
        $('.select2').select2();
        $('#status').bootstrapSwitch('state');
        $('#status').on('switchChange.bootstrapSwitch',function () {
            var check = $('.bootstrap-switch-on');
            if (check.length > 0) {
                $('#status').val("1");
                $('#status').prop('checked', true);
            } else {
                $('#status').prop('checked');
            }
        });
    })
</script>
@endpush