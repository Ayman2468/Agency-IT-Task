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
            <h1>Projects</h1> <br>
        </div>
        <form method="get" action="{{route('allProjects')}}" class="p-0 col-12 col-md-6 my-4 d-flex justify-content-around align-items-baseline">
            <div class="p-0 col-8 d-flex justify-content-center align-items-baseline">
                <label for="search" class="p-0 col-8">Search By project Name :</label>
                <input class="form-control col-4" type="text" name="search" id="search">
            </div>
            <button class="btn btn-primary col-3" type="submit" id="key">search</button>
        </form>
        <a href='{{ url('project/make/') }}' class='btn btn-primary mb-1'>New Project</a>
        <table class='table table-hover table-responsive-lg table-bordered  text-center'>
            <!-- creating our table heading -->
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Created</th>
                <th>Edited</th>
                <th>Action</th>
            </tr>
            @foreach ($projects as $fetchedData)
                <tr>
                    <td>{{ $fetchedData->id }}</td>
                    <td>{{ $fetchedData->project_name }}</td>
                    <td>{{ $fetchedData->created_at }}</td>
                    <td>{{ $fetchedData->updated_at }}</td>

                    <td>
                        <a href='{{ url('project/singleProject/' . $fetchedData->id) }}' class='btn btn-success mb-1'>Show</a>
                        <a href='{{ url('project/edit/' . $fetchedData->id) }}' class='btn btn-primary mb-1'>Edit</a>

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
                                are you sure you want to delete this Project
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('project.delete', $fetchedData->id) }}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <br>
        <div class="d-flex justify-content-center">
            {!!$projects->links('pagination::bootstrap-5')!!}
        </div>
    </div>
@endsection
