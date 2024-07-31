<nav id="navbar" class=" z-30 sticky top-0 backdrop-blur-md border-b bg-white/10 dark:bg-base-100/10">
    <div class="container mx-auto py-3.5 px-2  flex items-center justify-between">

        <a href="{{ url('dashboard') }}">
            <h1 class="text-xl dark:text-white font-medium">Mulatama</h1>
        </a>
        <div class="sm:block hidden">
            <ul class="inline-flex items-center text-sm space-x-7">
                <ul class="inline-flex items-center space-x-9 border-e pe-7">
                    <li>
                        <a href="{{ url ('dashboard') }}"> <button class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">Dashboard</button> </a>
                    </li>
                    
                    @if (Request::url() == url('anggota/create'))
                    <li>
                        <a href="{{url ('anggota')}}"> <button class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">List Anggota</button> </a>
                    </li>
                    @elseif (Request::url() == url('anggota'))
                    <li>
                        <a href="{{url ('anggota/create')}}"> <button class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">Tambah Anggota</button> </a>
                    </li>
                    @elseif (Request::url() == url('staff/create'))
                    <li>
                        <a href="{{url ('staff/list')}}"> <button class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">List staff</button> </a>
                    </li>
                    @elseif (Request::url() == url('staff/list'))
                    <li>
                        <a href="{{url ('staff/create')}}"> <button class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">Tambah staff</button> </a>
                    </li>
                    @elseif (Request::url() == url('cabang/create'))
                    <li>
                        <a href="{{url ('cabang')}}"> <button class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">List Cabang</button> </a>
                    </li>
                    @elseif (Request::url() == url('cabang'))
                    <li>
                        <a href="{{url ('cabang/create')}}"> <button class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">Tambah Cabang</button> </a>
                    </li>

                    @endif
                    <li>
                        <a href=""> <button class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">Kontak</button> </a>
                    </li>
                </ul>
                <li>
                    <a href=""> <button class="align-middle text-black dark:text-white">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.3" stroke="currentColor" class="size-[1.15rem]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                            </svg>
                        </span>
                        </button> </a>
                </li>
                <li>
                    <a href="{{ route ('signout')}}"> <button  class="bg-black dark:bg-base-300 dark:border dark:border-stone-400 align-middle text-white rounded-3xl p-1 px-3">Sign Out</button> </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

