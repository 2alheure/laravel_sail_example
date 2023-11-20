@extends('base')

@section('body')

<p class="text-center my-8">
    <a href="{{ route('campagne.create') }}" class="rounded p-4 bg-green-500 text-white">
        <i class="fa fa-plus mr-2" aria-hidden="true"></i> Créer une campagne
    </a>
</p>

<table class="w-full">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Vue</th>
            <th>Inscrits</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($campagnes as $c)
        <tr>
            <td>{{ $c->nom }}</td>
            <td><code>{{ $c->slug }}.blade.php</code></td>
            <td>{{ $c->souscriptions->count() }}</td>
            <td class="p-4 flex gap-2">
                <a class="py-2 px-4 rounded bg-lime-500 text-white" href="{{ route('campagne.subscribe', ['campagne' => $c]) }}" title="S'inscrire">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                </a>

                <a class="py-2 px-4 rounded bg-blue-500 text-white" href="{{ route('campagne.details', ['campagne' => $c]) }}" title="S'inscrire">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>

                <a class="py-2 px-4 rounded bg-yellow-500 text-white" href="{{ route('campagne.update', ['campagne' => $c]) }}" title="Modifier">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>

                <a class="py-2 px-4 rounded bg-red-500 text-white" href="{{ route('campagne.delete', ['campagne' => $c]) }}" onclick="return confirm('Êtes-vous sûr ?')" title="Supprimer">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<p class="text-center my-8">
    <a href="{{ route('campagne.create') }}" class="rounded p-4 bg-green-500 text-white">
        <i class="fa fa-plus mr-2" aria-hidden="true"></i> Créer une campagne
    </a>
</p>
@endsection