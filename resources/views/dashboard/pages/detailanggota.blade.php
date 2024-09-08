@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
        <h1 class="text-xl">Detail anggota</h1>
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
@endsection
