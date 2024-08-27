@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class="flex justify-between items-center p-3 mt-10 mb-5 dark:text-white">
        <h1 class="text-xl">Table List Anggota</h1>
        <div class="flex gap-4">
            <button type="button" id="search-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
            <button type="button" id="more-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>

            </button>
        </div>
    </div>


    <div class="overflow-hidden h-0" id="input-search">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="flex gap-2 px-4 w-full">
                <div class="flex-row w-full">
                    <input
                        class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white"
                        name="nama" id="search" type="text" />
                </div>
                <div>
                    <details class="dropdown">
                        <summary class="inline-flex px-4 py-1 whitespace-nowrap rounded-2xl cursor-pointer">
                            Search By
                        </summary>
                        <ul class="menu dropdown-content bg-black text-white rounded-box z-[1] mt-2 w-full p-2 shadow">
                            <li>
                                <button type="button" class="text-white btn-searchby">
                                    Nama
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn-searchby text-stone-400">
                                    Ktp
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn-searchby text-stone-400">
                                    Kk
                                </button>
                            </li>
                        </ul>
                    </details>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-hidden h-0" id="more-option">
        <div class="flex flex-col gap-4 -mx-3 mb-6 h-2">
            <div class="grid gap-4 px-4 w-full sm:gap-2 sm:flex sm:flex-row">
                <div class="flex-row w-full">
                    <select name="" id="cabang"
                        class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">
                        <option value="cabang">Cabang</option>

                    </select>
                </div>
                <div class="flex-row w-full">
                    <select name="" id="pdl"
                        class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">
                        <option value="">Pdl</option>
                    </select>
                </div>
                <div class="flex-row w-full">
                    <button
                        class="block w-full bg-black text-white border  dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">Download</button>
                </div>

            </div>
            <div class="flex gap-2 px-4 w-full">
                <div class="flex flex-row gap-1 w-full">
                    <span>Tanggal Ditambahkan</span>
                    <input type="date" name="" id="tanggal_ditambahkan"
                        class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">
                </div>

            </div>

        </div>
    </div>


    <div style="overflow: auto"
        class="max-h-[70vh] p-10 w-full h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm">
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
            <tbody id="anggota-list-body-table" class="text-black/60 dark:text-stone-200">
            </tbody>
        </table>
    </div>

    <script>
        let data = null;
        let newdata = null;
        const search = document.getElementById("search");
        let listtablebodyanggota = document.getElementById(
            "anggota-list-body-table"
        );

        window.addEventListener("load", async () => {
            listtablebodyanggota.innerHTML = `
                            <tr class="border-b-0">
        <td colspan="11" class="h-[20rem]"><span class="text-black loading dark:text-white loading-bars loading-md"></span></td>
    </tr>

            `;
            let datafetch = await fetch("api/anggota/list/get");
            data = await datafetch.json();
            newdata = data;
            listtablebodyanggota.innerHTML = "";
            data.forEach((item, index) => {
                listtablebodyanggota.innerHTML += `
        <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>${item.ktp}</td>
            <td>${item.kk}</td>
            <td>${item.dropping && item.dropping.length}</td>
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
                <div tabindex="0" class="text-black cursor-pointer dark:text-white" >
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
                    }" class="hover:text-white">view</a></li>
                                                    <li><a href="/anggota/${
                                                        item.id
                                                    }/edit" class="hover:text-white">Edit</a></li>
                                                    <li><a href="/dropping/create/${
                                                        item.id
                                                    }" class="hover:text-white">Dropping</a></li>
                                                    <li><a href="/storting/create/${
                                                        item.id
                                                    }" class="hover:text-white">Storting</a></li>

                    <li><button class="hover:text-white">Delete</button></li>
                </form>                            </div>
                </td>                    </tr>
        `;
            });
        });


        const btnsearchby = document.querySelectorAll(".btn-searchby");
        let btnsaerchbyvalue = "Nama";

        btnsearchby.forEach((e) => {
            e.addEventListener("click", (e) => {
                btnsaerchbyvalue = e.target.textContent;

            });

        });

        document.getElementById('pdl').addEventListener('input', (e) => {
            cabang = document.getElementById('cabang').value;
            listtablebodyanggota.innerHTML = "";
            console.log(newdata);
            newdata.forEach((item, index) => {
                console.log(item.pdl.nama == e.target.value);
                if (item.pdl.nama == e.target.value) {
                    listtablebodyanggota.innerHTML += `
        <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>${item.ktp}</td>
            <td>${item.kk}</td>
            <td>${item.dropping && item.dropping.length}</td>
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
                <div tabindex="0" class="text-black cursor-pointer dark:text-white" >
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
                    }" class="hover:text-white">view</a></li>
                                                     <li><a href="/anggota/${
                                                        item.id
                                                    }/edit" class="hover:text-white">Edit</a></li>
                                                    <li><a href="/dropping/create/${
                                                        item.id
                                                    }" class="hover:text-white">Dropping</a></li>
                                                    <li><a hr\ef="/storting/create/${
                                                        item.id
                                                    }" class="hover:text-white">Storting</a></li>

                    <li><button class="hover:text-white">Delete</button></li>
                </form>                            </div>
                </td>                    </tr>
        `;
                } else if (e.target.value == 'pdl') {
                    if (item.pdl.cabang.nama == cabang) {
                        listtablebodyanggota.innerHTML += `
        <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>${item.ktp}</td>
            <td>${item.kk}</td>
            <td>${item.dropping && item.dropping.length}</td>
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
                <div tabindex="0" class="text-black cursor-pointer dark:text-white" >
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
                    }" class="hover:text-white">view</a></li>
                                                     <li><a href="/anggota/${
                                                        item.id
                                                    }/edit" class="hover:text-white">Edit</a></li>
                                                    <li><a href="/dropping/create/${
                                                        item.id
                                                    }" class="hover:text-white">Dropping</a></li>
                                                    <li><a hr\ef="/storting/create/${
                                                        item.id
                                                    }" class="hover:text-white">Storting</a></li>

                    <li><button class="hover:text-white">Delete</button></li>
                </form>                            </div>
                </td>                    </tr>
        `;
                    }
                }
            });

        });

        search.addEventListener("input", async (e) => {
            const searchdata = e.target.value.toLowerCase();
            document.getElementById('tanggal_ditambahkan').value = '';
            let datafetch = await fetch("api/cabang/list/get");
            document.getElementById('cabang').innerHTML = `
                                                                    <option value="cabang">cabang</option>

                                         `;

            document.getElementById('pdl').innerHTML = `
                                                                    <option value="pdl">pdl</option>

                                         `;

            filtereddata = await datafetch.json();

            console.log(filtereddata);
            filtereddata.forEach((item, index) => {
                document.getElementById('cabang').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;
            });

            console.log(btnsaerchbyvalue.trim());
            if (btnsaerchbyvalue.trim() == "Nama") {
                newdata = data.filter((item) =>
                    item.nama.toLowerCase().includes(searchdata)
                );
            } else if (btnsaerchbyvalue.trim() == "Kk") {
                newdata = data.filter((item) => {
                    // Pastikan item.kk bukan null atau undefined sebelum memanggil toString()
                    if (item.kk != null) {
                        return item.kk.toString().toLowerCase().includes(searchdata.toLowerCase());
                    }
                });

            } else if (btnsaerchbyvalue.trim() == "Ktp") {
                newdata = data.filter((item) => {
                    if (item.ktp != null) {
                        return item.ktp.toString().toLowerCase().includes(searchdata.toLowerCase());
                    }
                });
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
            <td>${item.dropping && item.dropping.length}</td>
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
                <div tabindex="0" class="text-black cursor-pointer dark:text-white" >
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
                    }" class="hover:text-white">view</a></li>
                                                    <li><a href="/anggota/${
                                                        item.id
                                                    }/edit" class="hover:text-white">Edit</a></li>
                                                    <li><a href="/dropping/create/${
                                                        item.id
                                                    }" class="hover:text-white">Dropping</a></li>
                                                    <li><a hr\ef="/storting/create/${
                                                        item.id
                                                    }" class="hover:text-white">Storting</a></li>

                    <li><button class="hover:text-white">Delete</button></li>
                </form>                            </div>
                </td>                    </tr>
        `;
            });
        });


        document.getElementById('search-toggle').addEventListener('click', async () => {
            await document.getElementById('input-search').classList.toggle('h-12');
            document.getElementById('input-search').classList.toggle('overflow-hidden');

        });
        window.addEventListener('resize', function(event) {
            let screenWidth = window.innerWidth;


            if (screenWidth <= 640 && document.getElementById('more-option').classList.contains('h-[7.5rem]')) {
                document.getElementById('more-option').classList.add('!h-[14rem]');

            } else if (screenWidth >= 640 && document.getElementById('more-option').classList.contains(
                    'h-[7.5rem]')) {
                document.getElementById('more-option').classList.remove('!h-[14rem]');

            }
        });

        document.getElementById('more-toggle').addEventListener('click', async () => {
            let screenWidth = window.innerWidth;


            await document.getElementById('more-option').classList.toggle('h-[7.5rem]');
            await document.getElementById('more-option').classList.toggle('h-0');
            if (screenWidth <= 640) {
                document.getElementById('more-option').classList.toggle('!h-[14rem]');
                document.getElementById('more-option').classList.toggle('h-0');

            }

            document.querySelectorAll('.more-option-item').forEach((item) => {
                item.target.classList.toggle('overflow-hidden')
            });
        });

        window.addEventListener("load", async () => {

            let datafetch = await fetch("api/cabang/list/get");
            filtereddata = await datafetch.json();

            console.log(filtereddata);
            filtereddata.forEach((item, index) => {
                document.getElementById('cabang').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;
            });
        });
        document.getElementById('cabang').addEventListener("input", async (e) => {

            let datafetch = await fetch("api/pdl/list/get");
            filtereddata = await datafetch.json();
            document.getElementById('pdl').innerHTML = `
            <option value="pdl">pdl</option>

             `;
            filtereddata.forEach((item, index) => {
                if (item.cabang.nama == e.target.value) {
                    document.getElementById('pdl').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;

                }

                listtablebodyanggota.innerHTML = "";
                console.log(newdata);
                newdata.forEach((item, index) => {
                    console.log(item.pdl.cabang.nama == e.target.value);
                    if (item.pdl.cabang.nama == e.target.value) {
                        listtablebodyanggota.innerHTML += `
        <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>${item.ktp}</td>
            <td>${item.kk}</td>
            <td>${item.dropping && item.dropping.length}</td>
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
                <div tabindex="0" class="text-black cursor-pointer dark:text-white" >
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
                    }" class="hover:text-white">view</a></li>
                                                     <li><a href="/anggota/${
                                                        item.id
                                                    }/edit" class="hover:text-white">Edit</a></li>
                                                    <li><a href="/dropping/create/${
                                                        item.id
                                                    }" class="hover:text-white">Dropping</a></li>
                                                    <li><a hr\ef="/storting/create/${
                                                        item.id
                                                    }" class="hover:text-white">Storting</a></li>

                    <li><button class="hover:text-white">Delete</button></li>
                </form>                            </div>
                </td>                    </tr>
        `;
                    } else if (e.target.value == 'cabang') {
                        listtablebodyanggota.innerHTML += `
        <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>${item.ktp}</td>
            <td>${item.kk}</td>
            <td>${item.dropping && item.dropping.length}</td>
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
                <div tabindex="0" class="text-black cursor-pointer dark:text-white" >
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
                    }" class="hover:text-white">view</a></li>
                                                     <li><a href="/anggota/${
                                                        item.id
                                                    }/edit" class="hover:text-white">Edit</a></li>
                                                    <li><a href="/dropping/create/${
                                                        item.id
                                                    }" class="hover:text-white">Dropping</a></li>
                                                    <li><a hr\ef="/storting/create/${
                                                        item.id
                                                    }" class="hover:text-white">Storting</a></li>

                    <li><button class="hover:text-white">Delete</button></li>
                </form>                            </div>
                </td>                    </tr>
        `;
                    }
                });

            });
        });
        document.getElementById('tanggal_ditambahkan').addEventListener("input", async (e) => {
            document.getElementById('search').value = '';
            document.getElementById('cabang').innerHTML = `
                                                                    <option value="cabang">cabang</option>

                                         `;
            let datafetch = await fetch("api/cabang/list/get");
            filtereddata = await datafetch.json();

            console.log(filtereddata);
            filtereddata.forEach((item, index) => {
                document.getElementById('cabang').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;
            });

            document.getElementById('pdl').innerHTML = `
                                                                    <option value="pdl">pdl</option>

                                         `;

            newdata = data.filter((item) =>
                item.created_at.toLowerCase().includes(e.target.value)
            );


            listtablebodyanggota.innerHTML = "";
            console.log(tanggal_ditambahkan);
            newdata.forEach((item, index) => {
                listtablebodyanggota.innerHTML += `
        <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>${item.ktp}</td>
            <td>${item.kk}</td>
            <td>${item.dropping && item.dropping.length}</td>
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
                <div tabindex="0" class="text-black cursor-pointer dark:text-white" >
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
                    }" class="hover:text-white">view</a></li>
                                                     <li><a href="/anggota/${
                                                        item.id
                                                    }/edit" class="hover:text-white">Edit</a></li>
                                                    <li><a href="/dropping/create/${
                                                        item.id
                                                    }" class="hover:text-white">Dropping</a></li>
                                                    <li><a hr\ef="/storting/create/${
                                                        item.id
                                                    }" class="hover:text-white">Storting</a></li>

                    <li><button class="hover:text-white">Delete</button></li>
                </form>                            </div>
                </td>                    </tr>
        `;
            });

        });
    </script>

@endsection
