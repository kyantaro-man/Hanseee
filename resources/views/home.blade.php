@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-success">
          <div class="panel-heading">
            ようこそ！まずはカテゴリを見てみましょう！
          </div>
          <div class="panel-body">
            <div class="text-center">
              <a href="{{ route('categories.index') }}" class="btn btn-primary">
                カテゴリ一覧ページへ
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection