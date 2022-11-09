@extends('layouts.app')
@section('content')
    <!-- container -->
    <div class="container">

        @if (session()->has('msg'))
            <div class="alert alert-danger" role="alert">
                <strong>{{ session()->get('msg') }}</strong>
            </div>
        @endif
        @if (session()->has('msg1'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session()->get('msg1') }}</strong>
            </div>
        @endif
        <div class="page-header text-center">
            <h1>Tasks</h1> <br>
        </div>
        <form method="get" action="{{route('allTasks')}}" class="p-0 col-12 col-md-6 my-4 d-flex justify-content-around align-items-baseline">
            <div class="p-0 col-8 d-flex justify-content-center align-items-baseline">
                <label for="search" class="p-0 col-8">Search By Task Name :</label>
                <input class="form-control col-4" type="text" name="search" id="search">
            </div>
            <button class="btn btn-primary col-3" type="submit" id="key">search</button>
        </form>
        @if(Auth::user()->user_type == 'is_admin')
        <a href='{{ url('task/make/') }}' class='btn btn-primary mb-1'>New Task</a>
        @endif
        <table class='table table-hover table-responsive-lg table-bordered  text-center'>
            <!-- creating our table heading -->
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>Task Name</th>
                <th>Employee</th>
                <th>Details</th>
                <th>Status</th>
                <th>Created</th>
                <th>Edited</th>
                <th>Action</th>
            </tr>
            @foreach ($tasks as $fetchedData)
                <tr>
                    <td>{{ $fetchedData->id }}</td>
                    <td>{{ $fetchedData->project->project_name }}</td>
                    <td>{{ $fetchedData->task_name }}</td>
                    <td>{{ $fetchedData->user->user_name }}</td>
                    <td>{{ substr($fetchedData->details, 0, 30).'....' }}</td>
                    <td>{{ $fetchedData->status }}</td>
                    <td>{{ $fetchedData->created_at }}</td>
                    <td>{{ $fetchedData->updated_at }}</td>

                    <td>
                        <a href='{{ url('task/submit/' . $fetchedData->id) }}' class='btn btn-success mb-1'>Submit</a>
                        <a href='{{ url('task/singleTask/' . $fetchedData->id) }}' class='btn btn-warning mb-1'>Show</a>
                        
                        @if(Auth::user()->user_type == 'is_admin')
                            <a href='{{ url('task/edit/' . $fetchedData->id) }}' class='btn btn-primary mb-1'>Edit</a>
                            <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal{{$fetchedData->id}}">
                                Delete
                            </button>
                            <div class="modal fade" id="exampleModal{{$fetchedData->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="close ml-1" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    are you sure you want to delete this task
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('task.delete', $fetchedData->id) }}" method="POST">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <br>
        <div class="d-flex justify-content-center">
            {!!$tasks->links('pagination::bootstrap-5')!!}
        </div>
    </div>
@endsection
