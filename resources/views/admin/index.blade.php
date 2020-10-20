@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="container">
 	<div class="row">
		<div class="col-md-10">
			List Of Users
		</div> 
		<div class="col-md-2" style="margin-top: -2rem;">
			<a class="btn btn-sm btn-success" href="{{ route('todo.create')}}">Create New Record</a>
		</div>
	  </div>
     @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> SomeThing getting wrong.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
  @if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{$message}}</p>
	</div>
  @endif
  @if($message = Session::get('error'))
  <div class="alert alert-danger" style="margin-bottom: 0px;"> <p>{{$message}}</p></div>
    @endif
    <form action="" method="post">
  	@csrf
		<table class="table table-hover table-sm">
			<tr>
				<th width="30px">No.</th>
				<th width="150px">Name</th>
				<th width="200px">Email</th>
				<th width="150px">Mobile</th>
				<th>Add Task</th>
        <th>Action</th>
			</tr>
               @foreach($biodatas as $user)
                    <tr>
                    	<td><b>{{++$i}}</b></td>
                    	<td>{{$user->name ? $user->name:''}}</td>
                    	<td>{{$user->email ? $user->email:''}}</td>
                    	<td>{{$user->mobile ? $user->mobile:''}}</td>
                      <td><a href="{{ route('add.task',['id'=>$user->id])}}">Click here</a></td>
                      <td><a href="{{ route('todo.destroy',['id'=>$user->id])}}" class="btn btn-link" title="Remove User" style="padding: 0px 0px !important;color: red;" onclick="return confirm('This will delete selected User from the System! Continue ??')"><i class="fa fa-trash" style="font-size:20px;"></i></a>| <a href="{{ route('edit.detail',['id'=>$user->id])}}" title="Edit details" class="btn btn-link" style="padding: 0px 0px !important;"><i class="fa fa-edit" style="font-size:20px;"></i></a></td>
                    </tr>
                    @endforeach
		                </table>
		                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit" class="btn">  {{ __('Submit') }}</button>
                    </div> 
	                  </form>
		               {!! $biodatas->links() !!}
                  </div>
       @endsection
       @section('scripts')