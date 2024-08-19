@extends('dashboard.main')


@section('dashboardheader')
    @include('layout.nav')
@endsection


@section('dashboardpage')

@include('layout.notiferror')
@include('layout.notifsuccess')

<div class=" p-10 pb-0 w-full  h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
        <form class="w-full " action="{{ url('pdl') }}/{{$pdl->id}}" method="post">
            @method('put')
            @csrf
            <div class="p-5 w-full text-center">
                <h1 class="dark:text-white text-2xl">Edit pdl</h1>

            </div>
    
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block dark:text-white text-black mb-2" for="grid-password">
                        Nama pdl
                    </label>
                    <input
                        class=" block w-full bg-transparent dark:text-white border-stone-400 text-black border   rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        required name="nama" value="{{$pdl->nama}}" type="text">
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                  <label class="block text-black dark:text-white mb-2" for="grid-password">
                    Cabang
                  </label>
                  <select class="number-input block w-full bg-transparent text-black border-stone-400 dark:text-white border   rounded-full py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white" required name="cabang_id"  >
                    <option class="text-black" value="{{$pdl->cabang_id}}">{{$pdl->cabang->nama}}</option>            

                    @foreach ($cabang as $item )
                    @if($item->id != $pdl->cabang_id)
                    <option class="text-black" value="{{$item->id}}">{{$item->nama_cabang}}</option>
                    @endif            
                    @endforeach
                  </select>
                </div>
              </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <button
                        class=" block w-full bg-black text-white border dark:bg-base-300   rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none focus:border-white">
                        Submit
                    </button>

                </div>
            </div>

        </form>
    </div>


@endsection
