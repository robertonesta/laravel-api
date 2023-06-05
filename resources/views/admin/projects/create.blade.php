@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>New Project</h1>
    @include('partials.validation_errors')
    <form action="{{route('admin.projects.store')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label" class="text-uppercase">Title</label>
          <input type="text"
            class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Add a title for this project max 150 characters">
        </div>
        <div class="d-flex justify-content-center align-items-center gap-3 my-3">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Confirm</button>
        </div>
    </form>
</div>
@endsection