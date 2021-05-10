@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-success">
          <div class="panel-heading">対策を登録する</div>
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
            <label>課題</label>
            <div class="card mb-4">
              <div class="card-body">
                {{$problem->title}}
              </div>
            </div>
            <form action="{{ route('steps.store', ['category' => $category->id, 'problem' => $problem->id]) }}" method="post">
              @csrf
              <div class="form-group">
                <label for="text">対策</label>
                <textarea class="form-control" name="text" id="text">{{ old('text') }}</textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">登録</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection