<?php

namespace App\Http\Controllers\Api;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function device(Request $request) {
        $query = $request->query('q');

        if (!$query) {
            $devices = collect([]);
        } else {
            $devices = Device::where('api_key', '=', $query)->first();
        }

        if (!$devices) return response()->json([
            'status' => 'error`',
            'message' => 'No device found!!',
        ], 404);

        return response()->json([
            'status' => 'ok',
            'message' => 'Device found!!',
            'data' => $devices
        ]);
    }
}
