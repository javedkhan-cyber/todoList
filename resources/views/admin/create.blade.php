@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New User </h3>
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
    <form action="{{route('todo.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-8">
          <strong>Name :</strong>
          <input type="text" name="name" class="form-control" placeholder="Enter your name ">
        </div>
         <div class="col-md-8">
          <strong>Email :</strong>
          <input type="text" name="email" class="form-control" placeholder="Enter your Email ">
        </div>
         <div class="col-md-8">
          <strong>Mobile :</strong>
          <input type="number" name="mobile" class="form-control" placeholder="Enter your Number ">
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
