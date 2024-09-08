@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    <script>
        window.addEventListener("load", () => {
            document.documentElement.classList.add('dark');
        });
    </script>
    <div class="p-10 w-full mb-10 grid h-auto md:grid-cols-2 gap-8 mt-14 border-b-0 rounded-t-2xl border backdrop-blur-sm">
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('addstaff') }}"
                class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
                <div
                    class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                    <div class="pointer-events-none">
                        <div
                            class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                                <defs>
                                    <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                        <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                            style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    ">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                                <defs>
                                    <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div
                            class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-[1.22rem] opacity-70">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="card-title">Tambah Staff</h2>
                </div>
            </a>

            <a href="{{ route('staff') }}"
                class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
                <div
                    class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                    <div class="pointer-events-none">
                        <div
                            class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                                <defs>
                                    <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                        <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                            style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    ">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                                <defs>
                                    <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div
                            class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-[1.22rem] opacity-70">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="card-title">List Staff</h2>
                </div>
            </a>


            <a href="{{ url('cabang/create') }}"
                class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
                <div
                    class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                    <div class="pointer-events-none">
                        <div
                            class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                                <defs>
                                    <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                        <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                            style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    ">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                                <defs>
                                    <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div
                            class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-[1.22rem] opacity-70">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="card-title">Tambah Cabang</h2>
                </div>
            </a>
            <a href="{{ url('cabang') }}"
                class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
                <div
                    class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                    <div class="pointer-events-none">
                        <div
                            class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                                <defs>
                                    <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                        <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                            style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    ">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                                <defs>
                                    <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div
                            class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-[1.22rem] opacity-70">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="card-title">List Cabang</h2>
                </div>
            </a>



            <a href="{{ url('pdl/create') }}"
                class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
                <div
                    class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                    <div class="pointer-events-none">
                        <div
                            class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                                <defs>
                                    <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                        <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                            style="
                    mask-image: radial-gradient(
                        180px at 278.5px 36px,
                        white,
                        transparent
                    );
                ">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                                <defs>
                                    <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div
                            class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-[1.22rem] opacity-70">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="card-title">Tambah pdl</h2>
                </div>
            </a>

            <a href="{{ url('pdl') }}"
                class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
                <div
                    class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                    <div class="pointer-events-none">
                        <div
                            class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                                <defs>
                                    <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                        <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                            style="
                    mask-image: radial-gradient(
                        180px at 278.5px 36px,
                        white,
                        transparent
                    );
                ">
                            <svg aria-hidden="true"
                                class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                                <defs>
                                    <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                        x="50%" y="-6">
                                        <path d="M.5 56V.5H72" fill="none"></path>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                                <svg x="50%" y="-6" class="overflow-visible">
                                    <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                    <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                                </svg>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div
                            class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-[1.22rem] opacity-70">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="card-title">List pdl</h2>
                </div>
            </a>
        @endif

        <a href="{{ url('anggota/create') }}"
            class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
            <div
                class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                <div class="pointer-events-none">
                    <div
                        class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                            <defs>
                                <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                    <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                        style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    ">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                            <defs>
                                <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div
                        class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[1.22rem] opacity-70">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    </div>
                </div>
                <h2 class="card-title">Tambah anggota</h2>
            </div>
        </a>

        <a href="{{ url('anggota') }}"
            class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
            <div
                class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                <div class="pointer-events-none">
                    <div
                        class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                            <defs>
                                <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                    <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                        style="
                        mask-image: radial-gradient(
                            180px at 278.5px 36px,
                            white,
                            transparent
                        );
                    ">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                            <defs>
                                <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div
                        class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[1.22rem] opacity-70">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                </div>
                <h2 class="card-title">List anggota</h2>
            </div>
        </a>


        <a href="{{ url('storting') }}"
            class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
            <div
                class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                <div class="pointer-events-none">
                    <div
                        class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                            <defs>
                                <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                    <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                        style="
                    mask-image: radial-gradient(
                        180px at 278.5px 36px,
                        white,
                        transparent
                    );
                ">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                            <defs>
                                <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div
                        class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[1.22rem] opacity-70">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>
                    </div>
                </div>
                <h2 class="card-title">List Storting</h2>
            </div>
        </a>
        <a href="{{ url('dropping') }}"
            class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
            <div
                class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                <div class="pointer-events-none">
                    <div
                        class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                            <defs>
                                <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                    <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                        style="
                    mask-image: radial-gradient(
                        180px at 278.5px 36px,
                        white,
                        transparent
                    );
                ">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                            <defs>
                                <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div
                        class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[1.22rem] opacity-70">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>
                    </div>
                </div>
                <h2 class="card-title">List Dropping</h2>
            </div>
        </a>
        <a href="{{ url('laporan/bulanan/cbm') }}"
            class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
            <div
                class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                <div class="pointer-events-none">
                    <div
                        class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                            <defs>
                                <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                    <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                        style="
                    mask-image: radial-gradient(
                        180px at 278.5px 36px,
                        white,
                        transparent
                    );
                ">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                            <defs>
                                <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div
                        class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[1.22rem] opacity-70">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                        </svg>
                    </div>
                </div>
                <h2 class="card-title">Lprn bulanan cabang mingguan</h2>
            </div>
        </a>
        <a href="{{ url('laporan/bulanan/pbm') }}"
            class="card bg-base-100 dark:border-stone-400 dark:hover:border-white text-black dark:text-white border transition-all duration-300 hover:border-stone-300 group overflow-hidden grid grid-cols-2 w-full">
            <div
                class="relative bg-stone-50 dark:bg-base-100 group-hover:bg-gradient-to-r from-[#36b49f71] to-[#daff7571]">
                <div class="pointer-events-none">
                    <div
                        class="absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] dark:fill-white/[0.02] dark:stroke-white/5 fill-black/[0.02] stroke-black/5">
                            <defs>
                                <pattern id=":r2s:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2s:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                    <div class="absolute inset-0 rounded-2xl opacity-0 mix-blend-overlay transition duration-300 group-hover:opacity-100"
                        style="
                    mask-image: radial-gradient(
                        180px at 278.5px 36px,
                        white,
                        transparent
                    );
                ">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/50 stroke-black/70 dark:fill-white/50 dark:stroke-white/70">
                            <defs>
                                <pattern id=":r2t:" width="72" height="56" patternUnits="userSpaceOnUse"
                                    x="50%" y="-6">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:r2t:)"></rect>
                            <svg x="50%" y="-6" class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="-72" y="112"></rect>
                                <rect stroke-width="0" width="73" height="57" x="72" y="168"></rect>
                            </svg>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div
                        class="rounded-full border-stone-400 dark:bg-base-300 bg-base-200 w-8 h-8 flex items-center justify-center border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[1.22rem] opacity-70">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                        </svg>
                    </div>
                </div>
                <h2 class="card-title">Lprn kegiatan pdl mingguan</h2>
            </div>
        </a>

    </div>
@endsection
