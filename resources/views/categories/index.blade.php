@extends('layout')

@section('content')
  <div class="container">
    <ul class="nav justify-content-center">
      @foreach($categories as $category)
        <li class="nav-item d-flex">
          <a class="nav-link" href="{{ route('problems.index', ['category' => $category->id]) }}">
            {{ $category->name }}
            <form class="d-inline-block" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <input type='submit' value='×' class='btn btn-danger btn-xs'>
            </form>
          </a>
        </li>
      @endforeach
      <li class="nav-item">
        <a class="nav-link btn btn-success" href="{{ route('categories.create') }}">カテゴリ追加</a>
      </li>
    </ul>
  </div>
@endsection