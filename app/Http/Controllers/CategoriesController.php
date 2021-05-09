<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Http\Requests\CreateCategory;


class CategoriesController extends Controller
{
    /**
     * ユーザーの持つカテゴリの一覧ページを表示する
     */
    public function index() {
        $categories = Auth::user()->categories()->get();

        return view('categories.index', [
            'categories' => $categories,
        ]);        
    }

    /**
     * カテゴリの作成ページを表示する
     */
    public function create() {
        return view('categories.create');
    }

    /**
     * ユーザーのカテゴリを保存する
     */
    public function store(CreateCategory $request) {
        $category = new Category();
        $category->name = $request->name;

        Auth::user()->categories()->save($category);

        return redirect()->route('categories.index');
    }
}
