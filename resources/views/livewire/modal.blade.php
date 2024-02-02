<form method="POST" class="flex flex-col items-center p-2" action="{{$action}}">
    @csrf
    @method($category->id ? 'PUT':'POST')
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 p-6">
        <div class="sm:col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Une belle catégorie" required value="{{old('name', $category->name)}}">
            @error('name')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Couleur</label>
            <div class="flex gap-2">
                <input type="radio" name="color" id="color-red" value="bg-red-500" class="bg-red-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-red-500" required @if(old('color', $category->color) === 'bg-red-500') checked @endif>
                <input type="radio" name="color" id="color-blue" value="bg-blue-500" class="bg-blue-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-blue-500" required @if(old('color', $category->color) === 'bg-blue-500') checked @endif>
                <input type="radio" name="color" id="color-green" value="bg-green-500" class="bg-green-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-green-500" required @if(old('color', $category->color) === 'bg-green-500') checked @endif>
                <input type="radio" name="color" id="color-purple" value="bg-purple-500" class="bg-purple-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-purple-500" required @if(old('color', $category->color) === 'bg-purple-500') checked @endif>
                <input type="radio" name="color" id="color-fuschia" value="bg-fuchsia-500" class="bg-fuchsia-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-fuchsia-500" required @if(old('color', $category->color) === 'bg-fuchsia-500') checked @endif>
                <input type="radio" name="color" id="color-pink" value="bg-pink-500" class="bg-pink-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-pink-500" required @if(old('color', $category->color) === 'bg-pink-500') checked @endif>
                <input type="radio" name="color" id="color-indigo" value="bg-indigo-500" class="bg-indigo-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-indigo-500" required @if(old('color', $category->color) === 'bg-indigo-500') checked @endif>
                <input type="radio" name="color" id="color-teal" value="bg-teal-500" class="bg-teal-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-teal-500" required @if(old('color', $category->color) === 'bg-teal-500') checked @endif>
                <input type="radio" name="color" id="color-amber" value="bg-amber-500" class="bg-amber-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-amber-500" required @if(old('color', $category->color) === 'bg-amber-500') checked @endif>
                <input type="radio" name="color" id="color-zinc" value="bg-zinc-500" class="bg-zinc-500 border border-gray-300 w-1/8 rounded-lg p-2.5 text-zinc-500" required @if(old('color', $category->color) === 'bg-zinc-500') checked @endif>
            </div>
            @error('color')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-primary-900 hover:bg-blue-800">
        {{$category->id ? 'Modifier' : 'Ajouter'}} la catégorie
    </button>
</form>