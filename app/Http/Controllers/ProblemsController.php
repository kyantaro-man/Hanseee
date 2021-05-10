<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Problem;
use App\Http\Requests\CreateProblem;
use App\Http\Requests\EditProblem;

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
            'current_category_id' => $category->id,
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

    /**
     * 課題の編集ページを表示する
     */
    public function edit(Category $category, Problem $problem) {
        return view('problems.edit', [
            'category' => $category,
            'problem' => $problem,
        ]);
    }

    /**
     * 課題を更新する
     */
    public function update(Category $category, Problem $problem, EditProblem $request) {
        $categories = Auth::user()->categories()->get();

        $problems = $category->problems()->get();

        $problem->title = $request->title;
        $problem->save();

        return redirect()->route('problems.index', [
            'categories' => $categories,
            'category' => $category,
            'current_category_id' => $category->id,
            'problems' => $problems,
            'problem' => $problem,
        ]);
    }

    /**
     * 課題を削除する
     */
    public function destroy(Category $category, Problem $problem) {
        $problem->delete();

        return redirect()->route('problems.index', [
            'category' => $category->problems()->first(),
            'problem' => $problem,
        ]);
    }
}
