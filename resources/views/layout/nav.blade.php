<nav id="navbar" class="z-30 sticky top-0 backdrop-blur-lg border-b bg-white/10 dark:bg-base-100/10">
    <div class="container drawer mx-auto py-3.5 px-2 flex items-center justify-between">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content sm:hidden">
            <!-- Page content here -->
            <label for="my-drawer" class="btn btn-square btn-ghost drawer-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block h-6 w-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </label>
        </div>
        <div class="drawer-side sm:hidden">
            <ul class="bg-white flex flex-col w-full text-base-content min-h-full p-4">
                <!-- Sidebar content here -->
                <li class="flex justify-end w-full">
                    <label for="my-drawer" aria-label="close sidebar"
                        class="text-center btn shadow-none bg-transparent focus:bg-transparent hover:bg-transparent drawer-overlay">X</label>
                </li>
                <li class="flex-grow items">
                    <ul class="bg-transparent w-full text-center text-base-content min-h-full p-4">
                        <!-- Sidebar content here -->
                        <li class="w-full text-stone-600 hover:text-black p-4">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        @if (Request::url() == url('anggota/create'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('anggota') }}">
                                    <button>List Anggota</button>
                                </a>
                            </li>
                        @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                                implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('storting'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('storting') }}">
                                    <button>List storting</button>
                                </a>
                            </li>
                        @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                                implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('dropping'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('dropping') }}">
                                    <button>List Dropping</button>
                                </a>
                            </li>
                        @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                                implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('pdl'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('pdl') }}">
                                    <button>List Pdl</button>
                                </a>
                            </li>
                        @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                                implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('staff'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('staff') }}">
                                    <button>List staff</button>
                                </a>
                            </li>
                        @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                                implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('anggota'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('anggota') }}">
                                    <button>List Anggota</button>
                                </a>
                            </li>
                        @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                                implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('cabang'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('cabang') }}">
                                    <button>List cabang</button>
                                </a>
                            </li>
                        @elseif (Request::url() == url('anggota'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('anggota/create') }}">
                                    <button>Tambah Anggota</button>
                                </a>
                            </li>
                        @elseif (Request::url() == url('staff/create'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('staff/list') }}">
                                    <button>List staff</button>
                                </a>
                            </li>
                        @elseif (Request::url() == url('staff/list'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('staff/create') }}">
                                    <button>Tambah staff</button>
                                </a>
                            </li>
                        @elseif (Request::url() == url('cabang/create'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('cabang') }}">
                                    <button>List Cabang</button>
                                </a>
                            </li>
                        @elseif (implode('/', array_slice(explode('/', Request::url()), 0, -1)) == url('dropping/create'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('dropping') }}">
                                    <button>List Dropping</button>
                                </a>
                            </li>
                        @elseif (Request::url() == url('dropping'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('anggota/create') }}">
                                    <button>Tambah Anggota</button>
                                </a>
                            </li>
                        @elseif (implode('/', array_slice(explode('/', Request::url()), 0, -1)) == url('storting/create'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('storting') }}">
                                    <button>List storting</button>
                                </a>
                            </li>
                        @elseif (Request::url() == url('storting'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('anggota/create') }}">
                                    <button>Tambah Anggota</button>
                                </a>
                            </li>
                        @elseif (Request::url() == url('cabang'))
                            <li class="w-full text-stone-600 hover:text-black p-4">
                                <a href="{{ url('cabang/create') }}">
                                    <button>Tambah Cabang</button>
                                </a>
                            </li>
                        @endif

                        <li class="w-full text-stone-600 hover:text-black p-4">
                            <a href="#">Kontak</a>
                        </li>
                    </ul>
                    <ul class="bg-white w-full text-center text-base-content border-t min-h-full p-4">
                        <a href=""
                            class="w-full rounded-full leading-none text-white bg-black py-3 px-4 flex items-center justify-center">Signout</a>
                    </ul>
                </li>
            </ul>
        </div>

        <a href="{{ url('dashboard') }}">
            <h1 class="text-xl dark:text-white text-black font-medium">
                Mulatama
            </h1>
        </a>
        <div class="">
            <ul class="inline-flex items-center text-sm space-x-7">
                <ul class="items-center sm:inline-flex hidden space-x-9 border-e pe-7">
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <button
                                class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                Dashboard
                            </button>
                        </a>
                    </li>

                    @if (Request::url() == url('anggota/create'))
                        <li>
                            <a href="{{ url('anggota') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List Anggota
                                </button>
                            </a>
                        </li>
                    @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                            implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('storting'))
                        <li>
                            <a href="{{ url('storting') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List storting
                                </button>
                            </a>
                        </li>
                    @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                            implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('dropping'))
                        <li>
                            <a href="{{ url('storting') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List dropping
                                </button>
                            </a>
                        </li>
                    @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                            implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('pdl'))
                        <li>
                            <a href="{{ url('pdl') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List pdl
                                </button>
                            </a>
                        </li>
                    @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                            implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('staff'))
                        <li>
                            <a href="{{ url('staff/list') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List staff
                                </button>
                            </a>
                        </li>
                    @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                            implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('anggota'))
                        <li>
                            <a href="{{ url('anggota') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List Anggota
                                </button>
                            </a>
                        </li>
                    @elseif (implode('/', array_slice(explode('/', Request::url()), 5)) == 'edit' &&
                            implode('/', array_slice(explode('/', Request::url()), 0, -2)) == url('cabang'))
                        <li>
                            <a href="{{ url('cabang') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List Cabang
                                </button>
                            </a>
                        </li>
                    @elseif (Request::url() == url('anggota'))
                        <li>
                            <a href="{{ url('anggota/create') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    Tambah Anggota
                                </button>
                            </a>
                        </li>
                    @elseif (Request::url() == url('staff/create'))
                        <li>
                            <a href="{{ url('staff/list') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List staff
                                </button>
                            </a>
                        </li>
                    @elseif (Request::url() == url('staff/list'))
                        <li>
                            <a href="{{ url('staff/create') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    Tambah staff
                                </button>
                            </a>
                        </li>
                    @elseif (implode('/', array_slice(explode('/', Request::url()), 0, -1)) == url('dropping/create'))
                        <li>
                            <a href="{{ url('dropping') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List dropping
                                </button>
                            </a>
                        </li>
                    @elseif (Request::url() == url('dropping'))
                        <li>
                            <a href="{{ url('anggota/create') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    Tambah anggota
                                </button>
                            </a>
                        </li>
                    @elseif (Request::url() == url('cabang/create'))
                        <li>
                            <a href="{{ url('cabang') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List Cabang
                                </button>
                            </a>
                        </li>
                    @elseif (implode('/', array_slice(explode('/', Request::url()), 0, -1)) == url('storting/create'))
                        <li>
                            <a href="{{ url('storting') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    List storting
                                </button>
                            </a>
                        </li>
                    @elseif (Request::url() == url('storting'))
                        <li>
                            <a href="{{ url('anggota/create') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    Tambah anggota
                                </button>
                            </a>
                        </li>
                    @elseif (Request::url() == url('cabang'))
                        <li>
                            <a href="{{ url('cabang/create') }}">
                                <button
                                    class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                    Tambah Cabang
                                </button>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="">
                            <button
                                class="align-middle dark:text-stone-200 text-black/60 hover:text-black dark:hover:text-white">
                                Kontak
                            </button>
                        </a>
                    </li>
                </ul>
                <li class="sm:px-0 px-3">
                    <button id="theme-toggle" class="align-middle text-black dark:text-white">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.3" stroke="currentColor" class="size-[1.15rem]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                            </svg>
                        </span>
                    </button>
                </li>
                <li class="sm:block hidden">
                    <a href="{{ route('signout') }}">
                        <button
                            class="bg-black dark:bg-base-300 dark:border dark:border-stone-400 align-middle text-white rounded-3xl p-1 px-3">
                            Sign Out
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.addEventListener("scroll", () => {
        let scroll = this.scrollY;
        const nav = document.getElementById("navbar");
        if (scroll == 0) {
            nav.classList.remove("bg-white/30");
            nav.classList.add("bg-white/10");
        } else {
            nav.classList.add("bg-white/30");
            nav.classList.remove("bg-white/10");
        }
    });
</script>
