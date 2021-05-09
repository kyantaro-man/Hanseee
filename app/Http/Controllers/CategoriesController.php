<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
}
