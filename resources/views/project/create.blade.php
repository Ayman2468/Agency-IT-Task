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
                    <div class="card-header">Create Project</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('project.create') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">Project Name<strong
                                    class="text-danger">*</strong></label>

                                <div class="col-md-6">
                                    <input id="project_name" type="text"
                                        class="form-control @error('project_name') is-invalid @enderror" name="project_name"
                                        value="{{ old('project_name') }}" autocomplete="project_name">

                                    @error('project_name')
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
