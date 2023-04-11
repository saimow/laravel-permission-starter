<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.tasks.index', ['tasks' => $tasks]);
    }

    public function create(){
        $users = User::get();

        return view('admin.tasks.create', ['users' => $users]);
    }

    public function store(StoreTaskRequest $request){
        Task::create($request->validated());

        return redirect()->route('admin.tasks.index');
    }

    public function edit(Task $task){
        $users = User::get();

        return view('admin.tasks.edit', ['task' => $task, 'users' => $users]);
    }

    public function update(Task $task, UpdateTaskRequest $request){
        $task->update($request->validated());

        return redirect()->route('admin.tasks.index');
    }

    public function destroy(Task $task){
        $task->delete();

        return redirect()->route('admin.tasks.index');
    }
}
