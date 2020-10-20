@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="container">
 	<div class="row">
		<div class="col-md-10">
			List Of Task
		</div> 
	  </div>
     @if ($errors->any())
      <div class="alert alert-danger">
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
				<th>No.</th>
				<th>Name</th>
				<th>title</th>
				<th>Task</th>
        <th>Status</th>
        <th>Approve</th>
			</tr>
               @foreach($taskList as $user)
                    <tr>
                    	<td><b>{{++$i}}</b></td>
                    	<td>{{$user->getUserName ? $user->getUserName->name:''}}</td>
                    	<td>{{$user->title ? $user->title:''}}</td>
                    	<td>{{$user->description ? $user->description:''}}</td>
                      <td> {{ $user->is_complete == 1 ? 'Complete':'Incomplete'}}</td>
                      <td>  <a  href="approve-user/{{ $user->id}}" title="{{ ($user->is_complete == 1) ? 'Completed' : 'Incompleted'}}" class="btn btn-link" style=" width: 20px ;padding: 0px 0px !important; color : {{($user->is_complete == 1) ? 'green' : 'red'}}" >
                                                    <i class="fa {{ ($user->is_complete == 1) ? 'fa-toggle-on' : 'fa-toggle-off'}} dissap" style="font-size:20px;" ></i>
                                                </a></td>
                    </tr>
                    @endforeach
		                </table>
	                  </form>
		               {!! $taskList->links() !!}
                  </div>
       @endsection
       @section('scripts')