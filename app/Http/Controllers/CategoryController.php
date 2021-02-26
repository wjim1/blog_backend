<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Constants\PublicCode;

class CategoryController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $categories = Category::query()
            ->where('is_show', true)
            ->get();

        return response()->json([
            'code' => PublicCode::SUCCESS_CODE,
            'msg' => PublicCode::SUCCESS_MSG,
            'data' => $categories
        ]);
    }
}
