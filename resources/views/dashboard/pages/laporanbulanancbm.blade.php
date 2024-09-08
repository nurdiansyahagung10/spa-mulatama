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
                    <input type="month" name="" id="tanggal_ditambahkan"
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
            <tbody id="laporan-list-body-table" class="text-black/60 dark:text-stone-200"></tbody>
        </table>

        <script>
            const currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth();
            let cabangvalue = null;
            let firstDayOfMonth = new Date(currentYear, currentMonth, 1);
            let lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);

            const dateGroups = {
                A: [],
                B: [],
                C: [],
                D: [],
                E: [],
            };

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


            function populateDateGroups(fdayofmonth, ldayofmonth) {
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
                                dateGroups.A.push(new Date(day));
                                break;
                            case 2:
                                dateGroups.B.push(new Date(day));
                                break;
                            case 3:
                                dateGroups.C.push(new Date(day));
                                break;
                            case 4:
                                dateGroups.D.push(new Date(day));
                                break;
                            case 5:
                                dateGroups.E.push(new Date(day));
                                break;
                        }
                    }
                }
            }

            async function safeFetch(url) {
                try {
                    let response = await fetch(url);
                    return response.status === 404 ? [] : await response.json();
                } catch (error) {
                    console.error(`Error fetching data from ${url}:`, error);
                    return [];
                }
            }

            function calculateAndRenderRow(
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
                    (sum, item) => sum + parseFloat(item.dropping.nominal_dropping) / 10 + (parseFloat(item.dropping.nominal_dropping) / 10 * 0.1),
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

                document.getElementById("laporan-list-body-table").innerHTML += `
                <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    ${
                        groupKey === "A" && index === 0
                            ? `<td rowspan="${dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    ${
                        groupKey === "B" && index === 0
                            ? `<td rowspan="${dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    ${
                        groupKey === "C" && index === 0
                            ? `<td rowspan="${dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    ${
                        groupKey === "D" && index === 0
                            ? `<td rowspan="${dateGroups[groupKey].length}">${groupKey}</td>`
                            : ""
                    }
                    ${
                        groupKey === "E" && index === 0
                            ? `<td rowspan="${dateGroups[groupKey].length}">${groupKey}</td>`
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
                </tr>`;
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


                        for (const [groupKey, dates] of Object.entries(dateGroups)) {
                            dates.forEach((date, index) => {
                                calculateAndRenderRow(
                                    groupKey,
                                    date,
                                    anggotadatabycabang,
                                    stortingdatabycabang,
                                    droppingbycabang,
                                    index
                                );
                            });
                        }
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


                        for (const [groupKey, dates] of Object.entries(dateGroups)) {
                            dates.forEach((date, index) => {
                                calculateAndRenderRow(
                                    groupKey,
                                    date,
                                    anggotadatabycabang,
                                    stortingdatabycabang,
                                    droppingbycabang,
                                    index
                                );
                            });
                        }
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
                    document.getElementById("title").innerHTML = `Table Lprn Bulanan Cabang mingguan`;

                } else {
                    document.getElementById("title").innerHTML = `Table Lprn Bulanan Cabang ` + cabangvalue;
                }

                if (cabangvalue == 'cabang') {
                    document.getElementById("title").innerHTML = `Table Lprn Bulanan Cabang mingguan`;
                    getliburdate().then(async () => {
                        populateDateGroups(firstDayOfMonth, lastDayOfMonth);
                        document.getElementById("laporan-list-body-table").innerHTML = load(15);

                        let anggotadata = await safeFetch("/api/anggota/list/get");
                        let stortingdata = await safeFetch("/api/storting/list/get");
                        let droppingdata = await safeFetch("/api/dropping/list/get");

                        document.getElementById("laporan-list-body-table").innerHTML = '';

                        for (const [groupKey, dates] of Object.entries(dateGroups)) {
                            dates.forEach((date, index) => {
                                calculateAndRenderRow(
                                    groupKey,
                                    date,
                                    anggotadata,
                                    stortingdata,
                                    droppingdata,
                                    index
                                );
                            });
                        }
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


                        for (const [groupKey, dates] of Object.entries(dateGroups)) {
                            dates.forEach((date, index) => {
                                calculateAndRenderRow(
                                    groupKey,
                                    date,
                                    anggotadatabycabang,
                                    stortingdatabycabang,
                                    droppingbycabang,
                                    index
                                );
                            });
                        }
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

                document.getElementById("title").innerHTML = `Table Lprn Bulanan Cabang mingguan`;

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

                for (const group in dateGroups) {
                    dateGroups[group] = [];
                }

                getliburdate().then(async () => {
                    populateDateGroups(firstDayOfMonth, lastDayOfMonth);
                    document.getElementById("laporan-list-body-table").innerHTML = load(15);



                    let anggotadata = await safeFetch("/api/anggota/list/get");
                    let stortingdata = await safeFetch("/api/storting/list/get");
                    let droppingdata = await safeFetch("/api/dropping/list/get");
                    document.getElementById("laporan-list-body-table").innerHTML = '';


                    for (const [groupKey, dates] of Object.entries(dateGroups)) {
                        dates.forEach((date, index) => {
                            calculateAndRenderRow(
                                groupKey,
                                date,
                                anggotadata,
                                stortingdata,
                                droppingdata,
                                index
                            );
                        });
                    }
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

                for (const [groupKey, dates] of Object.entries(dateGroups)) {
                    dates.forEach((date, index) => {
                        calculateAndRenderRow(
                            groupKey,
                            date,
                            anggotadata,
                            stortingdata,
                            droppingdata,
                            index
                        );
                    });
                }
            });
        </script>
    </div>
@endsection
