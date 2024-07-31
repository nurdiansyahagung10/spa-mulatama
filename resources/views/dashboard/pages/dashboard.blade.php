@extends('dashboard.main') @section('dashboardheader') @include('layout.nav')
@endsection @section('dashboardpage')

<script>
    window.addEventListener("load", () => {
        document.documentElement.classList.add('dark');
    });

</script>
<div
    class="p-10 w-full mb-10 grid h-auto md:grid-cols-2 gap-8 mt-14 border-b-0 rounded-t-2xl border backdrop-blur-sm"
>
    @if (Auth::user()->role == 'admin')
    <a
        href="{{ route('addstaff') }}"
        class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full"
    >
        <div
            class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]"
        >
            <div class="pointer-events-none">
                <div
                    class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50"
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5"
                    >
                        <defs>
                            <pattern
                                id=":r2s:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2s:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
                <div
                    class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                    style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    "
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70"
                    >
                        <defs>
                            <pattern
                                id=":r2t:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2t:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div>
                <div
                    class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-[1.22rem] opacity-70"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                        />
                    </svg>
                </div>
            </div>
            <h2 class="card-title">Tambah Staff</h2>
        </div>
    </a>

    <a
        href="{{ route('staff') }}"
        class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full"
    >
        <div
            class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]"
        >
            <div class="pointer-events-none">
                <div
                    class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50"
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5"
                    >
                        <defs>
                            <pattern
                                id=":r2s:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2s:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
                <div
                    class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                    style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    "
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70"
                    >
                        <defs>
                            <pattern
                                id=":r2t:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2t:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div>
                <div
                    class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-[1.22rem] opacity-70"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                        />
                    </svg>
                </div>
            </div>
            <h2 class="card-title">List Staff</h2>
        </div>
    </a>

    @endif
    <a
        href="{{ url('anggota/create') }}"
        class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full"
    >
        <div
            class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]"
        >
            <div class="pointer-events-none">
                <div
                    class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50"
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5"
                    >
                        <defs>
                            <pattern
                                id=":r2s:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2s:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
                <div
                    class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                    style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    "
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70"
                    >
                        <defs>
                            <pattern
                                id=":r2t:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2t:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div>
                <div
                    class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-[1.22rem] opacity-70"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                        />
                    </svg>
                </div>
            </div>
            <h2 class="card-title">Tambah anggota</h2>
        </div>
    </a>

    <a
        href="{{ url('anggota') }}"
        class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full"
    >
        <div
            class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]"
        >
            <div class="pointer-events-none">
                <div
                    class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50"
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5"
                    >
                        <defs>
                            <pattern
                                id=":r2s:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2s:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
                <div
                    class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                    style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    "
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70"
                    >
                        <defs>
                            <pattern
                                id=":r2t:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2t:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div>
                <div
                    class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-[1.22rem] opacity-70"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                        />
                    </svg>
                </div>
            </div>
            <h2 class="card-title">List anggota</h2>
        </div>
    </a>

    @if (Auth::user()->role == 'admin')

    <a
        href="{{ url('cabang/create') }}"
        class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full"
    >
        <div
            class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]"
        >
            <div class="pointer-events-none">
                <div
                    class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50"
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5"
                    >
                        <defs>
                            <pattern
                                id=":r2s:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2s:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
                <div
                    class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                    style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    "
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70"
                    >
                        <defs>
                            <pattern
                                id=":r2t:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2t:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div>
                <div
                    class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-[1.22rem] opacity-70"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                        />
                    </svg>
                </div>
            </div>
            <h2 class="card-title">Tambah Cabang</h2>
        </div>
    </a>
    <a
        href="{{ url('cabang') }}"
        class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full"
    >
        <div
            class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]"
        >
            <div class="pointer-events-none">
                <div
                    class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50"
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5"
                    >
                        <defs>
                            <pattern
                                id=":r2s:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2s:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
                <div
                    class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                    style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    "
                >
                    <svg
                        aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70"
                    >
                        <defs>
                            <pattern
                                id=":r2t:"
                                width="72"
                                height="56"
                                patternUnits="userSpaceOnUse"
                                x="50%"
                                y="-6"
                            >
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect
                            width="100%"
                            height="100%"
                            stroke-width="0"
                            fill="url(#:r2t:)"
                        ></rect>
                        <svg x="50%" y="-6" class="overflow-visible">
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="-72"
                                y="112"
                            ></rect>
                            <rect
                                stroke-width="0"
                                width="73"
                                height="57"
                                x="72"
                                y="168"
                            ></rect>
                        </svg>
                    </svg>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div>
                <div
                    class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-[1.22rem] opacity-70"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                        />
                    </svg>
                </div>
            </div>
            <h2 class="card-title">List Cabang</h2>
        </div>
    </a>

    @endif
</div>

@endsection
