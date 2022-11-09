@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="col-12 col-md-6">
        <div class="card-body">
          <h5 class="card-title h5"><span class="h4">Project Name:</span> {{$project->project_name}}</h5>
          <pre class="card-text h6 text-muted"><span>created: {{$project->created_at}}</span>          <span>updated: {{$project->updated_at}}</span></pre>
        </div>
      </div>
</div>
@endsection