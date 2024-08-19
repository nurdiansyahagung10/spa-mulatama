@extends('dashboard.main') @section('dashboardheader') @include('layout.nav')
@endsection @section('dashboardpage') @include('layout.notiferror')
@include('layout.notifsuccess')
<div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
    <h1 class="text-xl">Table List Anggota</h1>
    <div class="flex gap-4">
        <button type="button" id="search-toggle">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-5"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                />
            </svg>
        </button>
        <button type="button" id="filter-toggle">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-5"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"
                />
            </svg>
        </button>
    </div>
</div>

<div class="h-0  overflow-hidden" id="input-search">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full gap-2 flex px-4">
            <div class="w-full flex-row">
                <input
                    class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white"
                    name="nama"
                    id="search"
                    type="text"
                />
            </div>
            <div>
                <details class="dropdown">
                    <summary
                        class="py-1 px-4 rounded-2xl inline-flex cursor-pointer whitespace-nowrap"
                    >
                        Search By
                    </summary>
                    <ul
                        class="menu dropdown-content bg-black text-white rounded-box z-[1] mt-2 w-full p-2 shadow"
                    >
                        <li>
                            <button
                                type="button"
                                class="btn-searchby text-white"
                            >
                                Nama
                            </button>
                        </li>
                        <li>
                            <button
                                type="button"
                                class="btn-searchby text-stone-400"
                            >
                                Ktp
                            </button>
                        </li>
                        <li>
                            <button
                                type="button"
                                class="btn-searchby text-stone-400"
                            >
                                Kk
                            </button>
                        </li>
                    </ul>
                </details>
            </div>
        </div>
    </div>
</div>

<div
    style="overflow: auto"
    class="p-10 w-full h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm"
