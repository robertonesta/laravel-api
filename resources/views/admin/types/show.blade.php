@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body py-3">
        <h2>#{{$type->id}} {{$type->name}}</h2>
        <h3>Related projects: </h3>
        @foreach($type->projects as $key => $project)
        <h4>{{$key + 1}}) {{$project->title}}</h4>
        @endforeach
            <div class="text-center">
                <a type="button" class="btn btn-secondary" href="{{route('admin.types.index')}}">Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection