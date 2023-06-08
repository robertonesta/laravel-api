@extends('layouts.admin')

@section('content')

<div class="container">
    <h2>Types</h2>
    @if (Session::has('message'))
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{Session('message')}}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-6">
            <div class="text-center">
                <a type="button" class="w-50 btn btn-success my-3 border-0 text-white" href="{{route('admin.types.create')}}">Add a new Type</a>
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
                        @forelse ($types as $type)
                        <tr class="">
                            <td scope="row">{{$type->id}}</td>
                            <td scope="row">{{$type->name}}</td>
                            <td scope="row">
                                <a class="btn btn-primary" type="button" href="{{route('admin.types.show', $type->id)}}"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning" type="button" href="{{route('admin.types.edit', $type->id)}}"><i class="fa-solid fa-pencil fa-fw"></i></a>
                                <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$type->id}}">
                                    <i class="fas fa-trash fa-sm fa-fw"></i>
                                </a>

                                <div class="modal fade" id="modal-{{$type->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$type->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex flex-column">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                <h5 class="modal-title" id="modalTitle-{{$type->id}}">Delete the type "{{$type->name}}"</h5>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure? This is a no-return action.
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center align-items-center gap-2">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                                                <form action="{{route('admin.types.destroy', $type->id)}}" method="post">
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
                        <p>No Types yet</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection