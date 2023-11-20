<div style="border: 1px solid gray; width: 75%; margin: auto; padding: 2rem">
    <h1>{{ $campagne->nom }}</h1>

    @yield('body')
</div>

<p class="text-xs text-gray-600">Cet email vous est envoyé dans le cadre d'une campagne à laquelle vous vous êtes inscrit.</p>
<p class="text-xs text-gray-600">Vous pouvez dès à présent <a href="{{ route('campagne.unsubscribe', ['campagne' => $campagne, 'token' => $unsubscribe_token]) }}">vous désinscrire</a> si vous le souhaitez.</p>