@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')

    <div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
        <div class="grid gap-4 w-full grid-cols-2">
            <a href="/anggota">
            <button type="button" class="flex items-center gap-2" id="search-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                  </svg>
                                    <span class="text-xl">Back</span>
            </button>
        </a>
        <h1 class="text-xl text-right">Detail anggota</h1>

        </div>
    </div>

    <div style="overflow: auto"
        class="p-10 w-full h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm">
        <table class="table  text-center align-middle">
            <tbody id="anggota-list-body-table" class="text-black/60 dark:text-stone-200">
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Tanggal ditambahkan</td>
                    <td>:</td>
                    <td>{{ $anggota->created_at->format('Y-m-d') }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Jenis anggota</td>
                    <td>:</td>
                    <td>{{ $anggota->jenis_anggota }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Pdl</td>
                    <td>:</td>
                    <td>{{ $anggota->pdl->nama }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Cabang</td>
                    <td>:</td>
                    <td>{{ $anggota->pdl->cabang->nama }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Nama anggota</td>
                    <td>:</td>
                    <td>{{ $anggota->nama }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>tanggal lahir</td>
                    <td>:</td>
                    <td>{{ $anggota->tanggal_lahir }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td> Alamat rumah</td>
                    <td>:</td>
                    <td>{{ $anggota->alamat }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>No hp</td>
                    <td>:</td>
                    <td>{{ $anggota->nohp }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>No KK</td>
                    <td>:</td>
                    <td>{{ $anggota->kk }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>No Ktp</td>
                    <td>:</td>
                    <td>{{ $anggota->ktp }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Foto anggota</td>
                    <td>:</td>
                    <td class="flex justify-center">
                        <div class=" flex  h-full mb-6">
                            <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                <Image id="foto_pengikat"
                                    src="/Image/{{ $anggota->pdl->cabang->id }}/{{ $anggota->pdl->id }}/{{ $anggota->id }}/{{ $anggota->created_at->format('Y-m-d') }}/pengajuan/ktp dan anggota/{{ $anggota->foto_anggota }}"
                                    class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                    objectFit="conten"></Image>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Foto ktp anggota</td>
                    <td>:</td>
                    <td class="flex justify-center">
                        <div class=" flex  h-full mb-6">
                            <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                <Image id="foto_pengikat"
                                    src="/Image/{{ $anggota->pdl->cabang->id }}/{{ $anggota->pdl->id }}/{{ $anggota->id }}/{{ $anggota->created_at->format('Y-m-d') }}/pengajuan/ktp dan anggota/{{ $anggota->foto_ktp_anggota }}"
                                    class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                    objectFit="conten"></Image>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Foto anggota memegang ktp</td>
                    <td>:</td>
                    <td class="flex justify-center">
                        <div class=" flex  h-full mb-6">
                            <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                <Image id="foto_pengikat"
                                    src="/Image/{{ $anggota->pdl->cabang->id }}/{{ $anggota->pdl->id }}/{{ $anggota->id }}/{{ $anggota->created_at->format('Y-m-d') }}/pengajuan/ktp dan anggota/{{ $anggota->foto_anggota_memegang_ktp }}"
                                    class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                    objectFit="conten"></Image>
                            </div>
                        </div>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Usaha</td>
                    <td>:</td>
                    <td>{{ $anggota->usaha }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Foto usaha</td>
                    <td>:</td>
                    <td class="flex justify-center">

                        <div class=" flex  h-full mb-6">
                            <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                <Image id="foto_pengikat"
                                    src="/Image/{{ $anggota->pdl->cabang->id }}/{{ $anggota->pdl->id }}/{{ $anggota->id }}/{{ $anggota->created_at->format('Y-m-d') }}/pengajuan/tempat usaha/{{ $anggota->foto_usaha }}"
                                    class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                    objectFit="conten"></Image>
                            </div>
                        </div>
                    </td>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td> Alamat usaha</td>
                    <td>:</td>
                    <td>{{ $anggota->alamat_usaha }}</td>
                </tr>
                </tr>

                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Surat Pengikat</td>
                    <td>:</td>
                    <td>{{ $anggota->pengikat }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Foto surat pengikat</td>
                    <td>:</td>
                    <td class="flex justify-center">

                        <div class=" flex  h-full mb-6">
                            <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                <Image id="foto_pengikat"
                                    src="/Image/{{ $anggota->pdl->cabang->id }}/{{ $anggota->pdl->id }}/{{ $anggota->id }}/{{ $anggota->created_at->format('Y-m-d') }}/pengajuan/surat pengikat/{{ $anggota->foto_pengikat }}"
                                    class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                    objectFit="conten"></Image>
                            </div>
                        </div>
                    </td>


            </tbody>
        </table>
    </div>

    <div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
        <h1 class="text-xl">Detail Dropping anggota ini</h1>
    </div>

    <div id="dropping-detail">


        <div class="overflow-x-auto w-full mb-10">
            <ul class="flex gap-4" id="list-dropping">
            </ul>
        </div>
        <div class="p-10 w-full overflow-auto h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm">
            <table class="table  text-center align-middle">
                <tbody id="dropping-list-body-table" class="text-black/60 dark:text-stone-200">

                </tbody>
            </table>
        </div>

        <div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
            <h1 class="text-xl">Detail storting dropping ini</h1>
        </div>
        <div id="detail-storting">
            <div style="overflow: auto"
                class="p-10 w-full h-auto  border-b-0 rounded-t-2xl min-h-[70vh] max-h-[70vh] border backdrop-blur-sm">
                <table class="table  text-center align-middle">
                    <thead class="text-sm dark:text-white">
                        <tr class="dark:border-stone-400">
                            <th class="font-medium text-black dark:text-white ">Tenor</th>
                            <th class="font-medium text-black dark:text-white ">tanggal storting</th>
                            <th class="font-medium text-black dark:text-white ">target</th>
                            <th class="font-medium text-black dark:text-white ">jasa (10%)</th>
                            <th class="font-medium text-black dark:text-white ">total target</th>
                            <th class="font-medium text-black dark:text-white ">jumlah storting</th>

                            <th class="font-medium text-black dark:text-white ">macet</th>
                            <th class="font-medium text-black dark:text-white ">tanggal di tambahkan</th>
                            <th class="font-medium text-black dark:text-white ">Action</th>
                        </tr>
                    </thead>
                    <tbody id="storting-list-body-table" class="text-black/60 dark:text-stone-200">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let droppingdata = null;
        let storting = null;
        data = null;
        let droppingbody = document.getElementById('dropping-list-body-table');
        let stortingbody = document.getElementById('storting-list-body-table');
        let listdropping = document.getElementById('list-dropping');
        let droppingdetail = document.getElementById('dropping-detail');
        let stortindetail = document.getElementById('detail-storting');
        let totalstorting = 0;
        let resort = null;
        let tanggal = [];
        let datatenor = {
            tenor: [],
            macet: [],
        };



        function innertablestorting(index, tanggalstorting, item, dropping) {
            datatenor.tenor.push(index);
            let nominalstorting = item != null ? item.nominal_storting : 0;
            datatenor.macet.push(item != null ? (nominalstorting - (dropping.nominal_dropping / 10 + dropping
                .nominal_dropping /
                10 * 0.1) < 0 ? nominalstorting - (dropping.nominal_dropping / 10 + dropping
                .nominal_dropping / 10 * 0.1) : 0) : 0);

            let akumulasimacet = index != 0 ? datatenor.macet[index - 1] : 0;
            return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                        <td>${index + 1}</td>
                        <td>${tanggalstorting}</td>
                        <td>${dropping.nominal_dropping / 10 - akumulasimacet }</td>
                        <td>${dropping.nominal_dropping / 10 * 0.1}</td>
                        <td>${dropping.nominal_dropping / 10 + dropping.nominal_dropping / 10 * 0.1 - akumulasimacet}</td>
                        <td>${nominalstorting}</td>
                        <td>${datatenor.macet[index]}</td>
                        <td>${item != null ? new Date(item.tanggal_storting).toISOString().split('T')[0] : `belum storting`}</td>

                        ${item != null ? `<td>
                                                                                    <div class="dropdown">
                                                        <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                                </svg></div>
                                                        <form method="post" action="/storting/${item.id}" tabindex="0" class="dropdown-content menu rounded-box z-[1] w-24 mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0  dark:border-stone-400 p-2 shadow">
                                                            @method('delete')   
                                                            @csrf
                                                            <li class="w-full"><a href="/storting/${item.id}" class="hover:text-white ">view</a></li>
                                                                                            <li class="w-full"><a href="/storting/${item.id}/edit" class="hover:text-white ">Edit</a></li>

                                                            <li class="w-full"><button class="hover:text-white ">Delete</button></li>
                                                        </form>                            </div>
                                                        </td>` : `<td>
                                                                                    <div class="dropdown">
                                                        <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                                            
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                                </svg></div>
                                                                                <div  tabindex="0" class="dropdown-content menu rounded-box z-[1] w-24 mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0  dark:border-stone-400 p-2 shadow">
                                                            <li><a hr\ef="/storting/create/${
                                                                                    dropping.id
                                                                                }/${tanggalstorting}" class="hover:text-white">Storting</a></li>
                                                            </div>
                                                            </div>
                                                        </td> `}
                    </tr> 
                    `;
        }

        function innertabledropping(dropping, resort) {
            dropping.storting.forEach(item => {
                totalstorting += parseFloat(item.nominal_storting);
            });
            return `
       
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>resort</td>
           <td>:</td>
           <td>${resort}</td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>pinjaman</td>
           <td>:</td>
           <td>${dropping.nominal_dropping - (dropping.nominal_dropping * dropping.anggota.pdl.cabang.admin_provisi) / 100 }</td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>admin dan provisi</td>
           <td>:</td>
           <td>${(dropping.nominal_dropping * dropping.anggota.pdl.cabang.admin_provisi) / 100 }</td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>total pinjaman</td>
           <td>:</td>
           <td>${dropping.nominal_dropping }</td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>total pinjaman + jasa</td>
           <td>:</td>
           <td>${parseFloat(dropping.nominal_dropping) / 10 + parseFloat(dropping.nominal_dropping)}</td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>terstorting</td>
           <td>:</td>
           <td>${dropping.storting.length}</td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>nominal terstorting</td>
           <td>:</td>
           <td>${totalstorting}</td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>belum terbayar</td>
           <td>:</td>
           <td>${parseFloat(dropping.nominal_dropping) / 10 + parseFloat(dropping.nominal_dropping) - totalstorting}</td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>foto anggota mendatangani spk</td>
           <td>:</td>
           <td class="flex justify-center">
               ${dropping.foto_nasabah_mendatangani_spk != null ? 
                   `<div class=" flex  h-full">
                                                                                                           <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                                                                                               <Image id="foto_pengikat"
                                                                                                                   src="/Image/${dropping.anggota.pdl.cabang.id }/${dropping.anggota.pdl.id }/${dropping.anggota.id }/${new Date(dropping.anggota.created_at)
                                                                                                           .toISOString()
                                                                                                           .split("T")[0] }/dropping/spk/${dropping.foto_nasabah_mendatangani_spk }"
                                                                                                                   class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                                                                                                   objectFit="conten"></Image>
                                                                                                           </div>
                                                                                                       </div>`
               :
                   `<span>-</span>`
               }
           </td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>foto anggota dan spk yang sudah di tanda tangan</td>
           <td>:</td>
           <td>
               ${dropping.foto_nasabah_dan_spk != null ?
                   `<div class=" flex justify-center h-full">
                                                                                                           <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                                                                                               <Image id="foto_pengikat"
                                                                                                                   src="/Image/${dropping.anggota.pdl.cabang.id }/${dropping.anggota.pdl.id }/${dropping.anggota.id }/${new Date(dropping.anggota.created_at)
                                                                                                           .toISOString()
                                                                                                           .split("T")[0] }/dropping/spk/${dropping.foto_nasabah_dan_spk }"
                                                                                                                   class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                                                                                                   objectFit="conten"></Image>
                                                                                                           </div>
                                                                                                       </div>`
                   :
                   `<span>-</span>`
               }
           </td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>foto spk yang sudah di tanda tangan</td>
           <td>:</td>
           <td>
               ${dropping.foto_spk != null ?
                   `<div class=" flex justify-center h-full">
                                                                                                           <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                                                                                               <Image id="foto_pengikat"
                                                                                                                   src="/Image/${dropping.anggota.pdl.cabang.id }/${dropping.anggota.pdl.id }/${dropping.anggota.id }/${new Date(dropping.anggota.created_at)
                                                                                                           .toISOString()
                                                                                                           .split("T")[0] }/dropping/spk/${dropping.foto_spk }"
                                                                                                                   class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                                                                                                   objectFit="conten"></Image>
                                                                                                           </div>
                                                                                                       </div>`
               :
                   `<span>-</span>`
               }
           </td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>Catatan dropping</td>
           <td>:</td>
           <td>
               ${dropping.note != null ?
                   dropping.note : `-`}
           </td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td>foto anggota dan spk yang sudah di tanda tangan</td>
           <td>:</td>
           <td class="flex  justify-center">
               ${dropping.bukti != null ?
                   `<div class=" flex  h-full">

                                                                                                           <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                                                                                               <Image id="foto_pengikat"
                                                                                                                   src="/Image/${dropping.anggota.pdl.cabang.id }/${dropping.anggota.pdl.id }/${dropping.anggota.id }/${new Date(dropping.anggota.created_at)
                                                                                                           .toISOString()
                                                                                                           .split("T")[0] }/dropping/bukti/${dropping.bukti }"
                                                                                                                   class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                                                                                                   objectFit="conten"></Image>
                                                                                                           </div>
                                                                                                       </div>
                                                                                                   ` : `
                                                                                                       <span>-</span>` }
           </td>
       </tr>
       <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
           <td colspan="3" class="px-0">
            <form method="post" action="/dropping/${dropping.id}" class="grid grid-cols-2 gap-2" tabindex="0" >
                                @method('delete')   
                                @csrf
                                <a href="/dropping/${dropping.id}/edit" class="hover:text-white "><button type="button" class="btn w-full bg-transparent border  border-white">Edit</button></a>
                                <button type="submit" class="btn bg-transparent border  border-white">Delete</button>
                                </form> 
            
                            </td>
       </tr>

   
   `;
        }



        function load(colspan) {
            return `
            <tr class="border-b-0">
                <td colspan="${colspan}" class="h-[20rem]"><span class="text-black loading dark:text-white loading-bars loading-md"></span></td>
            </tr>`;
        }

        function getresort(day) {

            switch (day) {
                case 1:
                    return 'A';
                    break;
                case 2:
                    return 'B';
                    break;
                case 3:
                    return 'C';
                    break;
                case 4:
                    return 'D';
                    break;
                case 5:
                    ;
                    return 'E';
                    break;

            }
        }



        window.addEventListener('load', async () => {
            droppingbody.innerHTML = load(2);
            let datafetch = await fetch('/api/dropping/list/get');
            data = await datafetch.json();
            droppingdata = data.filter(item => item.anggota_id === {{ $anggota->id }});
            if (droppingdata.length == 0) {
                droppingdetail.innerHTML = `
                <div class="w-100 mb-10 p-3 text-center"><span>tidak ada data dropping</span></div>
                `;
            } else {


                let dropping = droppingdata[0];
                droppingbody.innerHTML = '';
                listdropping.innerHTML += `
                <li><a href="/dropping/create/{{$anggota->id}}"><button class="btn bg-transparent border-white border border-bottom">tambah dropping</button></a></li>
                `;
                droppingdata.forEach((item, index) => {
                    if (index == 0) {
                        listdropping.innerHTML += `
                <li><button class="btn bg-base-300 border-white border border-bottom" onclick="rendernewdata(${index},event)">${item.tanggal_dropping}</button></li>
                `;

                    } else {
                        listdropping.innerHTML += `
                <li><button class="btn bg-transparent border-white border border-bottom" onclick="rendernewdata(${index},event)">${item.tanggal_dropping}</button></li>
                `;

                    }

                });



                const date = new Date(dropping.tanggal_dropping);
                let currentYear = date.getFullYear();
                let currentMonth = date.getMonth();
                let currentDate = date.getDate();
                let currentDay = date.getDay();
                let resort = getresort(currentDay);

                firstmonthtenor = new Date(currentYear, currentMonth, currentDate + 7);
                lastmonthtenor = new Date(currentYear, currentMonth + 4, 0);

                for (
                    let day = firstmonthtenor; day <= lastmonthtenor; day.setDate(day.getDate() + 1)
                ) {
                    const dayOfWeek = day.getDay();
                    const formattedDate = day.toISOString().split("T")[0];

                    if (
                        dayOfWeek == currentDay
                    ) {
                        tanggal.push(new Date(day));
                    }
                    if (tanggal.length == 10) {
                        break;
                    }
                }


                droppingbody.innerHTML = innertabledropping(dropping, resort);





                stortingbody.innerHTML = load(9);
                storting = await dropping.storting;

                stortingbody.innerHTML = "";
                tanggal.forEach((item, index) => {
                    let tanggalstorting = new Date(item);
                    tanggalstorting.setDate(tanggalstorting.getDate() +
                        1);
                    const formattedDate = tanggalstorting.toISOString().split("T")[0];
                    let newstorting = storting.filter(item => item.tanggal_storting ===
                        formattedDate);
                    stortingbody.innerHTML += innertablestorting(index, formattedDate, newstorting[
                            0],
                        dropping);

                });
            }

        });


        async function rendernewdata(index, event) {
            tanggal = [];
            datatenor.tenor =[];
            datatenor.macet =[];
            droppingdata = data.filter(item => item.anggota_id === {{ $anggota->id }});
            let dropping = droppingdata[index];
            droppingbody.innerHTML = '';
            listdropping.innerHTML = '';
            listdropping.innerHTML += `
                <li><a href="/dropping/create/{{$anggota->id}}"><button class="btn bg-transparent border-white border border-bottom">tambah dropping</button></a></li>
                `;

            droppingdata.forEach((item, i) => {
                if (i == index) {
                    listdropping.innerHTML += `
                <li><button class="btn bg-base-300 border-white border border-bottom" onclick="rendernewdata(${i},event)">${item.tanggal_dropping}</button></li>
                `;

                } else {
                    listdropping.innerHTML += `
                <li><button class="btn bg-transparent border-white border border-bottom" onclick="rendernewdata(${i},event)">${item.tanggal_dropping}</button></li>
                `;

                }

            });

            const date = new Date(dropping.tanggal_dropping);
            let currentYear = date.getFullYear();
            let currentMonth = date.getMonth();
            let currentDate = date.getDate();
            let currentDay = date.getDay();
            let resort = getresort(currentDay);

            firstmonthtenor = new Date(currentYear, currentMonth, currentDate + 7);
            lastmonthtenor = new Date(currentYear, currentMonth + 4, 0);


            for (
                let day = firstmonthtenor; day <= lastmonthtenor; day.setDate(day.getDate() + 1)
            ) {
                const dayOfWeek = day.getDay();
                const formattedDate = day.toISOString().split("T")[0];

                if (
                    dayOfWeek == currentDay
                ) {
                    tanggal.push(new Date(day));
                }
                if (tanggal.length == 10) {
                    break;
                }
            }


            droppingbody.innerHTML = innertabledropping(dropping, resort);





            stortingbody.innerHTML = load(9);
            storting = await dropping.storting;

            stortingbody.innerHTML = "";
            tanggal.forEach((item, i) => {
                let tanggalstorting = new Date(item);
                tanggalstorting.setDate(tanggalstorting.getDate() +
                    1);
                const formattedDate = tanggalstorting.toISOString().split("T")[0];
                let newstorting = storting.filter(item => item.tanggal_storting ===
                    formattedDate);
                stortingbody.innerHTML += innertablestorting(i, formattedDate, newstorting[
                        0],
                    dropping);

            });
        }
    </script>
@endsection
