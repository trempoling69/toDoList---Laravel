<button data-dropdown-toggle="dropdowncat-{{$id}}" type="button" class="z-50 absolute top-0 right-0 flex items-center justify-center w-5 h-5 mt-3 mr-2 text-gray-500 dark:text-gray-200 rounded hover:bg-gray-200 hover:text-gray-700 flex">
    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
    </svg>
</button>
<div id="dropdowncat-{{$id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
      <li>
        <form action="{{route('category.destroy', $id)}}" method="POST" class="w-full">
            @method('DELETE')
            @csrf
            <button type="submit" class="w-full block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-left">Supprimer</button>               
        </form>
      </li>
    </ul>
</div>