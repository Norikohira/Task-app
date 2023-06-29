@extends('layout.app')

@section('title', 'Edit Task')

@section('content')
<h2 class="text-start">Edit Task</h2>
<form method="POST" action="{{ route('task.update', ['id' => $task->id]) }}">
  @csrf
  @method('PATCH')
  <input type="hidden" name="_method" value="PATCH">
  <div class="row">
    <div class="col-10">
      <input type="text" name="name" id="" class="form-control" value="{{ $task->name }}">
    </div>
    <div class="col">
      <button type="submit" class="btn btn-primary w-100">
        <i class="fa-solid fa-pen"></i> Save
      </button>
    </div>
  </div>
</form>
@endsection