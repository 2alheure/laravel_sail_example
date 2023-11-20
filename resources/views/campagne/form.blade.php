@extends('base')

@section('body')

<p class="text-center my-8">
    <a href="{{ route('campagne.liste') }}" class="rounded p-4 bg-teal-500 text-white">
        <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>
        Retour
    </a>
</p>

@if ($errors->any())
<div class="text-red-500">
    <p>Des erreurs sont survenues.</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form class="grid grid-cols-4 gap-8" action="{{ $isUpdate ? route('campagne.updateHandle', ['campagne' => $campagne]) : route('campagne.createHandle') }}" method="post">
    @csrf
    <label for="nom">Nom</label><input type="text" id="nom" name="nom" class="col-span-3 border rounded" value="{{ old('nom') ?? $campagne->nom ?? null }}">

    <label for="slug">Slug</label><input type="text" id="slug" name="slug" class="col-span-3 border rounded" value="{{ old('slug') ?? $campagne->slug ?? null }}">

    <button type="submit" class="bg-blue-500 text-white col-start-2 col-span-2 rounded p-2">Envoyer</button>
</form>
@endsection