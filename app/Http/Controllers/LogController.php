<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\LogActivity as LogActivityModel;

class LogController extends Controller
{
    public function indexActivity(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->from_date)) {
                $model = LogActivityModel::with('user:id,email')
                ->whereBetween(DB::raw('DATE(created_at)'), array($request->from_date, $request->to_date));
                return DataTables::of($model)->addColumn('action', function ($data) {
                    $button = '<a href="/log/logActivity/'.$data->id.'" class="btn bg-navy btn-flat btn-xs" title="detail"><i class="fa fa-eye"></i></a>';
                    return $button;
                })->rawColumns(['action'])->toJson();
            } else {
                $model = LogActivityModel::with('user:id,email');
                return DataTables::of($model)->addColumn('action', function ($data) {
                    $button = '<a href="/log/logActivity/'.$data->id.'" class="btn bg-navy btn-flat btn-xs" title="detail"><i class="fa fa-eye"></i></a>';
                    return $button;
                })->rawColumns(['action'])->toJson();
            }
            
        }  

        return view('log.indexActivity');
    }

    public function showActivity(LogActivityModel $LogActivityModel)
    {
        $user = DB::table('users')->where('id', $LogActivityModel->user_id)->select('email')->first();

        \LogActivity::addToLog('Detail LogActivity '.$LogActivityModel->updated_at);

        return view('log.showActivity', compact('LogActivityModel','user'));
    }

    public function indexSystem()
    {
        if (!file_exists(storage_path('logs'))) {
            return [];
        }

        $logFiles = \File::allFiles(storage_path('logs'));

        // Sort files by modified time DESC
        usort($logFiles, function ($a, $b) {
            return -1 * strcmp($a->getMTime(), $b->getMTime());
        });

        return view('log.indexSystem', compact('logFiles'));
    }

    public function showSystem($fileName)
    {
        if (file_exists(storage_path('logs/'.$fileName))) {
            $path = storage_path('logs/'.$fileName);

            \LogActivity::addToLog('Detail LogSystem '.$fileName);

            return response()->file($path, ['content-type' => 'text/plain']);
        }

        return 'Invalid file name.';
    }

    public function download($fileName)
    {
        if (file_exists(storage_path('logs/'.$fileName))) {
            $path = storage_path('logs/'.$fileName);
            $downloadFileName = env('APP_ENV').'.'.$fileName;

            \LogActivity::addToLog('Download LogSystem '.$fileName);

            return response()->download($path, $downloadFileName);
        }

        return 'Invalid file name.';
    }
}
