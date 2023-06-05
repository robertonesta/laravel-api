@extends('layouts.admin')

@section('content')

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
                <td scope="row">VIEW/EDIT/DELETE</td>
            </tr>
            @empty
            <p>No projects right now</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection