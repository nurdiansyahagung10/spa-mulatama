@extends('dashboard.main')


@section('dashboardheader')
    @include('layout.nav')
@endsection


@section('dashboardpage')
@if ($errors->any())
<div class="toast z-40 toast-end">
        @foreach ($errors->all() as $error)
        <div class="border alert border-stone-200 dark:bg-transparent dark:text-white bg-white/20 backdrop-blur-lg ">
          <span>{{$error}}</span>
        </div>
              @endforeach
      </div>
      @endif
    <div class=" p-10 w-full h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
        <form class="w-full " action="{{ url('anggota') }}" method="post">
            @csrf
            <div class="p-5 w-full text-center">
                <h1 class="dark:text-white text-2xl">Tambah Anggota</h1>

            </div>
   
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Nama
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="nama" type="text">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        No KTP
                    </label>
                    <input
                        class="number-input block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="ktp" type="number">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        No KK
                    </label>
                    <input
                        class="number-input block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="kk" type="number">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Alamat
                    </label>
                    <textarea
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-2xl py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="alamat"></textarea>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Pengikat
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="pengikat" type="text">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        No hp
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="nohp" id="field_nohp" type="text">
                </div>
            </div>
            @if (Auth::user()->role == 'admin')

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Cabang
                    </label>

                    <select
                        class="number-input pointer-events-none block w-full bg-transparent dark:text-white border   border-stone-400 rounded-full text-black py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        cabang_id">
                        @foreach ($cabang as $item)
                                <option class="text-black" value="{{ $item->id }}">{{ $item->nama_cabang }}</option>
                          
                        @endforeach
                    </select>

                </div>
            </div>
            @else
            <input type="hidden" name="cabang_id" value="{{Auth::user()->cabang_id}}">
        @endif


            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <button
                        class=" block w-full dark:bg-base-300  bg-black text-white border border-stone-400  rounded-full py-2 px-4 mb-3 leading--none focus:border-white">
                        Submit
                    </button>

                </div>
            </div>

        </form>
    </div>

    <script>
        const numberinput = document.querySelectorAll('.number-input');
        numberinput.forEach(function(inputan) {
            inputan.addEventListener('input', (e) => {
                e.target.value = e.target.value.slice(0, 16);
            });
        });

        document.getElementById('field_nohp').addEventListener('input', (e) => {
            e.target.value = e.target.value.slice(0,13);
            console.log(localStorage.theme);
        });

    </script>
@endsection
