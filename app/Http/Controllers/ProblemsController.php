<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ProblemsController extends Controller
{
    /**
     * カテゴリの持つ課題の一覧ページを表示する
     */
    public function index(Category $category) {
        $categories = Auth::user()->categories()->get();

        $problems = $category->problems()->get();

        return view('problems.index', [
            'categories' => $categories,
            'current_category_id' => $category->id,
            'problems' => $problems,
        ]);
    }
}
