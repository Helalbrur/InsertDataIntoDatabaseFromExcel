@extends('layouts.app')
@section('content')

  <div class="row">
      <div class="col col-md-2"></div>
      <div class="col col-md-8">
          <form action="{{route('save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <input type="file" name="file" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-sm btn-info">
            </div>
            <div class="form-group">
              @if(count($errors))

                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>

                </div>
              @endif
            </div>
          </form>
      </div>
      <div class="col col-md-2"></div>
  </div>
@endsection