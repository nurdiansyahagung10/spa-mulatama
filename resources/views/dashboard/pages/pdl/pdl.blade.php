@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class="flex p-3 dark:text-white mt-10 mb-5 justify-between items-center">
        <h1 class="text-xl w-10/12">Table List dropping</h1>
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

    <form method="POST" action="/export-storting">
        @csrf
        <div class="overflow-hidden h-0" id="input-search">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="flex gap-2 px-4 w-full">
                    <div class="flex-row w-full">
                        <input
                            class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white"
                            name="search" id="search" type="text" />
                    </div>

                </div>
            </div>
        </div>

        <div class="overflow-hidden h-0" id="more-option">
            <div class="flex flex-col gap-4 -mx-3 mb-6 h-2">
                <div class="grid gap-4 px-4 w-full sm:gap-2 sm:flex sm:flex-row">
                    <div class="flex-row w-full">
                        <select name="cabang" id="cabang"
                            class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">
                            <option value="cabang">Cabang</option>

                        </select>
                    </div>
                    <div class="flex-row w-full">
                        <button id="button-submit" type="submit"
                            class="block w-full bg-black text-white border  dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">Download</button>
                    </div>

                </div>
                <div class="flex gap-2 px-4 w-full">
                    <div class="flex flex-row gap-1 w-full">
                        <span>Tanggal Ditambahkan</span>
                        <input type="date" name="tanggal" id="date_created"
                            class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">
                    </div>

                </div>

            </div>
        </div>
    </form>



    <div style="overflow: auto"
        class="max-h-[70vh] p-10 w-full h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm">
        <table class="table  text-center align-middle">
            <thead class="text-sm dark:text-white">

                <tr class="dark:border-stone-400">
                    <th class="font-medium text-black dark:text-white">
                        No
                    </th>
                    <th class="font-medium text-black dark:text-white">
                        Nama pdl
                    </th>
                    <th class="font-medium text-black dark:text-white">
                        cabang
                    </th>
                    <th class="font-medium text-black dark:text-white">
                        tanggal ditambahkan
                    </th>
                    @if ($getusername == 'admin')
                        <th class="font-medium text-black dark:text-white">
                            Action
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody id="list-body-table" class="text-black/60 dark:text-stone-200">
            </tbody>
        </table>
    </div>

    <script>
        let initialmain = null;
        let initialcabang = null;
        let initialpdl = null;
        let newdata = null;
        let globalfiltered = null;
        let datacabang = null;
        let datapdl = null;
        let defaultsearchvalue = "Nama";
        const btnsearchby = document.querySelectorAll(".btn-searchby");
        const search = document.getElementById("search");
        const divsearch = document.getElementById("input-search");
        const searchtoggle = document.getElementById('search-toggle');
        const moretoggle = document.getElementById('more-toggle');
        const moreoptionitem = document.querySelectorAll('.more-option-item');
        const selectcabang = document.getElementById('cabang');
        const moreoption = document.getElementById('more-option');
        const selectpdl = document.getElementById('pdl');
        const selectdate = document.getElementById('date_created');
        const listtablebodystorting = document.getElementById(
            "list-body-table"
        );


        class main {
            constructor() {
                this.accesstoken = "{{ session('access_token') }}";
            }

            getusername() {
                return '{{ $getusername }}';
            }

            admincek() {
                return this.getusername() === 'admin' ? true : false;
            }

            getusercabang() {
                return '{{ $cabang }}';
            }

            load(colspan) {
                return `
      <tr class="border-b-0">
          <td colspan="${colspan}" class="h-[20rem]"><span class="text-black loading dark:text-white loading-bars loading-md"></span></td>
      </tr>`;
            }


            refreshToken() {

                fetch('/api/refresh', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `bearer ${this.accesstoken}`,

                    },
                });

            }

            innerdatatable(index, item) {
                return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                        <td>${index + 1}</td>
                        <td>${item.nama}</td>
                        <td>${item.cabang.nama}</td>
                        <td>${new Date(item.created_at)
                    .toISOString()
                    .split("T")[0]}</td>
                        ${this.admincek() == false ? `` : `<td>
                                        <div class="dropdown">
            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg></div>
            <form method="post" action="/pdl/${item.id}" tabindex="0" class="dropdown-content menu rounded-box z-[1] w-24 mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0  dark:border-stone-400 p-2 shadow">
                @method('delete')
                @csrf
                <li><a href="/pdl/${item.id}/edit" class="hover:text-white ">Edit</a></li>
                <li><button class="hover:text-white ">Delete</button></li>
            </form>                            </div>
            </td>` }
                    </tr>
                    `;
            }

            loaddatatable(data) {
                return data.map((item, index) => {
                    return this.innerdatatable(index, item);
                }).join('');
            }


        }


        class pdl extends main {

            pdlfetch() {
                return fetch("/api/pdl/list/get", {
                    'method': 'GET',
                    'headers': {
                        'Accept': 'application/json',
                        'Authorization': `bearer ${this.accesstoken}`,
                    },
                }).then(async (response) => {
                        return response;
                });
            }

        }

        class cabang extends pdl {
            cabangfetch() {
                return fetch("/api/cabang/list/get", {
                    'method': 'GET',
                    'headers': {
                        'Accept': 'application/json',
                        'Authorization': `bearer ${this.accesstoken}`,
                    },
                }).then(response => {
                    return response
                })
            }
        }






        window.addEventListener("load", async () => {
            initialmain = new main;
            initialcabang = new cabang;
            initialpdl = new pdl;
            listtablebodystorting.innerHTML = initialmain.load(11);
            let datafetchcabang = await initialcabang.cabangfetch();
            datacabang = await datafetchcabang.json();
            let datafetchpdl = await initialpdl.pdlfetch();
            datapdl = await datafetchpdl.json();

            if (initialmain.admincek() === false) {
                newdata = datapdl.filter(item => item.cabang.nama === initialmain.getusercabang());
                globalfiltered = datapdl.filter(item => item.cabang.nama === initialmain.getusercabang());
                datacabang.forEach((item, index) => {
                    selectcabang.innerHTML = `
                 <option value="${initialmain.getusercabang()}">${initialmain.getusercabang()}</option>
                 `;
                });
                selectcabang.classList.add('pointer-events-none');
                selectcabang.classList.add('bg-gray-200');
                selectcabang.classList.remove('bg-transparent');
            } else {
                newdata = datapdl;
                globalfiltered = datapdl;

                datacabang.forEach((item, index) => {
                    selectcabang.innerHTML += `
                 <option value="${item.nama}">${item.nama}</option>
                 `;
                });

            }

            listtablebodystorting.innerHTML = "";
            listtablebodystorting.innerHTML = initialmain.loaddatatable(newdata);


        });



        search.addEventListener("input", async (e) => {
            listtablebodystorting.innerHTML = initialmain.load(11);

            let searchdata = e.target.value.toLowerCase();
            selectdate.value = '';


            switch (defaultsearchvalue.trim()) {
                case "Nama":
                    globalfiltered = newdata.filter((item) =>
                        item.nama.toLowerCase().includes(searchdata)
                    );

                    break;
            }


            if (initialmain.admincek() !== false) {
                selectcabang.innerHTML = `
          <option value="cabang">cabang</option>
      `;

                datacabang.forEach((item, index) => {
                    selectcabang.innerHTML += `
         <option value="${item.nama}">${item.nama}</option>
         `;

                });

            }
            listtablebodystorting.innerHTML = "";
            listtablebodystorting.innerHTML = initialmain
                .loaddatatable(globalfiltered);

        });


        searchtoggle.addEventListener('click', async () => {
            await divsearch.classList.toggle('h-12');
            divsearch.classList.toggle('overflow-hidden');

        });

        window.addEventListener('resize', function(event) {
            let screenWidth = window.innerWidth;


            if (screenWidth <= 640 && moreoption.classList.contains(
                    'h-[7.5rem]')) {
                moreoption.classList.add('!h-[14rem]');

            } else if (screenWidth >= 640 && moreoption.classList
                .contains(
                    'h-[7.5rem]')) {
                moreoption.classList.remove('!h-[14rem]');

            }
        });

        moretoggle.addEventListener('click', async () => {
            let screenWidth = window.innerWidth;
            await moreoption.classList.toggle('h-[7.5rem]');
            if (screenWidth <= 640) {
                moreoption.classList.toggle('!h-[14rem]');
            }

            moreoptionitem.forEach((item) => {
                item.target.classList.toggle('overflow-hidden')
            });
        });


        selectcabang.addEventListener("input", async (e) => {
            listtablebodystorting.innerHTML = initialmain.load(11);


            let filtereddata = null;

            if (e.target.value == 'cabang') {
                filtereddata = globalfiltered;
            } else {
                filtereddata = globalfiltered.filter(item => item.cabang
                    .nama === e.target.value);
            }

            listtablebodystorting.innerHTML = "";
            listtablebodystorting.innerHTML = initialmain.loaddatatable(filtereddata);


        });

        selectdate.addEventListener("input", async (e) => {
            listtablebodystorting.innerHTML = initialmain.load(11);

            search.value = '';
            listtablebodystorting.innerHTML = initialmain.load(11)
            globalfiltered = newdata.filter((item) =>
                item.created_at.toLowerCase().includes(e.target.value)
            );

            if (initialmain.admincek() !== false) {
                selectcabang.innerHTML = `<option value="cabang">cabang</option>`;
                datacabang.forEach((item, index) => {
                    selectcabang.innerHTML += `
         <option value="${item.nama}">${item.nama}</option>
         `;
                });
            }

            listtablebodystorting.innerHTML = "";
            listtablebodystorting.innerHTML = initialmain.loaddatatable(globalfiltered);
        });
    </script>
@endsection
