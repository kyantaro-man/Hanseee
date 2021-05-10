<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Problem;
use App\Http\Requests\CreateProblem;

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

    /**
     * 課題の作成ページを表示する
     */
    public function create(Category $category) {
        return view('problems.create', [
            'category' => $category,
        ]);
    }

    /**
     * 課題を保存する
     */
    public function store(Category $category, CreateProblem $request) {
        $problem = new Problem();
        $problem->title = $request->title;

        $category->problems()->save($problem);

        return redirect()->route('problems.index', [
            'category' => $category,
        ]);
    }
}
