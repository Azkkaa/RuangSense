<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Service\DeviceService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Device\DeviceStoreRequest;

class DeviceController extends Controller
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    public function create() {
        return view('admin.device-create');
    }

    public function store(DeviceStoreRequest $request) {
        try {
            $device = $this->deviceService->store($request->all());

            return response()->json([
                'message' => 'Successfully creating data',
                'data' => $device
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Device $device) {
        // ini akan ditambahkan setelah fitur user save device ditambahkan
        // if (!Auth::check()) return route('unauthorize.not-login');

        // Auth::user()->devices()->create([
        // ]);

        return view('user.dashboard', [
            'device' => $device
        ]);
    }
}
