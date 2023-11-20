@extends('base')

@section('body')
<dl>
    <dt>Nom</dt>
    <dd>{{ $campagne->nom }}</dd>

    <dt>Slug</dt>
    <dd>{{ $campagne->slug }}</dd>

    <dt>Vue</dt>
    <dd><code>{{ $campagne->slug }}.blade.php</code></dd>
</dl>
@endsection