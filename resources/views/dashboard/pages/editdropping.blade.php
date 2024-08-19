@extends('dashboard.main')


@section('dashboardheader')
    @include('layout.nav')
@endsection


@section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class=" p-10 pb-0 w-full h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
        <form class="w-full " enctype="multipart/form-data" action="/dropping/{{$dropping->id}}" method="post">
            @method('put')
            @csrf
            <div class="p-5 w-full text-center">
                <h1 class="dark:text-white text-2xl">Edit Dropping</h1>

            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Tanggal dropping
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="tanggal_dropping" value="{{$dropping->tanggal_dropping}}" type="date">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        anggota
                    </label>

                    <select
                        class="number-input block w-full bg-transparent dark:text-white border   border-stone-400 rounded-full text-black py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        name="anggota_id">
                        <option class="text-black" value="{{ $dropping->anggota_id }}">{{ $dropping->anggota->nama }}</option>

                        @foreach ($anggota as $item)
                        @if ($item->id != $dropping->anggota_id)
                        <option class="text-black" value="{{ $item->id }}">{{ $item->nama }}</option>
                            
                        @endif
                        @endforeach
                    </select>

                </div>
            </div>

            

            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Nominal pinjaman
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="nominal_dropping" value="{{$dropping->nominal_dropping}}" type="number">
                </div>
            </div> 


            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        foto anggota mendatangani spk
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="foto_nasabah_mendatangani_spk"  id="mendatangani_spk" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed p-5  text-center   '>
                    <Image  id="foto_mendatangani_spk"                                     src="/Image/{{$dropping->anggota->pdl->cabang->id}}/{{$dropping->anggota->pdl->id}}/{{$dropping->anggota->id}}/{{$dropping->anggota->created_at->format('Y-m-d')}}/dropping/spk/{{$dropping->foto_nasabah_mendatangani_spk}}"
                        class="w-auto relative h-40  rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        foto anggota dan spk yang sudah di tandatangan
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="foto_nasabah_dan_spk" id="nasabah_dan_spk" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed  p-5 text-center   '>
                    <Image                                     
                    src="/Image/{{$dropping->anggota->pdl->cabang->id}}/{{$dropping->anggota->pdl->id}}/{{$dropping->anggota->id}}/{{$dropping->anggota->created_at->format('Y-m-d')}}/dropping/spk/{{$dropping->foto_nasabah_dan_spk}}"
                        id="foto_nasabah_dan_spk" class="w-auto relative h-40  rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        catatan dropping
                    </label>

                    <textarea
                    class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-2xl py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                    name="note" >{{$dropping->note}}</textarea>

                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        bukti dropping
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="bukti" id="bukti" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed p-5  text-center   '>
                    <Image  
                    src="/Image/{{$dropping->anggota->pdl->cabang->id}}/{{$dropping->anggota->pdl->id}}/{{$dropping->anggota->id}}/{{$dropping->anggota->created_at->format('Y-m-d')}}/dropping/bukti/{{$dropping->bukti}}"

                    id="foto_bukti" class="w-auto relative h-40  rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>
            <div class="flex bg-white sticky bottom-0 flex-wrap pt-3 mt-6 -mx-3 mb-6">
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

    document.getElementById('mendatangani_spk').onchange = evt => {
  const [file] = document.getElementById('mendatangani_spk').files
  if (file) {
    document.getElementById('foto_mendatangani_spk').src = URL.createObjectURL(file);
    document.getElementById('foto_mendatangani_spk').classList.add('h-40');
  }
}
    document.getElementById('nasabah_dan_spk').onchange = evt => {
  const [file] = document.getElementById('nasabah_dan_spk').files
  if (file) {
    document.getElementById('foto_nasabah_dan_spk').src = URL.createObjectURL(file);
    document.getElementById('foto_nasabah_dan_spk').classList.add('h-40');
  }
}
    document.getElementById('bukti').onchange = evt => {
  const [file] = document.getElementById('bukti').files
  if (file) {
    document.getElementById('foto_bukti').src = URL.createObjectURL(file);
    document.getElementById('foto_bukti').classList.add('h-40');
  }
}

    </script>
@endsection
