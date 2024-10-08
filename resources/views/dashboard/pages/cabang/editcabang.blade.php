@extends('dashboard.main')


@section('dashboardheader')
@include('layout.nav')
@endsection


@section('dashboardpage')

@include('layout.notiferror')
@include('layout.notifsuccess')
<div
class=" p-10 pb-0 w-full  h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
<form class="w-full " action="/cabang/{{$cabang->id}}" method="post">
    @method('put')
    @csrf
    <div class="p-5 w-full text-center">
        <h1 class="dark:text-white text-2xl">Edit Staff</h1>

    </div>
  
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block dark:text-white text-black mb-2" for="grid-password">
              Nama cabang
          </label>
          <input
              class=" block w-full bg-transparent dark:text-white border-stone-400 text-black border   rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white"
              required name="nama" value="{{$cabang->nama}}" type="text">
      </div>
  </div>
    
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-4">
        <label class="block dark:text-white text-black mb-2" for="grid-password">
            Admin dan provisi
        </label>
        <div class="flex mb-3 items-center gap-2">
            <input
            class=" block w-full bg-transparent dark:text-white border-stone-400 text-black border   rounded-full py-2 px-4  leading-tight focus:outline-none dark:focus:border-white"
            required value="{{$cabang->admin_provisi}}" name="admin_provisi" type="number">
            <span class="text-lg">%</span>
        </div>
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-4">
        <label class="block dark:text-white text-black mb-2" for="grid-password">
            simpanan
        </label>
        <div class="flex mb-3 items-center gap-2">
            <input
            class=" block w-full bg-transparent dark:text-white border-stone-400 text-black border   rounded-full py-2 px-4  leading-tight focus:outline-none dark:focus:border-white"
            required value="{{$cabang->simpanan}}" name="simpanan" type="number">
            <span class="text-lg">%</span>
        </div>
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
