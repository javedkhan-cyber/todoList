@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Biodata </h3>
      </div>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('task.store',['id'=>$user->id])}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-8">
          <strong>Name of User :</strong>
           {{ $user['name']}} 
        </div>
         <div class="col-md-8">
          <strong>Email :</strong>
          {{$user['email']}}
        </div>
        <div class="col-md-8">
          <strong>Title :</strong>
         <input type="text" name="title" class="form-control" placeholder="enter title">
        </div>

          <div class="col-md-8">
          <strong>Add Task :</strong>
          <textarea class="form-control" name="task" placeholder="enter task details"></textarea>
        </div>
        <div class="col-md-8">
          <a href="{{route('todo.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection
@section('content')
