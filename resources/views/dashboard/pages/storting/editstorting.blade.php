@extends('dashboard.main')


@section('dashboardheader')
    @include('layout.nav')
@endsection


@section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class=" p-10 pb-0 w-full h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
        <form class="w-full " enctype="multipart/form-data" action="/storting/{{$storting->id}}" method="post">
            @csrf
            @method('put')
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
                        name="tanggal_storting" value="{{$storting->tanggal_storting}}" type="date">
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Anggota
                    </label>

                    <select
                        class="number-input block w-full bg-transparent dark:text-white border   border-stone-400 rounded-full text-black py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        name="anggota_id" id="anggota">
                        <option class="text-black" value="{{ $storting->dropping->anggota->nama }}">{{ $storting->dropping->anggota->nama }}</option>

                        @foreach ($anggota as $item)
                        @if ($item->id != $storting->dropping->anggota->anggota_id)
                        <option class="text-black" value="{{ $item->nama }}">{{ $item->nama }}</option>                            
                        @endif
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Dropping
                    </label>

                    <select
                        class="number-input block w-full bg-transparent dark:text-white border   border-stone-400 rounded-full text-black py-2 px-4  mb-3 leading-tight focus:outline-none dark:focus:border-white"
                        name="dropping_id" id="dropping">
                        <option class="text-black" value="{{ $storting->dropping_id }}">{{ $storting->dropping->nominal_dropping }} / {{ $storting->dropping->tanggal_dropping }}</option>

                    </select>

                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Target storting
                    </label>
                    <input
                        class=" block w-full bg-gray-200 pointer-events-none darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                      id="target"  value="{{$storting->dropping->nominal_dropping / 10 + ($storting->dropping->nominal_dropping / 10 * 0.1)}}" type="text">                    
            </div>
            </div>

            

            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        Nominal storting
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="nominal_storting" value="{{$storting->nominal_storting}}" type="number">
                </div>
            </div>
            
            

            <script>
                let dropping = document.getElementById('dropping');
                let anggota = document.getElementById('anggota');
                let target = document.getElementById('target');
                let droppingselected = null;
                let datafilter =null;

                anggota.addEventListener('input', async (e) => {
                    let value = e.target.value;

                    let datafetch  = await fetch ('/api/dropping/list/get');
                    let data = await datafetch.json();
                    datafilter = data.filter((item) => item.anggota.nama === value);
                    dropping.innerHTML = '';

                    await datafilter.forEach(e => {
                        dropping.innerHTML += `
                        <option class="text-black" value="${e.id}">${e.nominal_dropping} / ${e.tanggal_dropping}</option>
                        `;
                    });
                    
                    let droppingvalue = dropping.value;
                    droppingselected = datafilter.filter((item) => item.id == droppingvalue );
                    droppingselected.forEach(e => {
                        target.value = e.nominal_dropping / 10 + (e.nominal_dropping / 10 * 0.1); 
                    });

                    
                });

                dropping.addEventListener('input', async (e) => {
                    let droppingvalue = e.target.value;
                    
                    droppingselected = datafilter.filter((item) => item.id == droppingvalue );
                    droppingselected.forEach(e => {
                        target.value = e.nominal_dropping / 10 + (e.nominal_dropping / 10 * 0.1); 
                    });

                    
                });

            </script>


            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        foto bukti storting
                    </label>
                    <input
                        class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-full py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                        name="bukti" id="bukti_storting" value="" type="file" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class=" flex   h-full mb-6">
                <div  class='rounded-xl  relative inline-block border-2 border-dashed p-5  text-center   '>
                    <Image  
                    src="/Image/{{$storting->dropping->anggota->pdl->cabang->id}}/{{$storting->dropping->anggota->pdl->id}}/{{$storting->dropping->anggota->id}}/{{$storting->dropping->anggota->created_at->format('Y-m-d')}}/storting/{{$storting->bukti}}"
                    id="foto_bukti_storting" class="w-auto relative  @if($storting->bukti != null)
                    h-40
                    @endif   rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-4">
                    <label class="block text-black dark:text-white mb-2" for="grid-password">
                        catatan storting
                    </label>
                    <textarea
                    class=" block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400  rounded-2xl py-2 px-4 mb-3 leading-tight focus:outline-none dark:focus:border-white "
                    name="note">{{$storting->note}}</textarea>
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
