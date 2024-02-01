    <div drag-root class="flex flex-row w-full justify-around mt-4 overflow-auto">
		<div drag-todo class="flex flex-col flex-shrink-0 w-1/4 bg-gray-100 dark:bg-gray-700 rounded">
			<div class="flex items-center flex-shrink-0 h-10 px-2">
				<span class="block text-sm font-semibold capitalize dark:text-white">à faire</span>
				<span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30 dark:bg-gray-900 dark:text-indigo-500">{{$tasks->where('status', 'todo')->count()}}</span>
				<button class="flex items-center justify-center w-6 h-6 ml-auto text-indigo-500 rounded hover:bg-indigo-500 hover:text-indigo-100" onclick="window.location='{{ route('task.create') }}'">
					<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
					</svg>
				</button>
			</div>
			<div class="flex flex-col pb-2 overflow-auto">
                @foreach($tasks->where('status', 'todo') as $task)
				<div drag-item="{{$task->id}}" class="relative flex flex-col items-start p-4 m-3 bg-white rounded-lg cursor-pointer bg-opacity-90 dark:bg-gray-600 group hover:bg-opacity-100" draggable="true">
					<button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 dark:text-gray-200 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
						<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
						</svg>
					</button>
                    @if(!is_null($task->categories))
					<span class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">{{$task->categories}}</span>
                    @endif
					<h4 class="mt-3 text-sm font-medium dark:text-white">{{$task->name}}</h4>
					<div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
						<div class="flex items-center">
							<svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
							</svg>
							<span class="ml-1 leading-none">{{$task->end_date}}</span>
						</div>
						<div class="relative flex items-center ml-4">
							<svg class="relative w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
							</svg>
						</div>
						<img class="w-6 h-6 ml-auto rounded-full" src='https://randomuser.me/api/portraits/women/26.jpg'/>
					</div>
                    <div class="flex w-full mt-5 flex-row-reverse">
                        <button wire:click="moveTask({{ $task->id }}, 'in_progress')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-1.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                            <span class="sr-only">changer de status</span>
                        </button>
                    </div>
				</div>
                @endforeach
			</div>
		</div>
		<div drag-progress class="flex flex-col flex-shrink-0 w-1/4 bg-gray-100 dark:bg-gray-700 rounded">
			<div class="flex items-center flex-shrink-0 h-10 px-2">
				<span class="block text-sm font-semibold capitalize dark:text-white">en cours</span>
				<span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30 dark:bg-gray-900 dark:text-indigo-500">{{$tasks->where('status', 'in_progress')->count()}}</span>
			</div>
			<div  class="flex flex-col pb-2 overflow-auto">
                @foreach($tasks->where('status', 'in_progress') as $task)
				<div drag-item="{{$task->id}}" class="relative flex flex-col items-start p-4 m-3 bg-white rounded-lg cursor-pointer bg-opacity-90 dark:bg-gray-600 group hover:bg-opacity-100" draggable="true">
					<button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 dark:text-gray-200 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
						<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
						</svg>
					</button>
                    @if(!is_null($task->categories))
					<span class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">{{$task->categories}}</span>
                    @endif
					<h4 class="mt-3 text-sm font-medium dark:text-white">{{$task->name}}</h4>
					<div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
						<div class="flex items-center">
							<svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
							</svg>
							<span class="ml-1 leading-none">{{$task->end_date}}</span>
						</div>
						<div class="relative flex items-center ml-4">
							<svg class="relative w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
							</svg>
						</div>
						<img class="w-6 h-6 ml-auto rounded-full" src='https://randomuser.me/api/portraits/women/26.jpg'/>
					</div>
                    <div class="flex w-full justify-between mt-5">
                        <button wire:click="moveTask({{ $task->id }}, 'todo')" type="button" style="transform: scaleX(-1)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-1.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                            <span class="sr-only">changer de status</span>
                        </button>
                        <button wire:click="moveTask({{ $task->id }}, 'done')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-1.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                            <span class="sr-only">changer de status</span>
                        </button>
                    </div>
				</div>
                @endforeach
			</div>
		</div>
		<div drag-done class="flex flex-col flex-shrink-0 w-1/4 bg-gray-100 dark:bg-gray-700 rounded">
			<div class="flex items-center flex-shrink-0 h-10 px-2">
				<span class="block text-sm font-semibold capitalize dark:text-white">terminé</span>
				<span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30 dark:bg-gray-900 dark:text-indigo-500">{{$tasks->where('status', 'done')->count()}}</span>
			</div>
			<div class="flex flex-col pb-2 overflow-auto">
                @foreach($tasks->where('status', 'done') as $task)
				<div drag-item="{{$task->id}}" class="relative flex flex-col items-start p-4 m-3 bg-white rounded-lg cursor-pointer bg-opacity-90 dark:bg-gray-600 group hover:bg-opacity-100" draggable="true">
					<button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 dark:text-gray-200 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
						<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
						</svg>
					</button>
                    @if(!is_null($task->categories))
					<span class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">{{$task->categories}}</span>
                    @endif
					<h4 class="mt-3 text-sm font-medium dark:text-white">{{$task->name}}</h4>
					<div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
						<div class="flex items-center">
							<svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
							</svg>
							<span class="ml-1 leading-none">{{$task->end_date}}</span>
						</div>
						<div class="relative flex items-center ml-4">
							<svg class="relative w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
							</svg>
						</div>
						<img class="w-6 h-6 ml-auto rounded-full" src='https://randomuser.me/api/portraits/women/26.jpg'/>
					</div>
                    <div class="flex w-full mt-5">
                        <button wire:click="moveTask({{ $task->id }}, 'in_progress')" type="button" style="transform: scaleX(-1)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-1.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                            <span class="sr-only">changer de status</span>
                        </button>
                    </div>
				</div>
                @endforeach
			</div>
		</div>
	</div>