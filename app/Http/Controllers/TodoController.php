<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use App\Task;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $biodatas = UserList::latest()->paginate(5);
        return view('admin.index',compact('biodatas'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function create()
    {
         return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
              'name'=> 'required',
              'email'=> 'required|email|unique:users_list',
              'mobile'=> 'required|min:10|unique:users_list',
        ]);

        UserList::create($request->all());
        return redirect()->route('todo.index')->with('success','Record Successfulyy Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
        $user = UserList::find($id);
        return view('admin.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id        = $request->user_id;
        $request->all([
              'name'=> 'required',
              'email'=> 'required',
              'mobile'=> 'required',
             
  ]);
        $user = UserList::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->save();
        return redirect()->route('todo.index')->with('success','Your 
            data has successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserList::find($id);
        $user->delete();
        Task::where('user_id',$id)->delete();
        return redirect()->route('todo.index')->with('success','Your Data deleted successfully');
    }

   
   public function getUserForTask(Request $request,$id){

    $userForTask = UserList::find($id);
    return view('admin.task',['user'=>$userForTask]);
   }

    public function addTaskForUser(Request $request){

       $request->all([
       'title' => 'required',
       'description' => 'required',
       ]);
       $task = new Task;
       $task->user_id = $request->id;
       $task->title = $request->title;
       $task->description = $request->task;
       $task->save();

       return redirect()->route('admin.task.list')->with('success','Task Added with the selected User');

    }

    public function listOfTask(){

        $taskList = Task::with('getUserName')->latest()->paginate(5);
        return view('admin.taskList',compact('taskList'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function markAsComplete($id){
    $userApprove = Task::find($id);
     if(!$userApprove){
      return redirect()->action('TodoController@listOfTasks')->with('error', 'Invalid User Id');
     }
     else{
        if (($userApprove->is_complete ==0)) {
            $userApprove->where('id', $id)->update(['is_complete' => 1]);
            return redirect()->back()->with('success', 'Task Completed Successfully!!');
        }
        else {
            $userApprove->where('id', $id)->update(['is_complete' => 0]);
            return redirect()->back()->with('error', 'Incomplete Task!!');
        }
      }
   }
    
}
