@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body py-3">
            <h3><strong>Project name:</strong> {{$project->title}}</h3>
            <p><strong>Repository URL:</strong> {{$project->repo}}</p>
            <p><strong>Date: </strong>{{$project->date}}</p>
            <p><strong>Type: </strong>{{$project->type?->name}}</p>
            <div class="text-center">
                <a type="button" class="btn btn-secondary" href="{{route('admin.projects.index')}}">Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection