@extends('layouts.admin')

@section('content')
<div class="table-responsive">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Total Projects</th>
                <th scope="col">First Project</th>
                <th scope="col">Last Project</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{$totalProjects}}</td>
                <td scope="row">{{$firstProject->title}}</td>
                <td scope="row">{{$lastProject->title}}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
