@extends('layout')

@section('title', 'toutes les taches')

@section('content')
    <div class="container mx-auto my-8 space-y-10">
        @if(!$tasks->isEmpty())
        <livewire:task />
        @else
        <h1 class="text-center font-bold text-3xl my-10 text-gray-800 dark:text-white font-mono">Votre liste de tâche est bien vide...</h1>
        <div class="max-w-4xl mx-auto px-10 py-4 dark:bg-gray-800 rounded-lg shadow-lg">
            <div class="flex flex-col justify-center py-12 items-center">
                <div class="flex justify-center items-center">
                    <img class="w-64 h-64"
                        src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690257804/jjqw2hfv0t6karxdeq1s.svg"
                        alt="image empty states">
                </div>
                <h1 class="text-gray-700 dark:text-white font-medium text-2xl text-center mb-3">Créer votre première tâche!</h1>
                <p class="text-gray-500 text-center mb-6">La gestion de tâche est le chemin vers la réussite</p>
                <div class="flex flex-col justify-center">
                    <button class="flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                        onclick="window.location='{{ route('task.create') }}'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6  mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Créer une tâche
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>
    <script>
        let dragRoot = document.querySelector('[drag-root]');
        let todoColumn = dragRoot.querySelector('[drag-todo]');
        let progressColumn = dragRoot.querySelector('[drag-progress]')
        let doneColumn = dragRoot.querySelector('[drag-done]')


        //TRIGGER ET AJOUTER UN ATTRIBUT A L'ELEMENT QUI EST EN DRAG
        dragRoot.addEventListener('dragstart', e => {
            let target = e.target;
            if (target.getAttribute('drag-item')) {
                target.setAttribute('dragging', true);
                console.log('start');
            }
        });

        //TRIGGER SI l'ELEMENT ARRIVE DANS LA COLONNE EN COURS
        progressColumn.addEventListener('dragover', e => {
            e.preventDefault()
            e.dataTransfer.dropEffect = "move";
        })
        progressColumn.addEventListener('drop', e => {
            e.preventDefault()
            let draggingEl = dragRoot.querySelector('[dragging]')
            let idOfTask = draggingEl.getAttribute('drag-item')
            progressColumn.appendChild(draggingEl)
            draggingEl.removeAttribute("dragging")
            let component = Livewire.find(e.target.closest('[wire\\:id]').getAttribute('wire:id'))
            component.call('moveTask', idOfTask, 'in_progress')
        })

        //TRIGGER SI l'ELEMENT ARRIVE DANS LA COLONNE A FAIRE
        todoColumn.addEventListener('dragover', e => {
            e.preventDefault()
            e.dataTransfer.dropEffect = "move";
        })
        todoColumn.addEventListener('drop', e => {
            e.preventDefault()
            let draggingEl = dragRoot.querySelector('[dragging]')
            let idOfTask = draggingEl.getAttribute('drag-item')
            todoColumn.appendChild(draggingEl)
            draggingEl.removeAttribute("dragging")
            let component = Livewire.find(e.target.closest('[wire\\:id]').getAttribute('wire:id'))
            component.call('moveTask', idOfTask, 'todo')
        })

        //TRIGGER SI l'ELEMENT ARRIVE DANS LA COLONNE FAIT
        doneColumn.addEventListener('dragover', e => {
            e.preventDefault()
            e.dataTransfer.dropEffect = "move";
        })
        doneColumn.addEventListener('drop', e => {
            e.preventDefault()
            let draggingEl = dragRoot.querySelector('[dragging]')
            let idOfTask = draggingEl.getAttribute('drag-item')
            doneColumn.appendChild(draggingEl)
            draggingEl.removeAttribute("dragging")
            let component = Livewire.find(e.target.closest('[wire\\:id]').getAttribute('wire:id'))
            component.call('moveTask', idOfTask, 'done')
        })
    </script>
    @endsection
