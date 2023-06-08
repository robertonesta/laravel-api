@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit</h1>
    @include('partials.validation_errors')
    <form action="{{route('admin.types.update', $type->id)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="type" class="form-label" class="text-uppercase">Name</label>
          <input type="text"
            class="form-control" value="{{ old('type', $type->name)}}" name="type" id="type" aria-describedby="helpType" placeholder="Change the name for this type">
        </div>
        <div class="d-flex justify-content-center align-items-center gap-3 my-3">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Confirm</button>
        </div>
    </form>
</div>
@endsection