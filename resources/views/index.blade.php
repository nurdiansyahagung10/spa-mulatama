@extends('dashboard.main')

@section('dashboardpage')


@include('layout.notiferror')
@include('layout.notifsuccess')

    <div class=" p-10 w-full  h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
        <form class="w-full " action="{{ route('auth') }}" method="post">
            @csrf

            <div class="p-5 w-full text-center">
                <h1 class="dark:text-white text-2xl">Login SPA Mulatama</h1>

            </div>

        
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block dark:text-white text-black  mb-2" for="grid-password">
                        Email
                    </label>
                    <input
                        class=" block w-full bg-transparent text-black dark:text-white border border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        name="email" type="email">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block dark:text-white text-black mb-2" for="grid-password">
                        Password
                    </label>
                    <input
                        class="number-input block w-full bg-transparent text-black border-stone-400 dark:text-white border   rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        name="password" type="password">
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <button
                        class=" block w-full bg-black text-white border dark:bg-base-300   rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white">
                        Submit
                    </button>

                </div>
            </div>

        </form>
    </div>


@endsection
