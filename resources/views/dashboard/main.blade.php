@extends('layout.template')


@section('header')
@yield('dashboardheader')
@endsection

@section('main')

<section class="relative">

@yield('dashboardpage')
</section>

@endsection