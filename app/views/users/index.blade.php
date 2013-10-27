<h2>User Index</h2>

@foreach($users as $user)

    {{ dd($user) }}

@endforeach

{{ $users->links() }}
