@extends('dashboard.main')


@section('dashboardheader')
    @include('layout.nav')
@endsection


@section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class=" p-10 pb-0 w-full h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
        <form class="w-full " enctype="multipart/form-data" action="{{ url('anggota') }}" method="post">
            @csrf
            <div class="p-5 w-full text-center">
                <h1 class="dark:text-white text-2xl">Tambah Anggota</h1>

            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Pdl
                    </label>

                    <select
                        class="number-input block w-full bg-transparent dark:text-white border   border-stone-400 rounded-full text-black py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        name="pdl_id">
                        @foreach ($pdl as $item)
                            <option class="text-black" value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Jenis anggota
                    </label>

                    <select
                        class="number-input block w-full bg-transparent dark:text-white border   border-stone-400 rounded-full text-black py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        name="jenis_anggota">
                            <option class="text-black" value="baru">baru</option>
                            <option class="text-black" value="lama">lama</option>
                    </select>

                </div>
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
                        Tanggal lahir
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="tanggal_lahir" type="date">
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
                        No hp
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="nohp" id="field_nohp" type="number"> 
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
                        foto calon anggota
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="foto_anggota" id="anggota" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed p-5  text-center   '>
                    <Image  id="foto_anggota" class="w-auto relative   rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        foto ktp calon anggota
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="foto_ktp_anggota" id="ktp_anggota" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed  p-5 text-center   '>
                    <Image  id="foto_ktp_anggota" class="w-auto relative  rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        foto calon anggota memegang ktp
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="foto_anggota_memegang_ktp" id="memegang_ktp" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed p-5 text-center   '>
                    <Image  id="foto_memegang_ktp" class="w-auto relative  rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        usaha
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="usaha" type="text">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        foto usaha
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="foto_usaha" id="usaha" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed p-5  text-center   '>
                    <Image   id="foto_usaha" class="w-auto relative   rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>


            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Alamat usaha
                    </label>
                    <textarea
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-2xl py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="alamat_usaha"></textarea>
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
                        foto pengikat
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="foto_pengikat" id="pengikat" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>

            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed p-5  text-center   '>
                    <Image  id="foto_pengikat" class="w-auto relative   rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>



            <!-- <div class="flex flex-wrap -mx-3">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Nominal pinjaman
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="nominal_pinjaman" type="number">
                </div>
            </div> -->
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

    document.getElementById('anggota').onchange = evt => {
  const [file] = document.getElementById('anggota').files
  if (file) {
    document.getElementById('foto_anggota').src = URL.createObjectURL(file);
    document.getElementById('foto_anggota').classList.add('h-40');
  }
}
    document.getElementById('ktp_anggota').onchange = evt => {
  const [file] = document.getElementById('ktp_anggota').files
  if (file) {
    document.getElementById('foto_ktp_anggota').src = URL.createObjectURL(file);
    document.getElementById('foto_ktp_anggota').classList.add('h-40');
  }
}
    document.getElementById('memegang_ktp').onchange = evt => {
  const [file] = document.getElementById('memegang_ktp').files
  if (file) {
    document.getElementById('foto_memegang_ktp').src = URL.createObjectURL(file);
    document.getElementById('foto_memegang_ktp').classList.add('h-40');
  }
}
    document.getElementById('usaha').onchange = evt => {
  const [file] = document.getElementById('usaha').files
  if (file) {
    document.getElementById('foto_usaha').src = URL.createObjectURL(file);
    document.getElementById('foto_usaha').classList.add('h-40');
  }
}
    document.getElementById('pengikat').onchange = evt => {
  const [file] = document.getElementById('pengikat').files
  if (file) {
    document.getElementById('foto_pengikat').src = URL.createObjectURL(file);
    document.getElementById('foto_pengikat').classList.add('h-40');
  }
}



        const numberinput = document.querySelectorAll('.number-input');
        numberinput.forEach(function(inputan) {
            inputan.addEventListener('input', (e) => {
                e.target.value = e.target.value.slice(0, 16);
            });
        });


        document.getElementById('field_nohp').addEventListener('input', (e) => {
            e.target.value = e.target.value.slice(0, 13);
            console.log(localStorage.theme);
        });
    </script>
@endsection
