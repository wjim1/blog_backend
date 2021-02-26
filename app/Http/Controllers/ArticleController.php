<?php

namespace App\Http\Controllers;

use App\Constants\PublicCode;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $category_id = $request->get('category');
        $titles = Article::query()
            ->where('category_id', $category_id)
            ->get();
        return response()->json([
            'code' => PublicCode::SUCCESS_CODE,
            'msg' => PublicCode::SUCCESS_MSG,
            'data' =>  $titles,
            'res' => $category_id
        ]);
    }
}
