@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit</h1>
    @include('partials.validation_errors')
    <form action="{{route('admin.projects.update', $project)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="title" class="form-label" class="text-uppercase">Title</label>
          <input type="text"
            class="form-control" value="{{ old('title', $project->title)}}" name="title" id="title" aria-describedby="helpId" placeholder="Change the title for this project max 150 characters">
        </div>
        <div class="mb-3">
          <label for="type_id" class="form-label" class="text-uppercase">Types</label>
          <select class="form-select @error('type_id') is invalid @enderror" name="type_id" id="type_id">
            <option value="">Select a Type</option>
            @foreach ($types as $type)
            <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
            @endforeach
          </select>
        </div>
        @foreach($technologies as $technology)
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="technologies[]" value="{{$technology->id}}" id="technology_id">
          <label class="form-check-label" for="">
            {{$technology->name}}
          </label>
        </div>
        @endforeach
        <div class="d-flex justify-content-center align-items-center gap-3 my-3">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Confirm</button>
        </div>
    </form>
</div>
@endsection