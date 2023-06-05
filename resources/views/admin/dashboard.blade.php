@extends('layouts.admin')

@section('content')
<div class="table-responsive text-center">
    <table class="table table-dark">
        <thead class="text-uppercase">
            <tr>
                <th scope="col">Total Projects</th>
                <th scope="col">First Project</th>
                <th scope="col">Last Project</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fw-bold" scope="row">{{$totalProjects}}</td>
                <td scope="row">{{$firstProject->title}} (published on: {{$firstProject->date}})</td>
                <td scope="row">{{$lastProject->title}} (published on: {{$lastProject->date}})</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
