<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\project;
use App\Models\task;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class TasksController extends Controller
{
    /**
     * index function
     * the function contains also small search process
     * @var array tasks is the all tasks coming back from database
     * @return object json of tasks data to api or redirect to all tasks page with the tasks data
     */
    public function index()
    {
        if(isset($_GET['search']) && !empty($_GET['search'])){
            $tasks = task::where('task_name',$_GET['search'])->paginate(10);
        }else{
            $tasks = task::paginate(10);
        }
        $response = [
            'status' => "success",
            'msg' => "",
            'data' => $tasks,
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return view('task.allTasks',['tasks'=>$tasks]);
        }
    }
    /**
     * myTasks function
     * the function contains also small search process
     * @var array tasks is the all tasks coming back from database
     * @return object json of tasks data to api or redirect to all tasks page with the tasks data
     */
    public function myTasks()
    {
        /** @var \App\Models\User $user **/
        $employeeid = auth('sanctum')->user()->id;
        if(isset($_GET['search']) && !empty($_GET['search'])){
            $tasks = task::where('employee_id',$employeeid)->where('task_name',$_GET['search'])->paginate(10);
        }else{
            $tasks = task::where('employee_id',$employeeid)->paginate(10);
        }
        $response = [
            'status' => "success",
            'msg' => "",
            'data' => $tasks,
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return view('task.allTasks',['tasks'=>$tasks]);
        }
    }
    /**
     * show function to show single task data
     *
     * @param int $task_id
     * @return object json for api or redirect to single task page to show single task data
     */
    public function show($task_id)
    {
        $task = task::find($task_id);
        if($task){
            $response = [
                'status' => "success",
                'msg' => "",
                'data' => $task,
            ];
        }else{
            $response = [
                'status' => "fail",
                'msg' => "No Such Task Found",
                'data' => "",
            ];
        }
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return view('task.singleTask',['task'=>$task]);
        }
    }
    /**
     * make function to open create task page
     * @var array employees is the id and name for all employees
     * @var array projects is the id and name for all projects
     * @return void 
     */
    public function make()
    {
        $employees = User::select('id','user_name')->get();
        $projects = project::select('id','project_name')->get();
        return view('task.create',['employees'=>$employees , 'projects'=>$projects]);
    }
    /**
     * create function is the code that actually create the task
     *
     * @param TaskRequest $request
     * @return object json for api or redirect to all tasks after adding the new task
     */
    public function create(TaskRequest $request)
    {
        $task = task::create([
            'task_name' => $request->task_name,
            'project_id' => $request->project_id,
            'employee_id' => $request->employee_id,
            'details' => $request->details,
        ]);
        $response = [
            'status' => "success",
            'msg' => 'task created',
            'data' => $task,
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return redirect('task/allTasks')->with('msg1','task created');
        }
    }
    /**
     * edit function just opens the edit page
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $task = task::find($id);
        $employees = User::select('id','user_name')->get();
        $projects = project::select('id','project_name')->get();
        if (!$task) {
            return redirect()->back()->with('msg', 'task doesn\'t exist');
        } else {
            return view('task.edit', ['task' => $task,'employees'=>$employees,'projects'=>$projects]);
        }
    }
    /**
     * update function is the a code for actual update of task data
     *  
     * @param TaskRequest $request
     * @param int $id
     * @return object json for api or redirect to all tasks page
     */
    public function update(TaskRequest $request, $id)
    {
        task::where('id', $id)->where('status','!=','submitted')->update([
            'task_name' => $request->task_name,
            'project_id' => $request->project_id,
            'employee_id' => $request->employee_id,
            'details' => $request->details,
        ]);
        $task = task::find($id);
        $response = [
            'status' => "success",
            'msg' => 'task updated',
            'data' => $task,
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return redirect('/task/allTasks')->with('msg1','task updated');
        }
    }
    /**
     * destroy function is the process of delelation of task
     *
     * @param int $id
     * @return object json for api or redirect to the all tasks list which is the previous page
     */
    public function destroy($id)
    {
        $task = task::find($id);
        if($task){
            $task->delete();
            $response = ['status' => "success", 'msg' => 'task deleted', 'data' => ""];
        }else{
            $response = [
                'status' => "fail",
                'msg' => "No Such Task Found",
                'data' => "",
            ];
        }
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return redirect()->back()->with('msg1','task deleted');
        }
    }
    /**
     * submit function is the function to change status to the task to submitted
     *
     * @param int $id
     * @return object json for api or redirect to the all tasks list which is the previous page
     */
    public function submitTask($id){
        task::where('id', $id)->where('status','!=','submitted')->update([
            'status' => "submitted",
        ]);
        $response = [
            'status' => "success",
            'msg' => 'task submitted',
            'data' => "",
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return redirect()->back()->with('msg1','task submitted');
        }
    }
}
