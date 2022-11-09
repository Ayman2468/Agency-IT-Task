@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('msg'))
        <div class="alert alert-danger" role="alert">
            <strong>{{session()->get('msg')}}</strong>
        </div>
        @endif
        @if(session()->has('msg1'))
        <div class="alert alert-success" role="alert">
            <strong>{{session()->get('msg1')}}</strong>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Task</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('task.create') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group row">
                                <label for="project_id"
                                    class="col-md-4 col-form-label text-md-right">Project Name<strong
                                        class="text-danger">*</strong></label>

                                <div class="col-md-6">
                                    <select id="project_id" class="form-control @error('project_id') is-invalid @enderror" name="project_id">
                                        <option value="" selected disabled></option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}"
                                                @if (old('project_id') == $project->id) selected @endif>
                                                {{ $project->project_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('project_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="task_name"
                                    class="col-md-4 col-form-label text-md-right">Task Name<strong
                                    class="text-danger">*</strong></label>

                                <div class="col-md-6">
                                    <input id="task_name" type="text"
                                        class="form-control @error('task_name') is-invalid @enderror" name="task_name"
                                        value="{{ old('task_name') }}" autocomplete="task_name">

                                    @error('task_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="user_id"
                                    class="col-md-4 col-form-label text-md-right">Employee Name<strong
                                        class="text-danger">*</strong></label>

                                <div class="col-md-6">
                                    <select id="employee_id" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id">
                                        <option value="" selected disabled></option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                @if (old('employee_id') == $employee->id) selected @endif>
                                                {{ $employee->user_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('employee_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="details"
                                    class="col-md-4 col-form-label text-md-right">Details<strong
                                    class="text-danger">*</strong></label>

                                <div class="col-md-6">
                                    <textarea id="details" type="text" class="form-control @error('details') is-invalid @enderror" name="details">{{ old('task_name') }}
                                    </textarea>
                                    @error('details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
