<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Problem;

class StepsController extends Controller
{
    /**
     * カテゴリに対する対策一覧ページを表示する
     */
    public function index(Category $category, Problem $problem) {
        $categories = Auth::user()->categories()->get();
        $problems = $category->problems()->get();
        $step = $problem->step;

        return view('steps.index', [
            'categories' => $categories,
            'current_category_id' => $category->id,
            'problems' => $problems,
            'step' => $step,
        ]);
    }
}
