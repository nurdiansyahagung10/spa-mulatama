@extends('layout.template')


@section('header')
@yield('dashboardheader')
@endsection

@section('main')
@yield('dashboardpage')
<script>
    function cekexptoken(token) {
        const dateNow = new Date();
        const tokenData = token.split(".")[1]
        const decodedJWT = JSON.parse(atob(tokenData))
        const miliseconds = dateNow.getTime() / 1000

        if (decodedJWT.exp < miliseconds) {
            window.location.href = '/signout';
        }

    }

    cekexptoken("{{session('access_token')}}");
</script>

@endsection
