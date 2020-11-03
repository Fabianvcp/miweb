@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot
@component('mail::message')

# Tus credenciales de acceso a {{ config('app.name') }}

Utiliza tu credenciales para acceder al sistema. <br>
    Email :{!!$user->email !!}<br>
    Contraseña : {!!$password!!}

@component('mail::button', ['url' => url('login')])
Ingresar
@endcomponent

{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
        © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.

        Si no deseas recibir más correos, puedes [modificar tus preferencias][unsubscribe].

        [unsubscribe]: {{ url('/') }}
    @endcomponent
@endslot

[logo]: https://programacionymas.com/images/mago/mago-200x200.png
@endcomponent
