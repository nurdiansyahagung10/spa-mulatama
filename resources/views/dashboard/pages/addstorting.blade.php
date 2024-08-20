@extends('dashboard.main')


@section('dashboardheader')
    @include('layout.nav')
@endsection


@section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class=" p-10 pb-0 w-full h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
        <form class="w-full " enctype="multipart/form-data" action="/storting" method="post">
            @csrf
            <div class="p-5 w-full text-center">
                <h1 class="dark:text-white text-2xl">Tambah Storting</h1>

            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Tanggal Storting
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="tanggal_storting" value="{{date('Y-m-d')}}" type="date">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        anggota
                    </label>
                    <input type="hidden" name="anggota_id" value="{{$anggota->id}}">
                    <input
                        class=" block w-full bg-gray-200 pointer-events-none darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        value="{{$anggota->nama}}" type="text">
                    
            </div>
            </div>

            

            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Nominal storting
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="nominal_storting" type="number">
                </div>
            </div> 


            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        foto bukti storting
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="bukti" id="bukti_storting" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed p-5  text-center   '>
                    <Image  id="foto_bukti_storting" class="w-auto relative   rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        catatan storting
                    </label>
                    <textarea
                    class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-2xl py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                    name="note"></textarea>
                </div>
            </div>
            <div class="flex  flex-wrap pt-3 mt-6 -mx-3 mb-6">
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

    document.getElementById('bukti_storting').onchange = evt => {
  const [file] = document.getElementById('bukti_storting').files
  if (file) {
    document.getElementById('foto_bukti_storting').src = URL.createObjectURL(file);
    document.getElementById('foto_bukti_storting').classList.add('h-40');
  }
}

    </script>
@endsection
