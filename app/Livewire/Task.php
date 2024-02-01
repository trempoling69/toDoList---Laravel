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
        // Initialiser la liste des tâches (vous devrez adapter cela à votre logique)
        $user = Auth::user();
        $this->tasks = $user->tasks()->get();
    }

    public function moveTask($taskId, $status)
    {
        $task = ModelsTask::find($taskId);
        $task->status = $status;
        $task->save();

        // Mettre à jour la liste des tâches après le déplacement
        $user = Auth::user();
        $this->tasks = $user->tasks()->get();
    }

    public function render()
    {
        return view('livewire.task');
    }
}
