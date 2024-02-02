@extends('layout')

@section('title', 'Modifier une tache')

@section('content')
<section>
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Modifier une tâche</h2>
        @include('task.form')
    </div>
</section>
@endsection