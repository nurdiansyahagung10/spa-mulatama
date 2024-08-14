@extends('dashboard.main')


@section('dashboardheader')
@include('layout.nav')
@endsection


@section('dashboardpage')

@include('layout.notiferror')
@include('layout.notifsuccess')
<div
class=" p-10 w-full  h-auto mt-14 border-b-0 rounded-t-2xl min-h-[70vh] border  backdrop-blur-sm ">
<form class="w-full " action="/anggota/{{$anggota->id}}" method="post">
  
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Tanggal pengajuan : {{$anggota->tanggal_pengajuan}}
          </label>
      </div>
  </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              pdl : {{$anggota->pdl->nama}}
          </label>
      </div>
  </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              cabang : {{$anggota->pdl->cabang->nama}}
          </label>
      </div>
  </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Nama anggota : {{$anggota->nama}}
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
              Alamat rumah : {{$anggota->alamat}}
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              No hp : {{$anggota->nohp}}
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              No KK : {{$anggota->kk}}
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              No Ktp : {{$anggota->ktp}}
          </label>
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Foto calon anggota :
          </label>
          <img
          src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/ktp dan anggota/{{$anggota->foto_anggota}}"
          alt="Shoes" class="!max-w-52" />
</div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Foto ktp calon anggota :
          </label>
              <img
                src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/ktp dan anggota/{{$anggota->foto_ktp_anggota}}"
                alt="Shoes" class="!max-w-52" />
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              Foto ktp calon anggota :
          </label>
              <img
                src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/ktp dan anggota/{{$anggota->foto_anggota_memegang_ktp}}"
                alt="Shoes" class="!max-w-52" />
      </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-4">
          <label class="block text-black dark:text-white mb-2" for="grid-password">
              usaha : {{$anggota->usaha}}
          </label>
      </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-4">
        <label class="block text-black dark:text-white mb-2" for="grid-password">
            Foto usaha :
        </label>
            <img
              src="/Image/{{$anggota->pdl->cabang->nama}}/{{$anggota->pdl->nama}}/{{$anggota->nama}}/{{$anggota->tanggal_pengajuan}}/tempat usaha/{{$anggota->foto_usaha}}"
              alt="Shoes" class="!max-w-52" />
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
              nominal pengajuan : {{$anggota->nominal_pinjaman}}
          </label>
      </div>
  </div>


  </form>
</div>


@endsection
