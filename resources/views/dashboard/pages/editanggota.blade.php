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
@if(session('success'))
<div class="toast z-40 toast-end">
    <div class="border alert border-stone-200 dark:bg-transparent dark:text-white bg-white/20 backdrop-blur-lg ">
      <span>{{session('success')}}</span>
    </div>
  </div>

@endif
<div
class=" p-10 w-full  h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
<form class="w-full " action="/anggota/{{$anggota->id}}" method="post">
    @method('put')
    @csrf
    <div class="p-5 w-full text-center">
        <h1 class="dark:text-white text-2xl">Edit Anggota</h1>

    </div>
  
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Nama
          </label>
          <input
              class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
              value="{{$anggota->nama}}" name="nama" type="text">
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              No KTP
          </label>
          <input
              class="number-input block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
              value="{{$anggota->ktp}}" name="ktp" type="number">
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              No KK
          </label>
          <input
              class="number-input block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
              value="{{$anggota->kk}}" name="kk" type="number">
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Alamat
          </label>
          <textarea
              class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-2xl py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
               name="alamat">{{$anggota->alamat}}</textarea>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Pengikat
          </label>
          <input
              class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
              value="{{$anggota->pengikat}}" name="pengikat" type="text">
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              No hp
          </label>
          <input
              class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
              value="{{$anggota->nohp}}" name="nohp" id="field_nohp" type="text">
      </div>
  </div>
  @if (Auth::user()->role == 'admin')

  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Cabang
          </label>

          <select
              class="number-input block w-full bg-transparent dark:text-white border   border-stone-400 rounded-full text-black py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white" name="cabang_id">
              <option class="text-black" value="{{$anggota->cabang->id}}">{{$anggota->cabang->nama_cabang}}</option>        
              @foreach ($cabang as $item )
              @if ($item->id != $anggota->cabang_id)
              <option class="text-black" value="{{$item->id}}">{{$item->nama_cabang}}</option>
              @endif
              @endforeach
          </select>

      </div>
  </div>
  @else

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-4">
        <label class="block text-black dark:text-white mb-2" for="grid-password">
            Cabang
        </label>

        <select
            class="number-input pointer-events-none block w-full bg-transparent dark:text-white border   border-stone-400 rounded-full text-black py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white" name="cabang_id">
            <option class="text-black" value="{{$anggota->cabang->id}}">{{$anggota->cabang->nama_cabang}}</option>        

    </div>
</div>@endif    
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
