<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use Illuminate\Http\JsonResponse;

class QuotaController extends Controller
{
    /**
     * Return all quota
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $quota = Quota::all();
        return response()->json($quota);
    }

    public function show(Quota $quota): JsonResponse
    {
        $quota = Quota::where('id', $quota -> id);
        return response()->json($quota);
    }
}
