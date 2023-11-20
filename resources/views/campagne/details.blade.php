@extends('base')

@section('body')

<p class="text-center my-8">
    <a href="{{ route('campagne.liste') }}" class="rounded p-4 bg-teal-500 text-white">
        <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>
        Retour
    </a>
</p>

<dl class="grid grid-cols-2">
    <dt>Nom</dt>
    <dd>{{ $campagne->nom }}</dd>

    <dt>Slug</dt>
    <dd>{{ $campagne->slug }}</dd>

    <dt>Vue</dt>
    <dd><code>{{ $campagne->slug }}.blade.php</code></dd>
</dl>

<h2 class="mt-4 font-bold text-lg">Inscrits</h2>
<table>
    <thead>
        <tr>
            <th>Email</th>
            
            @can('admin')
            <th></th>
            @endcan
        </tr>
    </thead>

    <tbody>
        @foreach ($campagne->souscriptions as $s)
        <tr>
            <td>
                <a href="mailto:{{ $s->email }}">{{ $s->email }}</a>
            </td>

            @can('admin')
            <td>
                <a class="bg-red-500 text-white rounded ml-2 p-1" href="{{ route('campagne.unsubscribe', ['campagne' => $campagne, 'token' => $s->token]) }}" title="Désinscrire">&times;</a>
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>
@endsection