>
    <table class="table text-center align-middle">
        <thead class="text-sm dark:text-white">
            <tr class="dark:border-stone-400">
                <th class="font-medium text-black dark:text-white">No</th>
                <th class="font-medium text-black dark:text-white">Nama</th>
                <th class="font-medium text-black dark:text-white">No ktp</th>
                <th class="font-medium text-black dark:text-white">No kk</th>
                <th class="font-medium text-black dark:text-white">Dropping</th>
                <th class="font-medium text-black dark:text-white">Storting</th>
                <th class="font-medium text-black dark:text-white">Jenis</th>
                <th class="font-medium text-black dark:text-white">Pdl</th>
                <th class="font-medium text-black dark:text-white">Cabang</th>
                <th class="font-medium text-black dark:text-white">
                    Tanggal ditambahkan
                </th>
                <th class="font-medium text-black dark:text-white">Action</th>
            </tr>
        </thead>
        <tbody
            id="anggota-list-body-table"
            class="text-black/60 dark:text-stone-200"
        >
            <script>
                let data = null;
                const search = document.getElementById("search");
                let listtablebodyanggota = document.getElementById(
                    "anggota-list-body-table"
                );

                window.addEventListener("load", async () => {
                    listtablebodyanggota.innerHTML = `
                                        <tr class="border-b-0">
                    <td colspan="11" class="h-[20rem]"><span class="loading dark:text-white loading-bars text-black loading-md"></span></td>
                </tr>

                        `;
                    let datafetch = await fetch("/anggota/list/get");
                    data = await datafetch.json();
                    listtablebodyanggota.innerHTML = "";
                    data.forEach((item, index) => {
                        listtablebodyanggota.innerHTML += `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                        <td>${index + 1}</td>
                        <td>${item.nama}</td>
                        <td>${item.ktp}</td>
                        <td>${item.kk}</td>
                        <td>${item.dropping && Object.keys(item.dropping).length}</td>
                        <td>${item.storting && item.storting.length}</td>
                        <td>${item.jenis_anggota}</td>
                        <td>${item.pdl.nama}</td>
                        <td>${item.pdl.cabang.nama}</td>
                        <td>${
                            new Date(item.created_at)
                                .toISOString()
                                .split("T")[0]
                        }</td>
<td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                            <form method="post" action="/anggota/${
                                item.id
                            }" tabindex="0" class="dropdown-content menu rounded-box z-[1] w-24 mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0  dark:border-stone-400 p-2 shadow">
                                @method('delete')   
                                @csrf
                                <li><a href="/anggota/${
                                    item.id
                                }" class="hover:text-white ">view</a></li>
                                                                <li><a href="/anggota/${
                                                                    item.id
                                                                }/edit" class="hover:text-white ">Edit</a></li>
                                                                <li><a href="/dropping/create/${
                                                                    item.id
                                                                }" class="hover:text-white ">Dropping</a></li>
                                                                <li><a href="/storting/create/${
                                                                    item.id
                                                                }" class="hover:text-white ">Storting</a></li>

                                <li><button class="hover:text-white ">Delete</button></li>
                            </form>                            </div>
                            </td>                    </tr> 
                    `;
                    });
                });
                let newdata = null;

                const btnsearchby = document.querySelectorAll(".btn-searchby");
                let btnsaerchbyvalue = "Nama";

                btnsearchby.forEach((e) => {
                    e.addEventListener("click", (e) => {
                        btnsaerchbyvalue = e.target.textContent;
                        
                    });
              
                });

                search.addEventListener("input", (e) => {
                    const searchdata = e.target.value.toLowerCase();

                    console.log(btnsaerchbyvalue.trim());
                    if (btnsaerchbyvalue.trim() == "Nama") {
                        newdata = data.filter((item) =>
                            item.nama.toLowerCase().includes(searchdata)
                        );
                    } else if (btnsaerchbyvalue.trim() == "Kk") {
                        newdata = data.filter((item) =>
                            item.kk.toString().toLowerCase().includes(searchdata)
                        );
                    } else if (btnsaerchbyvalue.trim() == "Ktp") {
                        newdata = data.filter((item) =>
                            item.ktp.toString().toLowerCase().includes(searchdata)
                        );
                    }

                    btnsearchby.forEach((e) => {
                        if (btnsaerchbyvalue == e.textContent) {
                            e.classList.add("text-white");
                        } else {
                            e.classList.remove("text-white");
                            e.classList.add("text-stone-400");
                        }
                    });
                    listtablebodyanggota.innerHTML = "";
                    console.log(newdata);
                    newdata.forEach((item, index) => {
                        listtablebodyanggota.innerHTML += `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                        <td>${index + 1}</td>
                        <td>${item.nama}</td>
                        <td>${item.ktp}</td>
                        <td>${item.kk}</td>
                        <td>${item.dropping.length}</td>
                        <td>${item.storting.length}</td>
                        <td>${item.jenis_anggota}</td>
                        <td>${item.pdl.nama}</td>
                        <td>${item.pdl.cabang.nama}</td>
                        <td>${
                            new Date(item.created_at)
                                .toISOString()
                                .split("T")[0]
                        }</td>
<td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                            <form method="post" action="/anggota/${
                                item.id
                            }" tabindex="0" class="dropdown-content menu rounded-box z-[1] w-24 mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0  dark:border-stone-400 p-2 shadow">
                                @method('delete')   
                                @csrf
                                <li><a href="/anggota/${
                                    item.id
                                }" class="hover:text-white ">view</a></li>
                                                                <li><a href="/anggota/${
                                                                    item.id
                                                                }/edit" class="hover:text-white ">Edit</a></li>
                                                                <li><a href="/dropping/create/${
                                                                    item.id
                                                                }" class="hover:text-white ">Dropping</a></li>
                                                                <li><a hr\ef="/storting/create/${
                                                                    item.id
                                                                }" class="hover:text-white ">Storting</a></li>

                                <li><button class="hover:text-white ">Delete</button></li>
                            </form>                            </div>
                            </td>                    </tr> 
                    `;
                    });
                });


                document.getElementById('search-toggle').addEventListener('click', async () => {
                    await document.getElementById('input-search').classList.toggle('h-14');
                    document.getElementById('input-search').classList.toggle('overflow-hidden');
                
                });
            </script>
        </tbody>
    </table>
</div>
@endsection
