@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
        <h1 class="text-xl">Detail Dropping</h1>
    </div>

    <div style="overflow: auto"
        class="p-10 w-full h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm">
        <table class="table  text-center align-middle">
            <tbody id="anggota-list-body-table" class="text-black/60 dark:text-stone-200">
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Tanggal dropping</td>
                        <td>:</td>
                        <td>{{$dropping->created_at->format('Y-m-d')}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>nama anggota</td>
                        <td>:</td>
                        <td>{{$dropping->anggota->nama}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>nominal pengajuan</td>
                        <td>:</td>
                        <td>{{$dropping->nominal_dropping}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>foto anggota mendatangani spk</td>
                        <td>:</td>
                         <td class="flex justify-center">
                            
                            <div class=" flex  h-full mb-6">
                                <div  class='rounded-xl  relative inline-block   text-center p-5  '>
                                    <Image id="foto_pengikat"                               
                                    src="/Image/{{$dropping->anggota->pdl->cabang->id}}/{{$dropping->anggota->pdl->id}}/{{$dropping->anggota->id}}/{{$dropping->anggota->created_at->format('Y-m-d')}}/dropping/spk/{{$dropping->foto_nasabah_mendatangani_spk}}"
                                    class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>foto anggota dan spk yang sudah di tanda tangan</td>
                        <td>:</td>
                        <td>
                            <div class=" flex  h-full mb-6">
                                <div  class='rounded-xl  relative inline-block   text-center p-5  '>
                                    <Image id="foto_pengikat"   src="/Image/{{$dropping->anggota->pdl->cabang->id}}/{{$dropping->anggota->pdl->id}}/{{$dropping->anggota->id}}/{{$dropping->anggota->created_at->format('Y-m-d')}}/dropping/spk/{{$dropping->foto_nasabah_dan_spk}}" class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Catatan dropping</td>
                        <td>:</td>
                        <td>{{$dropping->note}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>foto anggota dan spk yang sudah di tanda tangan</td>
                        <td>:</td>
                         <td class="flex justify-center">
                            <div class=" flex  h-full mb-6">
                                <div  class='rounded-xl  relative inline-block   text-center p-5  '>
                                    <Image id="foto_pengikat"                               
                                    src="/Image/{{$dropping->anggota->pdl->cabang->id}}/{{$dropping->anggota->pdl->id}}/{{$dropping->anggota->id}}/{{$dropping->anggota->created_at->format('Y-m-d')}}/dropping/bukti/{{$dropping->bukti}}"
                                        class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}  objectFit="conten"></Image>
                                </div>
                            </div>
                        </td>
                    </tr>        
                                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>pdl</td>
                        <td>:</td>
                        <td>{{$dropping->anggota->pdl->nama}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>cabang</td>
                        <td>:</td>
                        <td>{{$dropping->anggota->pdl->cabang->nama}}</td>
                    </tr>
                   
            </tbody>
        </table>
    </div>
@endsection

  