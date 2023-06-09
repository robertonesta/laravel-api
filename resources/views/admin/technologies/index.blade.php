@extends('layouts.admin')

@section('content')

<div class="container">
    <h2>Technologies</h2>
    @if (Session::has('message'))
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{Session('message')}}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-6">
            <div class="text-center">
                <a type="button" class="w-50 btn btn-success my-3 border-0 text-white" href="{{route('admin.technologies.create')}}">Add a new Technology</a>
            </div>
        </div>
        <div class="col-6">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                        <tr class="">
                            <td scope="row">{{$technology->id}}</td>
                            <td scope="row">{{$technology->name}}</td>
                            <td scope="row">
                                <a class="btn btn-primary" type="button" href="{{route('admin.technologies.show', $technology->id)}}"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning" type="button" href="{{route('admin.technologies.edit', $technology->id)}}"><i class="fa-solid fa-pencil fa-fw"></i></a>
                                <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$technology->id}}">
                                    <i class="fas fa-trash fa-sm fa-fw"></i>
                                </a>

                                <div class="modal fade" id="modal-{{$technology->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$technology->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex flex-column">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                <h5 class="modal-title" id="modalTitle-{{$technology->id}}">Delete the technology "{{$technology->name}}"</h5>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure? This is a no-return action.
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center align-items-center gap-2">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                                                <form action="{{route('admin.technologies.destroy', $technology->id)}}" method="post">
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
                        <p>No technologies yet</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{$technologies->links("pagination::bootstrap-5")}}
        </div>
    </div>
</div>

@endsection