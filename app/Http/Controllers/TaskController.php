<?php

namespace App\Http\Controllers;

use App\Enums\EnumStatus;
use App\Http\Requests\Task as RequestsTask;
use App\Models\Category;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks()->get();
        $taskStatus = [EnumStatus::TODO, EnumStatus::INPROGRESS, EnumStatus::DONE];
        return view('task.all', compact("taskStatus", "tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $userCategories = Category::where('user_id', $user->id)->get();
        return view('task.create', ['task' => new Task(), 'categories' => $userCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestsTask $request)
    {
        $user = Auth::user();
        $formattedEndDate = Carbon::createFromFormat('m/d/Y', $request->input('end_date'))->format('Y-m-d');
        $user->tasks()->create([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "end_date" => $formattedEndDate,
            "start_date" => Carbon::now(),
            'category_id' => $request->input('category'),
            "status" => EnumStatus::TODO
        ]);
        return redirect()->route('task.all')->with('success', 'Tâche créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $task = Task::find($id);
        $formattedEndDate = Carbon::createFromFormat('Y-m-d', $task->end_date)->format('m/d/Y');
        $task->end_date = $formattedEndDate;
        $categories = $user->categories()->get();
        return view('task.update', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestsTask $request, string $id)
    {
        $formattedEndDate = Carbon::createFromFormat('m/d/Y', $request->input('end_date'))->format('Y-m-d');
        Task::find($id)->update([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "end_date" => $formattedEndDate,
            'category_id' => $request->input('category'),
        ]);
        return redirect()->route('task.all')->with('success', 'Tâche modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);
        return redirect()->route('task.all')->with('success', 'Supprimé');
    }
}
