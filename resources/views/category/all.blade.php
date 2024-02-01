@extends('layout')

@section('title', 'toutes les catégories')

@section('content')
<div class="container mx-auto my-8 space-y-10">
    <h1 class="dark:text-white text-3xl">Toutes vos catégories</h1>
    <button data-modal-target="create-category-modal" data-modal-toggle="create-category-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Créer une catégorie
        <svg class="w-4 h-4 ml-2" fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 309.059 309.059" xml:space="preserve">
            <g>
	            <g>
		            <path d="M280.71,126.181h-97.822V28.338C182.889,12.711,170.172,0,154.529,0S126.17,12.711,126.17,28.338 v97.843H28.359C12.722,126.181,0,138.903,0,154.529c0,15.621,12.717,28.338,28.359,28.338h97.811v97.843 c0,15.632,12.711,28.348,28.359,28.348c15.643,0,28.359-12.717,28.359-28.348v-97.843h97.822 c15.632,0,28.348-12.717,28.348-28.338C309.059,138.903,296.342,126.181,280.71,126.181z"/>
	            </g>
            </g>
        </svg>
    </button>
    @if(!$categories->isEmpty())
    <div class="flex flex-wrap gap-10">
        @foreach($categories as $category)
            <div class="h-16 w-72 bg-gray-200 dark:bg-gray-500 flex items-center gap-5 rounded hover:cursor-pointer" data-modal-target="update-category-modal" data-modal-toggle="update-category-modal">
                <div class="{{$category->color}} w-4 h-full rounded-l"></div>
                <span class="font-bold text-lg">{{$category->name}}</span>
            </div>
        @endforeach
            @include('category.update', ['categoryToUpdate'=>$category])
    </div>
        @else
        <h1 class="text-center font-bold text-3xl my-10 text-gray-800 dark:text-white font-mono">Votre liste de catégories est bien vide...</h1>
        <div class="max-w-4xl mx-auto px-10 py-4 dark:bg-gray-800 rounded-lg shadow-lg">
            <div class="flex flex-col justify-center py-12 items-center">
                <div class="flex justify-center items-center">
                    <img class="w-64 h-64" src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690257804/jjqw2hfv0t6karxdeq1s.svg" alt="image empty states">
                </div>
                <h1 class="text-gray-700 dark:text-white font-medium text-2xl text-center mb-3">Créer votre première catégorie !</h1>
                <p class="text-gray-500 text-center mb-6">La Création de catégories est le chemin vers une bonne organisation</p>
                <div class="flex flex-col justify-center">
                    <button data-modal-target="create-category-modal" data-modal-toggle="create-category-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Créer ma première catégorie
                    </button>
                </div>
            </div>
        </div>
@endif
@include('category.create')
</div>
@endsection