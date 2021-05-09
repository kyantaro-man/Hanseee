@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-success">
          <div class="panel-heading">ルームを登録する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('categories.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="name">カテゴリ名</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">追加</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection