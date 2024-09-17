@extends('dashboard.main') @section('dashboardheader')
    @include('layout.nav')
    @endsection @section('dashboardpage')
    @include('layout.notiferror')
    @include('layout.notifsuccess')
    <div class="flex justify-between items-center p-3 mt-10 mb-5 dark:text-white">
        <h1 class="text-xl w-10/12" id="title">Table Lprn Bulanan Cabang mingguan</h1>
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
                        class="block w-full bg-black text-white border  dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">Download</button>
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
                    <th rowspan="3" class="font-medium text-black dark:text-white">
                        Jadwal Resort
                    </th>
                    <th rowspan="3" class="font-medium text-black dark:text-white">
                        Tanggal
                    </th>
                    <th colspan="3" class="font-medium text-black dark:text-white">
                        Anggota
                    </th>
                    <th colspan="4" class="font-medium text-black border-x dark:text-white">
                        Storting
                    </th>
                    <th colspan="3" class="font-medium text-black dark:text-white">
                        Dropping
                    </th>
                    <th rowspan="3" class="font-medium text-black dark:text-white">
                        admin
                    </th>
                    <th rowspan="3" class="font-medium text-black dark:text-white">
                        simpanan
                    </th>

                    <th rowspan="3" class="font-medium text-black dark:text-white">
                        jumlah debet tanpa kasbon
                    </th>
                </tr>
                <tr class="dark:border-stone-400">
                    <th rowspan="2" class="font-medium text-black dark:text-white">
                        Lama
                    </th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">
                        Baru
                    </th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">
                        Jumlah
                    </th>
                    <th rowspan="2" class="font-medium border-l text-black dark:text-white">
                        Anggota tertagih
                    </th>
                    <th rowspan="2" class="font-medium  text-black dark:text-white">
                        Target
                    </th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">
                        Bayar
                    </th>
                    <th rowspan="2" class="font-medium border-r text-black dark:text-white">
                        Tidak ter bayar
                    </th>

                    <th rowspan="2" class="font-medium text-black dark:text-white">
                        Lama
                    </th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">
                        Baru
                    </th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">
                        Jumlah dropping
                    </th>
                </tr>
            </thead>
            <tbody id="list-body-table" class="text-black/60 dark:text-stone-200"></tbody>
        </table>
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
                this.dateGroups = {
                    A: [],
                    B: [],
                    C: [],
                    D: [],
                    E: [],
                };
                let currentDate = new Date(date);
                const currentYear = currentDate.getFullYear();
                const currentMonth = currentDate.getMonth();
                this.firstDayOfMonth = new Date(currentYear, currentMonth, 1);
                this.lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);

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
                        switch (dayOfWeek) {
                            case 1:
                                this.dateGroups.A.push(new Date(day));
                                break;
                            case 2:
                                this.dateGroups.B.push(new Date(day));
                                break;
                            case 3:
                                this.dateGroups.C.push(new Date(day));
                                break;
                            case 4:
                                this.dateGroups.D.push(new Date(day));
                                break;
                            case 5:
                                this.dateGroups.E.push(new Date(day));
                                break;
                        }
                    }
                }
            }

            innerdatatable(index, groupKey, date, anggotaLama, anggotaBaru, anggotastorting, stortingtarget, stortingBayar,
                tidakterbayar, droppingLama, droppingBaru, droppingmurni, admin_provisi, simpanan) {
                return `
                <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    ${
                        groupKey === "A" && index === 0
                            ? `<td rowspan="${this.dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    ${
                        groupKey === "B" && index === 0
                            ? `<td rowspan="${this.dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    ${
                        groupKey === "C" && index === 0
                            ? `<td rowspan="${this.dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    ${
                        groupKey === "D" && index === 0
                            ? `<td rowspan="${this.dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    ${
                        groupKey === "E" && index === 0
                            ? `<td rowspan="${this.dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    <td>${date.getDate()}</td>
                    <td>${anggotaLama}</td>
                    <td>${anggotaBaru}</td>
                    <td>${anggotaLama + anggotaBaru}</td>
                    <td class="border-l">${anggotastorting}</td>
                    <td>${stortingtarget}</td>
                    <td>${stortingBayar}</td>
                    <td >${tidakterbayar < 0 ? 0 : tidakterbayar}</td>
                    <td class="border-l">${droppingLama}</td>
                    <td>${droppingBaru}</td>
                    <td>${droppingmurni}</td>
                    <td>${admin_provisi}</td>
                    <td>${simpanan}</td>
                    <td>${stortingtarget + simpanan + admin_provisi}</td>
                </tr>        `;
            }


            calculateAndRenderRow(
                groupKey,
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
                ).length;
                const anggotaLama = filteredAnggota.filter(
                    (item) => item.jenis_anggota === "lama"
                ).length;
                const droppingBaru = filteredDropping.filter(
                    (item) => item.anggota.jenis_anggota === "baru"
                ).length;
                const droppingLama = filteredDropping.filter(
                    (item) => item.anggota.jenis_anggota === "lama"
                ).length;
                const anggotastorting = filteredStorting.length;
                let stortingTotal = filteredStorting.reduce(
                    (sum, item) => sum + parseFloat(item.nominal_storting),
                    0
                );
                let stortingtarget = filteredStorting.reduce(
                    (sum, item) => sum + parseFloat(item.dropping.nominal_dropping) / 10 + (parseFloat(item.dropping
                        .nominal_dropping) / 10 * 0.1),
                    0
                );
                let tidakterbayar = stortingtarget - stortingTotal;
                let droppingTotal = filteredDropping.reduce(
                    (sum, item) => sum + parseFloat(item.nominal_dropping),
                    0
                );
                let admin_provisi = filteredDropping.reduce(
                    (sum, item) =>
                    sum +
                    parseFloat(item.nominal_dropping) *
                    (item.anggota.pdl.cabang.admin_provisi / 100),
                    0
                );
                let simpanan = filteredDropping.reduce(
                    (sum, item) =>
                    sum +
                    parseFloat(item.nominal_dropping) *
                    (item.anggota.pdl.cabang.simpanan / 100),
                    0
                );
                let droppingmurni = droppingTotal - (admin_provisi + simpanan);
                let stortingBayar = stortingTotal; // Assumes all storting is paid
                return this.innerdatatable(index, groupKey, date, anggotaLama, anggotaBaru, anggotastorting,
                    stortingtarget,
                    stortingBayar, tidakterbayar, droppingLama, droppingBaru, droppingmurni, admin_provisi, simpanan
                );
            }


            async loaddatatable(anggotadata, stortingdata, droppingdata) {
                await this.populateDateGroups(this.firstDayOfMonth, this.lastDayOfMonth);
                return Object.entries(this.dateGroups).map(([groupKey, dates]) => {
                    return dates.map((date, index) => {
                        return this.calculateAndRenderRow(
                            groupKey,
                            date,
                            anggotadata,
                            stortingdata,
                            droppingdata,
                            index
                        );
                    }).join('');
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

                globalfiltereddata.globalfiltereddataanggota = newdata.newdataanggota.filter(item => item.pdl.cabang
                    .nama === initialmain
                    .getusercabang());
                globalfiltereddata.globalfiltereddatadropping = newdata.newdatadropping.filter(item => item.anggota.pdl
                    .cabang.nama ===
                    initialmain.getusercabang());
                globalfiltereddata.globalfiltereddatastorting = newdata.newdatastorting.filter(item => item.dropping
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
