<?php

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('task.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id)  {
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('task.show');

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('task.store');

Route::get('/hello', function () {
    return 'Hello';
});
