@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body py-3">
            <h3><strong>Project name:</strong> {{$project->title}}</h3>
            @if($project->Image)
            <img class="img-fluid" src="{{asset('storage/' . $project->Image)}}" alt="{{$project->title}}">
            @endif
            <p><strong>Repository URL:</strong> {{$project->repo}}</p>
            <p><strong>Date: </strong>{{$project->date}}</p>
            <p><strong>Type: </strong>{{$project->type?->name}}</p>
            @foreach($project->technologies as $technology)
            <p><strong>Technology used: </strong>{{$technology->name}}</p>
            @endforeach

            <div class="text-center">
                <a type="button" class="btn btn-secondary" href="{{route('admin.projects.index')}}">Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection