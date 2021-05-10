<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Problem;
use App\Http\Requests\CreateStep;
use App\Models\Step;
use App\Http\Requests\EditStep;

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

    /**
     * 対策の作成ページを表示する
     */
    public function create(Category $category, Problem $problem) {
        return view('steps.create', [
            'category' => $category,
            'current_category_id' => $category->id,
            'problem' => $problem,
        ]);
    }

    /**
     * 対策を保存する
     */
    public function store(Category $category, Problem $problem, CreateStep $request) {
        $step = new Step();
        $step->text = $request->text;

        $problem->step()->save($step);

        return redirect()->route('steps.index', [
            'category' => $category,
            'problem' => $problem,
        ]);
    }

    /**
     * 対策の編集ページを表示する
     */
    public function edit(Category $category, Problem $problem, Step $step) {
        return view('steps.edit', [
            'category' => $category,
            'problem' => $problem,
            'step' => $step,
        ]);
    }

    /**
     * 対策を更新する
     */
    public function update(Category $category, Problem $problem, Step $step, EditStep $request) {
        $step->text = $request->text;
        $step->save();

        return redirect()->route('steps.index', [
            'category' => $category,
            'current_category_id' => $category->id,
            'problem' => $problem,
            'step' => $step,
        ]);
    }
}
