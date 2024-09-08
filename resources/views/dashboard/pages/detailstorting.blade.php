@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
        <h1 class="text-xl">Detail Storting</h1>
    </div>

    <div style="overflow: auto"
        class="p-10 w-full h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm">
        <table class="table  text-center align-middle">
            <tbody id="anggota-list-body-table" class="text-black/60 dark:text-stone-200">
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Tanggal storting</td>
                    <td>:</td>
                    <td>{{ $storting->tanggal_storting }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>nama anggota</td>
                    <td>:</td>
                    <td>{{ $storting->dropping->anggota->nama }}</td>
                </tr>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>pdl</td>
                    <td>:</td>
                    <td>{{ $storting->dropping->anggota->pdl->nama }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>cabang</td>
                    <td>:</td>
                    <td>{{ $storting->dropping->anggota->pdl->cabang->nama }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>dropping</td>
                    <td>:</td>
                    <td>{{ $storting->dropping->nominal_dropping }} / {{ $storting->dropping->tanggal_dropping }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>target</td>
                    <td>:</td>
                    <td>{{ $storting->dropping->nominal_dropping / 10 }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>jasa (10%)</td>
                    <td>:</td>
                    <td>{{ ($storting->dropping->nominal_dropping / 10) * 0.1 }}</td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>total target</td>
                    <td>:</td>
                    <td>{{ $storting->dropping->nominal_dropping / 10 + ($storting->dropping->nominal_dropping / 10) * 0.1 }}
                    </td>
                </tr>

                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>jumlah storting</td>
                    <td>:</td>
                    <td>{{ $storting->nominal_storting }}</td>
                </tr>

                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>macet</td>
                    <td>:</td>
                    <td>{{ $storting->nominal_storting - ($storting->dropping->nominal_dropping / 10 + ($storting->dropping->nominal_dropping / 10) * 0.1) }}
                    </td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>foto bukti storing</td>
                    <td>:</td>
                    <td>
                        <div class=" flex justify-center   h-full mb-6">
                            <div class='rounded-xl  relative inline-block   text-center p-5  '>
                                <Image id="foto_pengikat"
                                    src="/Image/{{ $storting->dropping->anggota->pdl->cabang->id }}/{{ $storting->dropping->anggota->pdl->id }}/{{ $storting->dropping->anggota->id }}/{{ $storting->dropping->anggota->created_at->format('Y-m-d') }}/storting/{{ $storting->bukti }}"
                                    class="max-w-52 relative   rounded-xl" alt="" width={0} height={0}
                                    objectFit="conten"></Image>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                    <td>Catatan storting</td>
                    <td>:</td>
                    <td>{{ $storting->note }}</td>


            </tbody>
        </table>
    </div>
@endsection
