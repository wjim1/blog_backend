<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except([
            'exists'
        ]);
    }

    public function exists(Request $request): array
    {
        if ($request->has('email')) {
            return [
                'success' => !User::query()->where('email', $request->get('email'))->exists()
            ];
        }

        if ($request->has('name')) {
            return [
                'success' => !User::query()->where('name', $request->get('name'))->exists()
            ];
        }
        abort(400);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }
}
