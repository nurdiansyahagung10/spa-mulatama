@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class="flex justify-between items-center p-3 mt-10 mb-5 dark:text-white">
        <h1 class="text-xl w-10/12" id="title">Table Lprn kegiatan Pdl Cabang mingguan</h1>
        <div class="flex gap-4">
            <button type="button" id="more-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>
            </button>
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
                        class="block w-full  bg-black text-white border  dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">Download</button>
                </div>

            </div>
            <div class="flex gap-2 px-4 w-full">
                <div class="flex flex-row gap-1 w-full">
                    <span>Tanggal Ditambahkan</span>
                    <input type="month" name="" id="date_created"
                        class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white"
                        value="{{ date('Y-m') }}" />
                </div>
            </div>
        </div>
    </div>

    <div style="overflow: auto"
        class="max-h-[70vh] p-10 w-full h-auto mb-10 border-b-0 rounded-t-2xl min-h-[70vh] border backdrop-blur-sm">
        <table class="table text-center align-middle">
            <thead class="text-sm dark:text-white">
                <tr class="dark:border-stone-400">
                    <th class="font-medium  text-black dark:text-white">
                        Pdl
                    </th>
                    <th class="font-medium text-black dark:text-white">
                        Cabang
                    </th>
                    <th class="font-medium text-black dark:text-white">
                        Tanggal
                    </th>
                    <th class="font-medium text-black dark:text-white">
                        Jenis
                    </th>
                    <th class="font-medium text-black dark:text-white">
                        keterangan
                    </th>
                    <th class="font-medium text-black dark:text-white">
                        catatan
                    </th>
                </tr>
            </thead>
            <tbody id="list-body-table" class="text-black/60 dark:text-stone-200"></tbody>
        </table>
{{--
        <script>
            const currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth();
            let cabangvalue = null;
            let firstDayOfMonth = new Date(currentYear, currentMonth, 1);
            let lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);

            let flowdata = [];

            let liburdate = [];


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
                if (screenWidth <= 640) {
                    document.getElementById('more-option').classList.toggle('!h-[14rem]');

                }

                document.querySelectorAll('.more-option-item').forEach((item) => {
                    item.target.classList.toggle('overflow-hidden')
                });
            });

            window.addEventListener("load", async () => {

                let datafetch = await fetch("/api/cabang/list/get");
                filtereddata = await datafetch.json();

                filtereddata.forEach((item, index) => {
                    document.getElementById('cabang').innerHTML += `
   <option value="${item.nama}">${item.nama}</option>
   `;
                });
            });

            async function getliburdate() {
                let response = await fetch(
                    "https://raw.githubusercontent.com/guangrei/APIHariLibur_V2/main/holidays.json"
                );
                let data = await response.json();
                liburdate = Object.keys(data).filter((date) => date !== "info");
            }





            document.getElementById('pdl').addEventListener("input", async (e) => {



                document.getElementById("laporan-list-body-table").innerHTML = ``;

                if (e.target.value == 'pdl') {
                    getliburdate().then(async () => {
                        populateDateGroups(firstDayOfMonth, lastDayOfMonth);
                        document.getElementById("laporan-list-body-table").innerHTML = load(
                            15);

                        let anggotadata = await safeFetch("/api/anggota/list/get");
                        let stortingdata = await safeFetch("/api/storting/list/get");
                        let droppingdata = await safeFetch("/api/dropping/list/get");
                        document.getElementById("laporan-list-body-table").innerHTML = '';

                        let anggotadatabycabang = anggotadata.filter((item) => item.pdl
                            .cabang.nama ===
                            cabangvalue);
                        let droppingbycabang = droppingdata.filter((item) => item.anggota
                            .pdl.cabang
                            .nama === cabangvalue);
                        let stortingdatabycabang = stortingdata.filter((item) => item
                            .dropping.anggota
                            .pdl.cabang.nama === cabangvalue);


                        flowdata.forEach((date, index) => {
                            calculateAndRenderRow(
                                date,
                                anggotadatabycabang,
                                stortingdatabycabang,
                                droppingbycabang,
                                index
                            );
                        });

                    });


                } else {
                    getliburdate().then(async () => {
                        populateDateGroups(firstDayOfMonth, lastDayOfMonth);
                        document.getElementById("laporan-list-body-table").innerHTML = load(
                            15);

                        let anggotadata = await safeFetch("/api/anggota/list/get");
                        let stortingdata = await safeFetch("/api/storting/list/get");
                        let droppingdata = await safeFetch("/api/dropping/list/get");
                        document.getElementById("laporan-list-body-table").innerHTML = '';

                        let anggotadatabycabang = anggotadata.filter((item) => item.pdl
                            .nama ===
                            e.target.value);
                        let droppingbycabang = droppingdata.filter((item) => item.anggota
                            .pdl.nama === e.target.value);
                        let stortingdatabycabang = stortingdata.filter((item) => item
                            .dropping.anggota
                            .pdl.nama === e.target.value);


                        flowdata.forEach((date, index) => {
                            calculateAndRenderRow(
                                date,
                                anggotadatabycabang,
                                stortingdatabycabang,
                                droppingbycabang,
                                index
                            );
                        });

                    });

                }

            });




            document.getElementById('cabang').addEventListener("input", async (e) => {
                cabangvalue = e.target.value;
                let pdldata = await safeFetch("/api/pdl/list/get");
                pdl.innerHTML = `
<option value="pdl">pdl</option>
`;
                pdldata.forEach((item, index) => {
                    if (item.cabang.nama == e.target.value) {
                        pdl.innerHTML += `
        <option value="${item.nama}">${item.nama}</option>
        `;

                    }
                });

                document.getElementById("laporan-list-body-table").innerHTML = ``;
                if (cabangvalue == 'cabang') {
                    document.getElementById("title").innerHTML = `Table Lprn kegiatan pdl Cabang mingguan`;

                } else {
                    document.getElementById("title").innerHTML = `Table Lprn kegiatan pdl Cabang ` + cabangvalue;
                }

                if (cabangvalue == 'cabang') {
                    document.getElementById("title").innerHTML = `Table Lprn kegiatan pdl Cabang mingguan`;
                    getliburdate().then(async () => {
                        populateDateGroups(firstDayOfMonth, lastDayOfMonth);
                        document.getElementById("laporan-list-body-table").innerHTML = load(15);


                        let anggotadata = await safeFetch("/api/anggota/list/get");
                        let stortingdata = await safeFetch("/api/storting/list/get");
                        let droppingdata = await safeFetch("/api/dropping/list/get");
                        document.getElementById("laporan-list-body-table").innerHTML = '';

                        flowdata.forEach((date, index) => {
                            calculateAndRenderRow(
                                date,
                                anggotadata,
                                stortingdata,
                                droppingdata,
                                index
                            );
                        });
                    });

                } else {
                    getliburdate().then(async () => {
                        populateDateGroups(firstDayOfMonth, lastDayOfMonth);
                        document.getElementById("laporan-list-body-table").innerHTML = load(15);


                        let anggotadata = await safeFetch("/api/anggota/list/get");
                        let stortingdata = await safeFetch("/api/storting/list/get");
                        let droppingdata = await safeFetch("/api/dropping/list/get");
                        document.getElementById("laporan-list-body-table").innerHTML = '';

                        let anggotadatabycabang = anggotadata.filter((item) => item.pdl.cabang.nama ===
                            cabangvalue);
                        let droppingbycabang = droppingdata.filter((item) => item.anggota.pdl.cabang
                            .nama === cabangvalue);
                        let stortingdatabycabang = stortingdata.filter((item) => item.dropping.anggota
                            .pdl.cabang.nama === cabangvalue);

                        flowdata.forEach((date, index) => {
                            calculateAndRenderRow(
                                date,
                                anggotadatabycabang,
                                stortingdatabycabang,
                                droppingbycabang,
                                index
                            );
                        });
                    });


                }

            });

            document.getElementById('tanggal_ditambahkan').addEventListener("input", async (e) => {
                document.getElementById('cabang').innerHTML = `
                                                                    <option value="cabang">cabang</option>

                                         `;
                document.getElementById('pdl').innerHTML = `
                                                                    <option value="pdl">pdl</option>

                                         `;

                document.getElementById("title").innerHTML = `Table Lprn kegiatan pdl Cabang mingguan`;

                let datafetch = await fetch("/api/cabang/list/get");
                filtereddata = await datafetch.json();

                filtereddata.forEach((item, index) => {
                    document.getElementById('cabang').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;
                });

                document.getElementById("laporan-list-body-table").innerHTML = ``;
                let edate = new Date(e.target.value);
                currentYear = edate.getFullYear();
                currentMonth = edate.getMonth();

                firstDayOfMonth = new Date(currentYear, currentMonth, 1);
                lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);

                flowdata = [];

                getliburdate().then(async () => {
                    populateDateGroups(firstDayOfMonth, lastDayOfMonth);
                    document.getElementById("laporan-list-body-table").innerHTML = load(15);


                    let anggotadata = await safeFetch("/api/anggota/list/get");
                    let stortingdata = await safeFetch("/api/storting/list/get");
                    let droppingdata = await safeFetch("/api/dropping/list/get");
                    document.getElementById("laporan-list-body-table").innerHTML = '';

                    flowdata.forEach((date, index) => {
                        calculateAndRenderRow(
                            date,
                            anggotadata,
                            stortingdata,
                            droppingdata,
                            index
                        );
                    });
                });
            });

            function load(colspan) {
                return `
            <tr class="border-b-0">
                <td colspan="${colspan}" class="h-[20rem]"><span class="text-black loading dark:text-white loading-bars loading-md"></span></td>
            </tr>`;

            }





            getliburdate().then(async () => {
                populateDateGroups(firstDayOfMonth, lastDayOfMonth);
                document.getElementById("laporan-list-body-table").innerHTML = load(15);


                let anggotadata = await safeFetch("/api/anggota/list/get");
                let stortingdata = await safeFetch("/api/storting/list/get");
                let droppingdata = await safeFetch("/api/dropping/list/get");
                document.getElementById("laporan-list-body-table").innerHTML = '';


            });
        </script> --}}
    </div>


    <script>
        let nowdate = new Date();
        let newdata = {
            newdataanggota: null,
            newdatastorting: null,
            newdatadropping: null,
        };
        let globalfiltereddata = {
            globalfiltereddataanggota: null,
            globalfiltereddatastorting: null,
            globalfiltereddatadropping: null,
        };
        let datacabang = null;
        let datapdl = null;
        const moretoggle = document.getElementById('more-toggle');
        const moreoptionitem = document.querySelectorAll('.more-option-item');
        const selectcabang = document.getElementById('cabang');
        const moreoption = document.getElementById('more-option');
        const selectpdl = document.getElementById('pdl');
        const title = document.getElementById("title");
        const selectdate = document.getElementById('date_created');
        const listtablebody = document.getElementById(
            "list-body-table"
        );


        class main {
            constructor(date) {
                this.accesstoken = "{{ session('access_token') }}";
                let currentDate = new Date(date);
                const currentYear = currentDate.getFullYear();
                const currentMonth = currentDate.getMonth();
                this.firstDayOfMonth = new Date(currentYear, currentMonth, 1);
                this.lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);
                this.datedata = [];
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

            async getliburdate() {
                let response = await fetch(
                    "https://raw.githubusercontent.com/guangrei/APIHariLibur_V2/main/holidays.json"
                );
                let data = await response.json();
                return Object.keys(data).filter((date) => date !== "info");
            }

            async populateDateGroups(fdayofmonth, ldayofmonth) {
                const liburdate = await this.getliburdate();
                for (
                    let day = fdayofmonth; day <= ldayofmonth; day.setDate(day.getDate() + 1)
                ) {
                    const dayOfWeek = day.getDay();
                    const formattedDate = day.toISOString().split("T")[0];

                    if (
                        dayOfWeek !== 0 &&
                        dayOfWeek !== 6 &&
                        !liburdate.includes(formattedDate)
                    ) {
                        this.datedata.push(new Date(day));
                    }
                }
            }

            innerdatatableanggotabaru(item,nulldata) {
                return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    <td>${item.pdl.nama}</td>
                    <td>${item.pdl.cabang.nama}</td>
                    <td class="whitespace-nowrap">${new Date(item.created_at).toISOString().split('T')[0]}</td>
                    <td class="whitespace-nowrap">menambah data anggota</td>
                    <td class="min-w-72">${'menambahkan anggota baru dengan nama ' + item.nama}</td>
                    <td class="min-w-72">${'ada ' + nulldata + ' data kosong pada anggota ini'}</td>
                    <td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                              <div  class="dropdown-content menu rounded-xl z-[1] mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0 p-2  dark:border-stone-400 p-0 shadow">
                                <li class="w-full"><a href="/anggota/${item.id}" class="hover:text-white ">view</a></li>
                            </div>
                            </td>
                    </tr>`;
            }

            innerdatatableanggotabaru(item,nulldata) {
                return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    <td>${item.pdl.nama}</td>
                    <td>${item.pdl.cabang.nama}</td>
                    <td class="whitespace-nowrap">${new Date(item.created_at).toISOString().split('T')[0]}</td>
                    <td class="whitespace-nowrap">menambah data anggota</td>
                    <td class="min-w-72">${'menambahkan anggota lama dengan nama ' + item.nama}</td>
                    <td class="min-w-72">${'ada ' + nulldata + ' data kosong pada anggota ini'}</td>
                    <td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                              <div  class="dropdown-content menu rounded-xl z-[1] mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0 p-2  dark:border-stone-400 p-0 shadow">
                                <li class="w-full"><a href="/anggota/${item.id}" class="hover:text-white ">view</a></li>
                            </div>
                            </td>
                    </tr>`;
            }

            innerdatatabledroppingbaru(item,nulldata) {
                return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    <td>${item.anggota.pdl.nama}</td>
                    <td>${item.anggota.pdl.cabang.nama}</td>
                    <td class="whitespace-nowrap">${new Date(item.tanggal_dropping).toISOString().split('T')[0]}</td>
                    <td class="whitespace-nowrap">menambah data dropping</td>
                    <td class="min-w-72">${'menambahkan dropppingan anggota baru dengan nama ' + item.anggota.nama +' senilai Rp ' + item.nominal_dropping}</td>
                    <td class="min-w-72">${nulldata != null ? 'ada ' + nulldata + ' data kosong  pada dropping anggota ini' : 'data anggota lengkap pada dropping anggota ini'} ${ item.note != null ? " dengan catatan dropping '" + item.note + "'" : ''}</td>
                    <td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                            <div  class="dropdown-content menu rounded-xl z-[1] mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0 p-2  dark:border-stone-400 p-0 shadow">
                                <li class="w-full"><a href="/dropping/${item.id}" class="hover:text-white ">view</a></li>
                            </div>
                            </td>
                    </tr>`;
            }
            innerdatatabledroppingbaru(item,nulldata) {
                return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    <td>${item.anggota.pdl.nama}</td>
                    <td>${item.anggota.pdl.cabang.nama}</td>
                    <td class="whitespace-nowrap">${new Date(item.tanggal_dropping).toISOString().split('T')[0]}</td>
                    <td class="whitespace-nowrap">menambah data dropping</td>
                    <td class="min-w-72">${'menambahkan dropppingan anggota baru dengan nama ' + item.anggota.nama +' senilai Rp ' + item.nominal_dropping}</td>
                    <td class="min-w-72">${nulldata != null ? 'ada ' + nulldata + ' data kosong  pada dropping anggota ini' : 'data anggota lengkap pada dropping anggota ini'} ${ item.note != null ? " dengan catatan dropping '" + item.note + "'" : ''}</td>
                    <td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                            <div  class="dropdown-content menu rounded-xl z-[1] mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0 p-2  dark:border-stone-400 p-0 shadow">
                                <li class="w-full"><a href="/dropping/${item.id}" class="hover:text-white ">view</a></li>
                            </div>
                            </td>
                    </tr>`;
            }
            innerdatatabledroppinglama(item,nulldata) {
                return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    <td>${item.anggota.pdl.nama}</td>
                    <td>${item.anggota.pdl.cabang.nama}</td>
                    <td class="whitespace-nowrap">${new Date(item.tanggal_dropping).toISOString().split('T')[0]}</td>
                    <td class="whitespace-nowrap">menambah data dropping</td>
                    <td class="min-w-72">${'menambahkan dropppingan anggota lama dengan nama ' + item.anggota.nama +' senilai Rp ' + item.nominal_dropping}</td>
                    <td class="min-w-72">${nulldata != null ? 'ada ' + nulldata + ' data kosong  pada dropping anggota ini' : 'data anggota lengkap pada dropping anggota ini'} ${ item.note != null ? " dengan catatan dropping '" + item.note + "'" : ''}</td>
                    <td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                              <div  class="dropdown-content menu rounded-xl z-[1] mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0 p-2  dark:border-stone-400 p-0 shadow">
                                <li class="w-full"><a href="/dropping/${item.id}" class="hover:text-white ">view</a></li>
                            </div>
                            </td>
                    </tr>`;
            }
            innerdatatabledroppinglama(item,nulldata) {
                return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    <td>${item.anggota.pdl.nama}</td>
                    <td>${item.anggota.pdl.cabang.nama}</td>
                    <td class="whitespace-nowrap">${new Date(item.tanggal_dropping).toISOString().split('T')[0]}</td>
                    <td class="whitespace-nowrap">menambah data dropping</td>
                    <td class="min-w-72">${'menambahkan dropppingan anggota lama dengan nama ' + item.anggota.nama +' senilai Rp ' + item.nominal_dropping}</td>
                    <td class="min-w-72">${nulldata != null ? 'ada ' + nulldata + ' data kosong  pada dropping anggota ini' : 'data anggota lengkap pada dropping anggota ini'} ${ item.note != null ? " dengan catatan dropping '" + item.note + "'" : ''}</td>
                    <td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                              <div  class="dropdown-content menu rounded-xl z-[1] mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0 p-2  dark:border-stone-400 p-0 shadow">
                                <li class="w-full"><a href="/dropping/${item.id}" class="hover:text-white ">view</a></li>
                            </div>
                            </td>
                    </tr>`;
            }
            innerdatatablestorting(item,nulldata) {
                return `
                    <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    <td>${item.dropping.anggota.pdl.nama}</td>
                    <td>${item.dropping.anggota.pdl.cabang.nama}</td>
                    <td class="whitespace-nowrap">${new Date(item.tanggal_storting).toISOString().split('T')[0]}</td>
                    <td class="whitespace-nowrap">menambah data storting</td>
                    <td class="min-w-72">${'melakukan storting anggota dengan nama ' + item.dropping.anggota.nama +' senilai Rp ' + item.nominal_storting}</td>
                    <td class="min-w-72">${nulldata != null ? 'ada ' + nulldata + ' data kosong  pada storting anggota ini' : 'data anggota lengkap pada storting anggota ini'} ${ item.note != null ? " dengan catatan dropping '" + item.note + "'" : ''}</td>
                    <td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                              <div  class="dropdown-content menu rounded-xl z-[1] mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0 p-2  dark:border-stone-400 p-0 shadow">
                                <li class="w-full"><a href="/storting/${item.id}" class="hover:text-white ">view</a></li>
                            </div>
                            </td>
                    </tr>`;
            }


            calculateAndRenderRow(
                date,
                anggotadata,
                stortingdata,
                droppingdata,
                index
            ) {


                let tanggal = new Date(date); // Misalnya, ini adalah tanggal saat ini
                tanggal.setDate(tanggal.getDate() + 1); // Mengurangi satu hari dari tanggal saat ini
                const formattedDate = tanggal.toISOString().split("T")[0];

                const filteredAnggota = anggotadata.filter((item) =>
                    item.created_at.startsWith(formattedDate)
                );

                const filteredStorting = stortingdata.filter(
                    (item) => item.tanggal_storting === formattedDate
                );
                const filteredDropping = droppingdata.filter(
                    (item) => item.tanggal_dropping === formattedDate
                );

                const anggotaBaru = filteredAnggota.filter(
                    (item) => item.jenis_anggota === "baru"
                );


                const anggotaLama = filteredAnggota.filter(
                    (item) => item.jenis_anggota === "lama"
                );
                const droppingBaru = filteredDropping.filter(
                    (item) => item.anggota.jenis_anggota === "baru"
                );
                const droppingLama = filteredDropping.filter(
                    (item) => item.anggota.jenis_anggota === "lama"
                );

                let nulldata = null;
                if (anggotaBaru.length != 0) {

                    return anggotaBaru.map(item => {
                        nulldata = Object.keys(item).reduce((count, key) => {
                            return item[key] === null ? count + 1 : count;
                        }, 0);
                        return this.innerdatatableanggotabaru(item,nulldata);

                    }).join('');

                    nulldata = null;

                }
                if (anggotaLama.length != 0) {

                    return anggotaLama.map(item => {
                        nulldata = Object.keys(item).reduce((count, key) => {
                            return item[key] === null ? count + 1 : count;
                        }, 0);

                        return this.innerdatatableanggotalama(item,nulldata);

                    }).join('');

                    nulldata = null;

                }
                if (droppingBaru.length != 0) {

                    return droppingBaru.map(item => {
                        nulldata = Object.keys(item).reduce((count, key) => {
                            return item[key] === null ? count + 1 : count;
                        }, 0);
                        return this.innerdatatabledroppingbaru(item,nulldata);

                    }).join('');

                    nulldata = null;

                }
                if (droppingLama.length != 0) {

                    return droppingLama.map(item => {
                        nulldata = Object.keys(item).reduce((count, key) => {
                            return item[key] === null ? count + 1 : count;
                        }, 0);

                        return this.innerdatatabledroppinglama(item,nulldata);

                    }).join('');

                    nulldata = null;

                }

                if (filteredStorting.length != 0) {

                    return filteredStorting.map(item => {
                        nulldata = Object.keys(item).reduce((count, key) => {
                            return item[key] === null ? count + 1 : count;
                        }, 0);


                        return this.innerdatatablestorting(item,nulldata);

                    }).join('');

                    nulldata = null;

                }
            }

            async loaddatatable(anggotadata, stortingdata, droppingdata) {
                await this.populateDateGroups(this.firstDayOfMonth, this.lastDayOfMonth);
                // console.log(this.datedata);
                return this.datedata.map((date, index) => {
                    return this.calculateAndRenderRow(
                        date,
                        anggotadata,
                        stortingdata,
                        droppingdata,
                        index
                    );
                }).join('');
            }


        }


        class anggota extends main {

            anggotafetch() {
                return fetch("/api/anggota/list/get", {
                    'method': 'GET',
                    'headers': {
                        'Accept': 'application/json',
                        'Authorization': `bearer ${this.accesstoken}`,
                    },
                }).then(async (response) => {
                    try {
                        if (response.status === 401) {
                            await this.refreshToken();
                            response = await fetch("/api/anggota/list/get", {
                                'method': 'GET',
                                'headers': {
                                    'Accept': 'application/json',
                                    'Authorization': `bearer ${this.accesstoken}`,
                                },
                            });
                            return response.status === 404 ? [] : await response.json();
                        } else {
                            return response.status === 404 ? [] : await response.json();
                        }
                    } catch (error) {
                        console.error(`Error fetching data from ${url}:`, error);
                        return [];
                    }
                });
            }

        }

        class dropping extends anggota {
            droppingfetch() {
                return fetch("/api/dropping/list/get", {
                    'method': 'GET',
                    'headers': {
                        'Accept': 'application/json',
                        'Authorization': `bearer ${this.accesstoken}`,
                    },
                }).then(async (response) => {
                    try {
                        return response.status === 404 ? [] : await response.json();
                    } catch (error) {
                        console.error(`Error fetching data from ${url}:`, error);
                        return [];
                    }
                });
            }
        }
        class storting extends dropping {
            stortingfetch() {
                return fetch("/api/storting/list/get", {
                    'method': 'GET',
                    'headers': {
                        'Accept': 'application/json',
                        'Authorization': `bearer ${this.accesstoken}`,
                    },
                }).then(async (response) => {
                    try {
                        return response.status === 404 ? [] : await response.json();
                    } catch (error) {
                        console.error(`Error fetching data from ${url}:`, error);
                        return [];
                    }
                });
            }
        }
        class cabang extends anggota {
            cabangfetch() {
                return fetch("/api/cabang/list/get", {
                    'method': 'GET',
                    'headers': {
                        'Accept': 'application/json',
                        'Authorization': `bearer ${this.accesstoken}`,
                    },
                }).then(async (response) => {
                    try {
                        return response.status === 404 ? [] : await response.json();
                    } catch (error) {
                        console.error(`Error fetching data from ${url}:`, error);
                        return [];
                    }
                });
            }
        }

        class pdl extends cabang {
            pdlfetch() {
                return fetch("/api/pdl/list/get", {
                    'method': 'GET',
                    'headers': {
                        'Accept': 'application/json',
                        'Authorization': `bearer ${this.accesstoken}`,
                    },
                }).then(async (response) => {
                    try {
                        return response.status === 404 ? [] : await response.json();
                    } catch (error) {
                        console.error(`Error fetching data from ${url}:`, error);
                        return [];
                    }
                });
            }
        }





        window.addEventListener("load", async () => {
            let initialmain = new main(nowdate);
            let initialanggota = new anggota;
            let initialcabang = new cabang;
            let initialdropping = new dropping;
            let initialstorting = new storting;
            let initialpdl = new pdl;
            listtablebody.innerHTML = initialmain.load(11);
            let dataanggota = await initialanggota.anggotafetch();
            datacabang = await initialcabang.cabangfetch();
            datapdl = await initialpdl.pdlfetch();
            let datadropping = await initialdropping.droppingfetch();
            let datastorting = await initialstorting.stortingfetch();
            console.log(newdata.newdataanggota);
            if (initialmain.admincek() === false) {
                newdata.newdataanggota = dataanggota.filter(item => item.pdl.cabang.nama === initialmain
                    .getusercabang());
                newdata.newdatadropping = datadropping.filter(item => item.anggota.pdl.cabang.nama ===
                    initialmain.getusercabang());
                newdata.newdatastorting = datastorting.filter(item => item.pdl.cabang.nama === initialmain
                    .getusercabang());
                globalfiltereddata.globalfiltereddataanggota = dataanggota.filter(item => item.pdl.cabang
                    .nama === initialmain
                    .getusercabang());
                globalfiltereddata.globalfiltereddatadropping = datadropping.filter(item => item.anggota.pdl
                    .cabang.nama ===
                    initialmain.getusercabang());
                globalfiltereddata.globalfiltereddatastorting = datastorting.filter(item => item.dropping
                    .anggota.pdl.cabang.nama === initialmain
                    .getusercabang());
                datacabang.forEach((item, index) => {
                    selectcabang.innerHTML = `
                       <option value="${initialmain.getusercabang()}">${initialmain.getusercabang()}</option>
                       `;
                });
                selectpdl.innerHTML = `
                    <option value="pdl">pdl</option>
                     `;

                datapdl.forEach((item, index) => {
                    if (item.cabang.nama == initialmain.getusercabang()) {
                        selectpdl.innerHTML += `
                       <option value="${item.nama}">${item.nama}</option>
                       `;
                    }
                });

                selectcabang.classList.add('pointer-events-none');
                selectcabang.classList.add('bg-gray-200');
                selectcabang.classList.remove('bg-transparent');
            } else {
                newdata.newdataanggota = dataanggota;
                newdata.newdatadropping = datadropping;
                newdata.newdatastorting = datastorting;
                globalfiltereddata.globalfiltereddataanggota = dataanggota;
                globalfiltereddata.globalfiltereddatadropping = datadropping;
                globalfiltereddata.globalfiltereddatastorting = datastorting;
                datacabang.forEach((item, index) => {
                    selectcabang.innerHTML += `
                       <option value="${item.nama}">${item.nama}</option>
                       `;
                });

            }

            listtablebody.innerHTML = "";
            listtablebody.innerHTML = await initialmain.loaddatatable(newdata.newdataanggota, newdata
                .newdatastorting, newdata.newdatadropping);



        });



        selectpdl.addEventListener('input', async (e) => {
            let initialmain = new main(nowdate);
            listtablebody.innerHTML = initialmain.load(11);

            let filtered = {
                filteredanggota: null,
                filteredstorting: null,
                filtereddropping: null,
            };

            if (e.target.value == 'pdl') {
                filtered.filteredanggota = globalfiltereddata.globalfiltereddataanggota.filter(item => item.pdl
                    .cabang.nama === selectcabang.value);
                filtered.filtereddropping = globalfiltereddata.globalfiltereddatadropping.filter(item => item
                    .anggota.pdl.cabang.nama === selectcabang.value);
                filtered.filteredstorting = globalfiltereddata.globalfiltereddatastorting.filter(item => item
                    .dropping.anggota.pdl.cabang.nama === selectcabang.value);

            } else {
                filtered.filteredanggota = globalfiltereddata.globalfiltereddataanggota.filter(item => item.pdl
                    .nama === e.target
                    .value);
                filtered.filtereddropping = globalfiltereddata.globalfiltereddatadropping.filter(item => item
                    .anggota.pdl.nama === e.target
                    .value);
                filtered.filteredstorting = globalfiltereddata.globalfiltereddatastorting.filter(item => item
                    .dropping.anggota.pdl.nama === e.target
                    .value);

            }


            listtablebody.innerHTML = "";
            listtablebody.innerHTML = await initialmain.loaddatatable(filtered.filteredanggota, filtered
                .filteredstorting, filtered.filtereddropping);

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
            let initialmain = new main(nowdate);
            listtablebody.innerHTML = initialmain.load(11);
            selectpdl.innerHTML = `
            <option value="pdl">pdl</option>
            `;

            datapdl.forEach((item, index) => {
                if (item.cabang.nama == e.target.value) {
                    selectpdl.innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;

                }

            });
            let filtered = {
                filteredanggota: null,
                filteredstorting: null,
                filtereddropping: null,
            };

            if (e.target.value == 'cabang') {
                filtered.filteredanggota = globalfiltereddata.globalfiltereddataanggota;
                filtered.filtereddropping = globalfiltereddata.globalfiltereddatadropping;
                filtered.filteredstorting = globalfiltereddata.globalfiltereddatastorting;
                document.getElementById("title").innerHTML = `Table Lprn Bulanan Cabang mingguan`;

            } else {
                document.getElementById("title").innerHTML = `Table Lprn Bulanan Cabang ` + e.target
                    .value;
                filtered.filteredanggota = globalfiltereddata.globalfiltereddataanggota.filter(item => item.pdl
                    .cabang.nama === e.target
                    .value);
                filtered.filtereddropping = globalfiltereddata.globalfiltereddatadropping.filter(item => item
                    .anggota.pdl.cabang.nama === e.target
                    .value);
                filtered.filteredstorting = globalfiltereddata.globalfiltereddatastorting.filter(item => item
                    .dropping.anggota.pdl.cabang.nama === e.target
                    .value);

            }


            listtablebody.innerHTML = "";
            listtablebody.innerHTML = await initialmain.loaddatatable(filtered.filteredanggota, filtered
                .filteredstorting, filtered.filtereddropping);
        });

        selectdate.addEventListener("input", async (e) => {
            nowdate = e.target.value;
            let initialmain = new main(nowdate);
            listtablebody.innerHTML = initialmain.load(11)
            selectpdl.innerHTML = `<option value="pdl">pdl</option>`;
            title.innerHTML = `Table Lprn Bulanan Cabang mingguan`;

            if (initialmain.admincek() === false) {
                datapdl.forEach((item, index) => {
                    if (item.cabang.nama == initialmain.getusercabang()) {
                        selectpdl.innerHTML += `
                        <option value="${item.nama}">${item.nama}</option>
                    `;

                    }
                });

                globalfiltereddata.globalfiltereddataanggota = newdata.newdataanggota.filter(item => item.pdl
                    .cabang
                    .nama === initialmain
                    .getusercabang());
                globalfiltereddata.globalfiltereddatadropping = newdata.newdatadropping.filter(item => item
                    .anggota.pdl
                    .cabang.nama ===
                    initialmain.getusercabang());
                globalfiltereddata.globalfiltereddatastorting = newdata.newdatastorting.filter(item => item
                    .dropping
                    .anggota.pdl.cabang.nama === initialmain
                    .getusercabang());
            } else {
                globalfiltereddata.globalfiltereddataanggota = newdata.newdataanggota;
                globalfiltereddata.globalfiltereddatadropping = newdata.newdatadropping;
                globalfiltereddata.globalfiltereddatastorting = newdata.newdatastorting;
                selectcabang.innerHTML = `<option value="cabang">cabang</option>`;
                datacabang.forEach((item, index) => {
                    selectcabang.innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;
                });
            }

            listtablebody.innerHTML.innerHTML = '';
            listtablebody.innerHTML = await initialmain.loaddatatable(globalfiltereddata
                .globalfiltereddataanggota, globalfiltereddata
                .globalfiltereddatastorting, globalfiltereddata.globalfiltereddatadropping);

        });
    </script>
@endsection
