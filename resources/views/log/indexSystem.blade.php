@extends('layouts.mst')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">logSystem</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item active">logSystem</li>
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
        <table class="table table-hover" id="tblogSystem" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Ukuran</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logFiles as $key => $logFile)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $logFile->getFilename() }}</td>
                    <td>{{ $logFile->getSize() }}</td>
                    <td>{{ date('Y-m-d H:i:s', $logFile->getMTime()) }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('logSystem.show', $logFile->getFilename()) }}" title="Detail file {{ $logFile->getFilename() }}"
                                class="btn bg-navy btn-flat btn-xs" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('logSystem.download', $logFile->getFilename()) }}" title="Download file {{ $logFile->getFilename() }}"
                                class="btn bg-danger btn-flat btn-xs"><i class="fas fa-download"></i></a>    
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No Log File Exists</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
