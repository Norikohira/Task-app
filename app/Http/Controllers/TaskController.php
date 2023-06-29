<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function create()
    {
        $all_tasks = $this->task->latest()->get();

        return view('list.create')
            ->with('all_tasks', $all_tasks);
    }

    public function store(Request $request)
    {
        $this->task->name = $request->name;
        $this->task->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = $this->task->find($id);

        return view('list.edit')
            ->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        $task = $this->task->findOrFail($id);
        $task->name = $request->name;
        $task->save();

        return redirect()->route('task.create');
    }

    public function destroy($id)
    {
        $this->task->findOrFail($id)->delete();

        return redirect()->back();
    }

}
