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
                    <th rowspan="3" class="font-medium text-black dark:text-white">tanggal</th>
                    <th rowspan="3" class="font-medium text-black dark:text-white">pdl</th>
                    <th colspan="3" class="font-medium text-black dark:text-white">anggota</th>
                    <th colspan="3" class="font-medium text-black dark:text-white">Storting</th>
                    <th colspan="3" class="font-medium text-black dark:text-white">Dropping</th>
                    <th rowspan="3" class="font-medium text-black dark:text-white">simpanan</th>
                    <th rowspan="3" class="font-medium text-black dark:text-white">admin</th>
                    <th rowspan="3" class="font-medium text-black dark:text-white">jumlah debet tanpa kasbon</th>
                </tr>
                <tr class="dark:border-stone-400">
                    <th rowspan="2" class="font-medium text-black dark:text-white">Lama</th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">Baru</th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">Jumlah</th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">bayar</th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">tidak bayar</th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">Jumlah dibayar</th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">lama</th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">baru</th>
                    <th rowspan="2" class="font-medium text-black dark:text-white">jumlah dropping</th>
                </tr>
            </thead>
            <tbody id="laporan-list-body-table" class="text-black/60 dark:text-stone-200"></tbody>
        </table>
        
        <script>


            const currentDate = new Date();
            const currentYear = currentDate.getFullYear();
            const currentMonth = currentDate.getMonth();
        
            const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
            const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);
        
            const dates = [];
        
            let liburdate = [];
        
            async function getliburdate() {
                let datafetch = await fetch("https://raw.githubusercontent.com/guangrei/APIHariLibur_V2/main/holidays.json");
                let data = await datafetch.json();
                Object.keys(data).forEach((item) => {
                    if (item != 'info') {
                        liburdate.push(item);
                    }
                });
            }
        
            getliburdate().then(() => {
                for (let day = firstDayOfMonth; day <= lastDayOfMonth; day.setDate(day.getDate() + 1)) {
                    const dayOfWeek = day.getDay();
                    const formattedDate = day.toISOString().split('T')[0]; // Format YYYY-MM-DD
                    if (dayOfWeek !== 0 && dayOfWeek !== 6 && !liburdate.includes(formattedDate)) {
                        dates.push(new Date(day)); // Tambahkan tanggal ke daftar
                    }
                }
        
                dates.forEach(async (date) => {
                    const formattedDate = date.toISOString().split('T')[0];
                    let datafetch = await fetch("/api/anggota/list/get");
                    let anggotadata = await datafetch.json();
        
                    // Cari anggota yang sesuai dengan tanggal
                    const filteredData = anggotadata.filter(item => item.created_at.startsWith(formattedDate));
        
                    let anggotaBaru = filteredData.filter(item => item.jenis_anggota === "baru").length;
                    let anggotaLama = filteredData.filter(item => item.jenis_anggota === "lama").length;
                    let stortingTotal = 0;
            let droppingTotal = 0;
            let stortingBayar = 0;
            let stortingTidakBayar = 0;

            filteredData.forEach(item => {
                item.storting.forEach(storting => {
                    if (storting.tanggal_storting === formattedDate) {
                        stortingTotal += parseFloat(storting.nominal_storting);
                        stortingBayar += parseFloat(storting.nominal_storting); // Asumsi semuanya dibayar, jika tidak perlu disesuaikan logikanya
                    }
                });
                item.dropping.forEach(dropping => {
                    if (dropping.tanggal_dropping === formattedDate) {
                        droppingTotal += parseFloat(dropping.nominal_dropping);
                    }
                });
            });

            // Hasilkan baris tabel
            document.getElementById("laporan-list-body-table").innerHTML += `
                <tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                    <td>${date.getDate()}</td>
                    <td>${filteredData.length > 0 ? filteredData[0].pdl.nama : '-'}</td>
                    <td>${anggotaLama}</td>
                    <td>${anggotaBaru}</td>
                    <td>${anggotaLama + anggotaBaru}</td>
                    <td>${stortingBayar}</td>
                    <td>${stortingTidakBayar}</td>
                    <td>${stortingTotal}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>${droppingTotal}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            `;
        });
    });
        
        </script>
    </div>
@endsection
