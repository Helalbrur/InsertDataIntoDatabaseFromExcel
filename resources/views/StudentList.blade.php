@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col col-md-9"></div>
    <div class="col col-md-3">
      <a href="{{route('create')}}" class="btn btn-sm btn-info">Add</a>
    </div>
  </div>
  <div class="row">
      <div class="col col-md-2">
       
      </div>
      <div class="col col-md-8">

          <table class="table">
              <tr>
                <td>No</td>
                <td>Name</td>
                <td>Roll</td>
                <td>Department</td>
                <td>Action</td>
              </tr>
             <?php $students=App\student::get();?>
              @foreach($students as $student)
              <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->roll}}</td>
                <td>{{$student->department}}</td>
                <td><form action="{{route('delete')}}" method="post">
                  @csrf 
                  
                  <input type="text" name="id" value="<?php echo $student->id; ?>" hidden="">
                  <input type="submit" name="delete" value="Delete">
                </form></td>
              </tr>
              @endforeach
          </table>
      </div>
      <div class="col col-md-2"></div>
  </div>
@endsection