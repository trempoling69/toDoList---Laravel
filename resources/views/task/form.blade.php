<form method="POST">
    @csrf
    @method($task->id ? 'PUT':'POST')
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Une belle tâche" required value="{{old('name', $task->name)}}">
            @error('name')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorie</label>
            <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{old('category', $task->category)}}">
                <option selected disabled>Selectionner la catégorie</option>
                @forelse($categories as $category)
                <option value="{{$category->id}}" @if(old('category', $task->categories?->id) === $category->id) selected @endif>{{$category->name}}</option>
                @empty
                <option disabled>Aucune catégorie de créée</option>
                @endforelse
            </select>
            @error('category')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="w-full">
            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de fin</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                  </svg>
                </div>
                <input autocomplete="off" datepicker type="text" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selectionner la date" value="{{old('end_date', $task->end_date)}}">
            </div>
            @error('end_date')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Une jolie description">{{old('description', $task->description)}}</textarea>
            @error('description')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-primary-900 hover:bg-blue-800">
        {{$task->id ? 'Modifier' : 'Ajouter'}} la tâche
    </button>
</form>