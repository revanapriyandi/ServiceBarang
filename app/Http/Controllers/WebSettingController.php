<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class WebSettingController extends Controller
{
    public function index()
    {
        return view('pages.setting.web');
    }

    public function dummy(Request $request)
    {
        $order = $request->order;

        switch ($order) {
            case 'reset':
                Artisan::call('migrate:fresh --seed');
                return response()->json([
                    'status' => 'success',
                    'message' => 'Database berhasil direset'
                ]);
                break;

            case 'monthlyReset':
                Artisan::call('data:migrate');
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data bulanan berhasil direset'
                ]);
                break;

            case 'seed':
                session(['seeder' => 'dummy']);
                Artisan::call('db:seed');
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data dummy berhasil diinputkan'
                ]);
                break;

            default:
                return response()->json([
                    'status' => 'error',
                    'message' => 'Perintah tidak dikenali'
                ]);
                break;
        }
    }
}
