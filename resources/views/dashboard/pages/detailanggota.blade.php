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
                        <td>Tanggal pengajuan</td>
                        <td>:</td>
                        <td>{{$anggota->tanggal_pengajuan}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Pdl</td>
                        <td>:</td>
                        <td>{{$anggota->pdl->nama}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Cabang</td>
                        <td>:</td>
                        <td>{{$anggota->pdl->cabang->nama}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Nama anggota</td>
                        <td>:</td>
                        <td>{{$anggota->nama}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>tanggal lahir</td>
                        <td>:</td>
                        <td>{{$anggota->tanggal_lahir}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td> Alamat rumah</td>
                        <td>:</td>
                        <td>{{$anggota->alamat}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>No hp</td>
                        <td>:</td>
                        <td>{{$anggota->nohp}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>No KK</td>
                        <td>:</td>
                        <td>{{$anggota->kk}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>No Ktp</td>
                        <td>:</td>
                        <td>{{$anggota->ktp}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Foto anggota</td>
                        <td>:</td>
                        <td class="flex justify-center"> <img
                            src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/ktp dan anggota/{{$anggota->foto_anggota}}"
                            alt="Shoes" class="!max-w-52" /></td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Foto ktp anggota</td>
                        <td>:</td>
                        <td class="flex justify-center">   <img
                            src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/ktp dan anggota/{{$anggota->foto_ktp_anggota}}"
                            alt="Shoes" class="!max-w-52" />
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Foto anggota memegang ktp</td>
                        <td>:</td>
                        <td class="flex justify-center">  <img
                            src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/ktp dan anggota/{{$anggota->foto_anggota_memegang_ktp}}"
                            alt="Shoes" class="!max-w-52" />
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Foto Usaha</td>
                        <td>:</td>
                        <td >{{$anggota->usaha}}</td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>usaha</td>
                        <td>:</td>
                        <td class="flex justify-center"> <img
                            src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/tempat usaha/{{$anggota->foto_usaha}}"
                            alt="Shoes" class="!max-w-52" /></td>
                    </tr>
                    <tr class="dark:border-stone-400 dark:text-stone-300 text-black dark:hover:text-white">
                        <td>Nominal pengajuan</td>
                        <td>:</td>
                        <td >{{$anggota->nominal_pinjaman}}</td>
                    </tr>
                   
            </tbody>
        </table>
    </div>
@endsection

  
{{--     

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
             
          </label>
      </div>
  </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              tanggal lahir : {{$anggota->tanggal_lahir}}
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
             
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
               :
          </label>
         
</div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Foto ktp calon anggota :
          </label>
            
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Foto ktp calon anggota :
          </label>
              
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
             
          </label>
      </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-4">
        <label class="block text-black dark:text-white mb-2" for="grid-password">
            Foto usaha :
        </label>
           
    </div>
</div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Alamat usaha : {{$anggota->alamat_usaha}}
          </label>
      </div>
  </div>
  
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Surat pengikat : {{$anggota->pengikat}}
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-4">
        <label class="block text-black dark:text-white mb-2" for="grid-password">
            Foto surat pengikat :
        </label>
            <img
              src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/surat pengikat/{{$anggota->foto_pengikat}}"
              alt="Shoes" class="!max-w-52" />
    </div>
</div>

  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              nominal pengajuan : 
          </label>
      </div>
  </div>


  </div>
</div>


@endsection --}}
