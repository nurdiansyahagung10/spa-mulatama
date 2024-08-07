@extends('dashboard.main')


@section('dashboardheader')
@include('layout.nav')
@endsection


@section('dashboardpage')

@include('layout.notiferror')
@include('layout.notifsuccess')
<div
class=" p-10 w-full  h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
<form class="w-full " action="{{ route ('staffupdate', ['id' => $user->id]) }}" method="post">
    @method('put')
    @csrf
    <div class="p-5 w-full text-center">
        <h1 class="dark:text-white text-2xl">Edit Staff</h1>

    </div>
  
<div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
        <label class="block text-black dark:text-white mb-2" for="grid-password">
          Nama
        </label>
        <input class=" block w-full bg-transparent text-black border-stone-400 dark:text-white border   rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white" required name="nama" value="{{$user->nama}}" type="text" >
      </div>
    </div>
<div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
        <label class="block text-black dark:text-white mb-2" for="grid-password">
          Email
        </label>
        <input class=" block w-full bg-transparent text-black border-stone-400 dark:text-white border   rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white" required name="email" value="{{$user->email}}"  type="email" >
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
        <label class="block text-black dark:text-white mb-2" for="grid-password">
          Cabang
        </label>
        <select class="number-input block w-full bg-transparent text-black border-stone-400 dark:text-white border   rounded-full py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white" required name="cabang_id"  >
          <option class="text-black" value="{{$user->cabang->id}}">{{$user->cabang->nama_cabang}}</option>        
          @foreach ($cabang as $item )
          @if ($item->id != $user->cabang_id)
          <option class="text-black" value="{{$item->id}}">{{$item->nama_cabang}}</option>
          @endif
          @endforeach
        </select>
      </div>
    </div>
    
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
        <button class=" block w-full bg-black  border-stone-400 text-white border dark:bg-base-300   rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white"   >
            Submit
        </button>

      </div>
    </div>

  </form>
</div>

@endsection
