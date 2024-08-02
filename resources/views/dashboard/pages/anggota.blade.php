@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    <div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
        <h1 class="text-xl">Table List Anggota</h1>
        <div class="flex gap-4">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
            </a>
        </div>
    </div>

    <div class="p-10 w-full h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm">
        <table class="table text-center align-middle">
            <thead class="text-sm dark:text-white">
                <tr class="dark:border-stone-400">
                    <th class="font-medium text-black dark:text-white text-sm">No</th>
                    <th class="font-medium text-black dark:text-white text-sm">Name</th>
                    <th class="font-medium text-black dark:text-white text-sm">No ktp</th>
                    <th class="font-medium text-black dark:text-white text-sm">No kk</th>
                    <th class="font-medium text-black dark:text-white text-sm">Cabang</th>
                    <th class="font-medium text-black dark:text-white text-sm">Action</th>
                </tr>
            </thead>
            <tbody id="anggota-list-body-table" class="text-black/60 dark:text-stone-200">
                <script>
                    window.addEventListener("load", async () => {
                        let datafetch = await fetch("{{ route('anggotaget') }}");
                        let data = await datafetch.json();
                        let listtablebodyanggota = document.getElementById(
                            "anggota-list-body-table"
                        );
                        data.forEach((item, index) => {
                            listtablebodyanggota.innerHTML += `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                        <td>${index + 1}</td>
                        <td>${item.nama}</td>
                        <td>${item.ktp}</td>
                        <td>${item.kk}</td>
                        <td>${item.cabang_id}</td>
<td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-24 mt-2 border bg-base-300 dark:border-stone-400 p-2 shadow">
                                <li><a>Edit</a></li>
                                <li><a>Delete</a></li>
                            </ul>
                            </div>
                            </td>                    </tr> 
                    `;
                        });
                    });
                </script>
            </tbody>
        </table>
    </div>
@endsection
