<?php

namespace App\Livewire;

use App\Models\Task as ModelsTask;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Task extends Component
{
    public $tasks;

    public function mount()
    {
        $user = Auth::user();
        $this->tasks = $user->tasks()->get();
    }

    public function moveTask($taskId, $status)
    {
        $task = ModelsTask::find($taskId);
        $task->status = $status;
        $task->save();
        $user = Auth::user();
        $this->tasks = $user->tasks()->get();
    }

    public function render()
    {
        return view('livewire.task');
    }
}
