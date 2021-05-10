@extends('layout')

@section('content')
  <div class="container">
    <ul class="nav justify-content-center">
      @foreach($categories as $category)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('problems.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
        </li>
      @endforeach
      <li class="nav-item">
        <a class="nav-link btn btn-success" href="{{ route('categories.create') }}">カテゴリ追加</a>
      </li>
    </ul>
  </div>
@endsection