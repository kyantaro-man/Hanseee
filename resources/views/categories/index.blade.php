@extends('layout')

@section('content')
  <div class="container">
    <ul class="nav justify-content-center">
      @foreach($categories as $category)
        <li class="nav-item">
          <a class="nav-link" href="#">{{ $category->name }}</a>
        </li>
      @endforeach
      <li class="nav-item">
        <a class="nav-link btn btn-success" href="#">カテゴリ追加</a>
      </li>
    </ul>
  </div>
@endsection