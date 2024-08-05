@extends('layout.template')


@section('header')
@yield('dashboardheader')
@endsection

@section('main')
<section class="w-full relative">
    @yield('dashboardpage')
    
</section>


@endsection