<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * index function
     * the function contains also small search process
     * @var array projects is the all projects coming back from database
     * @return object json of projects data to api or redirect to all projects page with the projects data
     */
    public function index()
    {

        if(isset($_GET['search']) && !empty($_GET['search'])){
            $projects = project::where('project_name','LIKE','%'.$_GET['search'].'%')->paginate(10);
        }else{
            $projects = project::paginate(10);
        }
        $response = [
            'status' => "success",
            'msg' => "",
            'data' => $projects,
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return view('project.allProjects',['projects'=>$projects]);
        }
    }
    /**
     * show function to show single project data
     *
     * @param int $project_id
     * @return object json for api or redirect to single project page to show single project data
     */
    public function show($project_id)
    {
        $project = project::find($project_id);
        if($project){
            $response = [
                'status' => "success",
                'msg' => "",
                'data' => $project,
            ];
        }else{
            $response = [
                'status' => "fail",
                'msg' => "No Such Project Found",
                'data' => "",
            ];
        }
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return view('project.singleProject',['project'=>$project]);
        }
    }
    /**
     * create function is the code that actually create the project
     *
     * @param ProjectRequest $request
     * @return object json for api or redirect to all projects after adding the new project
     */
    public function create(ProjectRequest $request)
    {
        $project = project::create([
            'project_name' => $request->project_name,
        ]);
        $response = [
            'status' => "success",
            'msg' => 'project created',
            'data' => $project,
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return redirect('project/allProjects')->with('msg1','project created');
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
        $project = project::find($id);
        if (!$project) {
            return redirect()->back()->with('msg', 'project doesn\'t exist');
        } else {
            return view('project.edit', ['project' => $project]);
        }
    }
    /**
     * update function is the a code for actual update of project data
     *  
     * @param ProjectRequest $request
     * @param int $id
     * @return object json for api or redirect to all projects page
     */
    public function update(ProjectRequest $request, $id)
    {
        project::where('id', $id)->update([
            'project_name' => $request->project_name
        ]);
        $project = project::find($id);
        $response = [
            'status' => "success",
            'msg' => 'project updated',
            'data' => $project,
        ];
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return redirect('/project/allProjects')->with('msg1','project updated');
        }
    }
    /**
     * destroy function is the process of delelation of project
     *
     * @param int $id
     * @return object json for api or redirect to the all projects list which is the previous page
     */
    public function destroy($id)
    {
        $project = project::find($id);
        if($project){
            $project->delete();
            $response = ['status' => "success", 'msg' => 'project deleted', 'data' => ""];
        }else{
            $response = [
                'status' => "fail",
                'msg' => "No Such Project Found",
                'data' => "",
            ];
        }
        if (request()->expectsJson()) {
            return response()->json($response);
        }else{
            return redirect('/project/allProjects')->with('msg1','project deleted');
        }
    }
}
