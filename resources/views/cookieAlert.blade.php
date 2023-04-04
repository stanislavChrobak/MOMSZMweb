<!-- Cookie Alert -->
@php
    $isCookieAccepted = session('isCookieAccepted');
@endphp

@if( $isCookieAccepted != 'true')
    <div class="container alert alert-warning alert-dismissible fade show">
        <strong>Upozornenie!</strong> Naša stránka využíva cookies pre lepší pôžitok z jej používania.
        <form action="{{ route('accept-cookie') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="url" value="{{ request()->url() }}">
            <button type="submit" class="btn-close" data-bs-dismiss="alert"></button>
        </form>
    </div>
@endif
