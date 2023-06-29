@extends ('layouts.app')

@section ('title', 'Task | Index')

@section ('navbar')

@section ('content')
<h2 class="text-start mt-5 m-5">Your tasks here...</h2>
  <form action="{{ route('task.create')}}" method="post">
  @csrf
    <div class="row m-5">
      <div class="col-10">
        <input type="text" name="name" id="" class="form-control" placeholder="Create a task">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-circle-plus"></i> Add</button>
      </div>
    </div>
  </form>

  @if($all_tasks->isNotEmpty())
  <table class="table table-striped table-dark table-hover">
    <thead>
      <th>ID</th>
      <th>Name</th>
      <th></th>
    </thead>
    <tbody>
      @foreach($all_tasks as $task)
      <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->name }}</td>
        <td>
          <a href="{{ route('task.edit', $task->id) }}" class="btn btn-secondary float-end mx-2"><i class="fa-solid fa-pen"></i></a>

          <form action="{{ route('task.destroy', ['id' => $task->id]) }}" method="post" class="d-inline">
          @csrf
          @method('DELETE')
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger float-end"><i class="fa-solid fa-trash-can"></i></button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif


@section ('footer')

@endsection
