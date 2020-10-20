@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Details </h3>
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

    <form action="{{ route('todo.update')}}" method="post">
      @csrf
      <input type="hidden" name="user_id" value="{{$user->id}}">
      <div class="row">
        <div class="col-md-12">
          <strong>  Name :</strong>
          <input type="text" name="name" class="form-control" value="{{ $user->name}}" >
        </div>
         
         <div class="col-md-12">
          <strong>Email :</strong>
          <input type="email" name="email" class="form-control" value=" {{ $user->email}}" >
        </div>
         <div class="col-md-12">
          <strong>Mobile :</strong>
          <input type="number" name="mobile" class="form-control" value="{{ $user->mobile}}" >
        </div>
  

        <div class="col-md-12">
          <a href="{{route('todo.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>

@endsection
@section('content')
