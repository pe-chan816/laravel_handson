@extends('share.html')

@section('main')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダを追加する</div>
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
            <form action="{{ route('folders.create') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">フォルダ名</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primay">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
