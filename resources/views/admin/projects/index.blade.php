@extends('layouts.admin')

@section('content')
<div class="text-center">
    <a type="button" class="btn btn-success my-3 border-0 text-white" href="{{route('admin.projects.create')}}">Add a Project</a>
</div>
@if (Session::has('message'))
<div class="text-center alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{Session('message')}}</strong>
</div>
@endif
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITLE</th>
                <th scope="col">Repository</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr class="">
                <td scope="row">{{$project->id}}</td>
                <td scope="row">{{$project->title}}</td>
                <td scope="row">{{$project->repo}}</td>
                <td scope="row">{{$project->date}}</td>
                <td scope="row">
                    <a class="btn btn-primary" type="button" href="{{route('admin.projects.show', $project->id)}}"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-secondary" type="button" href="{{route('admin.projects.edit', $project->id)}}"><i class="fa-solid fa-pencil fa-fw"></i></a>
                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$project->id}}">
                        <i class="fas fa-trash fa-sm fa-fw"></i>
                    </a>

                    <div class="modal fade" id="modal-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$project->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex flex-column">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    <h5 class="modal-title" id="modalTitle-{{$project->id}}">Delete the project "{{$project->title}}"</h5>
                                </div>
                                <div class="modal-body">
                                    Are you sure? This is a no-return action.
                                </div>
                                <div class="modal-footer d-flex justify-content-center align-items-center gap-2">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                                    <form action="{{route('admin.projects.destroy', $project->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <p>No projects right now</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection