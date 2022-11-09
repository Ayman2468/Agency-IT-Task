@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="col-12 col-md-6">
        <div class="card-body">
          <h5 class="card-title h5"><span class="h4">Project Name:</span> {{$task->project->project_name}}</h5>
          <h6 class="card-title h6"><span class="h5">Task Name:</span> {{$task->task_name}}</h5>
          <h6 class="card-title h6"><span class="h5">Employee:</span> {{$task->user->user_name}}</h5>
          <p>{{$task->details}}</p>
          <p class="h6 text-muted">Status: {{$task->status}}</p>
          <pre class="card-text h6 text-muted"><span>created: {{$task->created_at}}</span>          <span>updated: {{$task->updated_at}}</span></pre>
        </div>
      </div>
</div>
@endsection