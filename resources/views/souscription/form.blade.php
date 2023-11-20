@extends('base')

@section('body')

<p>Inscrivez-vous à ma superbe campagne {{ $campagne->nom }} !</p>

<form action="{{ route('campagne.subscribe', ['campagne' => $campagne]) }}" method="post">
    @csrf
    Veuillez saisir votre email : <input type="email" name="email" class="border">. <br>
    <button type="submit" class="bg-blue-500 text-white rounded p-2">Je m'inscris !</button>
</form>

@endsection