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
                        <select name="pdl" id="pdl"
                            class="block w-full bg-transparent darK:text-white border text-black dark:text-white border-stone-400 rounded-full py-[0.35rem] px-4 leading-tight focus:outline-none dark:focus:border-white">
                            <option value="">Pdl</option>
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
                        <input type="date" name="tanggal" id="tanggal_dropping"
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
                    <th class="font-medium text-black dark:text-white ">No</th>
                    <th class="font-medium text-black dark:text-white ">Nama anggota</th>
                    <th class="font-medium text-black dark:text-white ">Pinjaman</th>
                    <th class="font-medium text-black dark:text-white ">admin dan provisi</th>
                    <th class="font-medium text-black dark:text-white ">total pinjaman</th>
                    <th class="font-medium text-black dark:text-white ">Pdl</th>
                    <th class="font-medium text-black dark:text-white ">Cabang</th>
                    <th class="font-medium text-black dark:text-white ">Tanggal dropping</th>
                    <th class="font-medium text-black dark:text-white ">Tanggal ditambahkan</th>
                    <th class="font-medium text-black dark:text-white ">Action</th>
                </tr>
            </thead>
            <tbody id="anggota-list-body-table" class="text-black/60 dark:text-stone-200">
                <script>
                    let data = null;
                    let newdata = null;
                    const btnsearchby = document.querySelectorAll(".btn-searchby");
                    let btnsaerchbyvalue = "Nama";
                    const search = document.getElementById("search");
                    let listtablebodyanggota = document.getElementById(
                        "anggota-list-body-table"
                    );
                    let getusernama = '{{ $getusername }}';
                    let admin = getusernama == 'admin' ? true : false;
                    let getusercabang = null;
                    if (admin == false) {
                        getusercabang = '{{ $cabang }}';
                    }


                    function innertabledropping(index, item) {
                        return `<tr class="dark:border-stone-400 dark:text-stone-300 hover:text-black dark:hover:text-white">
                        <td>${index + 1}</td>
                        <td>${item.anggota.nama}</td>
                        <td>${item.nominal_dropping - (item.nominal_dropping * item.anggota.pdl.cabang.admin_provisi / 100)}</td>
                        <td>${item.nominal_dropping * item.anggota.pdl.cabang.admin_provisi / 100}</td>
                        <td>${item.nominal_dropping}</td>
                        <td>${item.anggota.pdl.nama}</td>
                        <td>${item.anggota.pdl.cabang.nama}</td>
                        <td>${item.tanggal_dropping}</td>
                        <td>${new Date(item.created_at).toISOString().split('T')[0]}</td>
<td>
                                                        <div class="dropdown">
                            <div tabindex="0" class="cursor-pointer dark:text-white text-black" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg></div>
                            <form method="post" action="/dropping/${item.id}" tabindex="0" class="dropdown-content menu rounded-box z-[1] w-24 mt-2 dark:border dark:bg-base-300 bg-black text-stone-300 border-0  dark:border-stone-400 p-2 shadow">
                                @method('delete')   
                                @csrf
                                <li class="w-full"><a href="/dropping/${item.id}" class="hover:text-white ">view</a></li>
                                <li class="w-full"><a href="/dropping/${item.id}/edit" class="hover:text-white ">Edit</a></li>
                                <li><a hr\ef="/storting/create/${
                                                        item.id
                                                    }" class="hover:text-white">Storting</a></li>
                                <li class="w-full"><button class="hover:text-white ">Delete</button></li>
                            </form>                            </div>
                            </td>                    </tr> 
                    `;

                    }

                    function load(colspan) {
                        return `
            <tr class="border-b-0">
                <td colspan="${colspan}" class="h-[20rem]"><span class="text-black loading dark:text-white loading-bars loading-md"></span></td>
            </tr>`;
                    }


                    window.addEventListener("load", async () => {
                        listtablebodyanggota.innerHTML = load(12);
                        let datafetch = await fetch("/api/dropping/list/get");
                        data = await datafetch.json();
                        newdata = data;
                        if (admin == false) {
                            newdata = data.filter(item => item.anggota.pdl.cabang.nama === getusercabang)
                        }

                        listtablebodyanggota.innerHTML = "";
                        newdata.forEach((item, index) => {
                            listtablebodyanggota.innerHTML += innertabledropping(index, item);
                        });
                    });



                    btnsearchby.forEach((e) => {
                        e.addEventListener("click", (e) => {
                            btnsaerchbyvalue = e.target.textContent;

                        });

                    });

                    document.getElementById('pdl').addEventListener('input', (e) => {
                        cabang = document.getElementById('cabang').value;
                        listtablebodyanggota.innerHTML = "";
                        newdata.forEach((item, index) => {
                            if (item.anggota.pdl.nama == e.target.value) {

                                listtablebodyanggota.innerHTML += innertabledropping(index, item);
                            } else if (e.target.value == 'pdl') {
                                if (item.anggota.pdl.cabang.nama == cabang) {

                                    listtablebodyanggota.innerHTML += innertabledropping(index, item);
                                }
                            }
                        });

                    });

                    search.addEventListener("input", async (e) => {
                        const searchdata = e.target.value.toLowerCase();
                        document.getElementById('tanggal_dropping').value = '';
                        if (admin) {
                            document.getElementById('cabang').innerHTML = `
                                                                    <option value="cabang">cabang</option>

                                         `;
                            let datafetch = await fetch("/api/cabang/list/get");
                            filtereddata = await datafetch.json();
                            filtereddata.forEach((item, index) => {
                                document.getElementById('cabang').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;
                            });



                        }

                        document.getElementById('pdl').innerHTML = `
                                                                    <option value="pdl">pdl</option>

                                         `;
                        if (admin == false) {
                            let pdldatafetch = await fetch("/api/pdl/list/get");
                            let filtereddatapdl = await pdldatafetch.json();
                            document.getElementById('pdl').innerHTML = `
            <option value="pdl">pdl</option>

             `;

                            filtereddatapdl.forEach((item, index) => {
                                if (item.cabang.nama == getusercabang) {
                                    document.getElementById('pdl').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;

                                }
                            });

                        }

                        if (btnsaerchbyvalue.trim() == "Nama") {
                            newdata = data.filter((item) =>
                                item.anggota.nama.toLowerCase().includes(searchdata)
                            );
                        } 

                        if (admin == false) {
                            newdata = newdata.filter(item => item.anggota.pdl.cabang.nama === getusercabang)
                        }

                        listtablebodyanggota.innerHTML = "";
                        newdata.forEach((item, index) => {

                            listtablebodyanggota.innerHTML += innertabledropping(index, item);
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
                        if (screenWidth <= 640) {
                            document.getElementById('more-option').classList.toggle('!h-[14rem]');

                        }

                        document.querySelectorAll('.more-option-item').forEach((item) => {
                            item.target.classList.toggle('overflow-hidden')
                        });
                    });

                    window.addEventListener("load", async () => {
                        console.log(newdata);
                        let datafetch = await fetch("/api/cabang/list/get");
                        filtereddata = await datafetch.json();
                        if (admin == false) {
                            filtereddata.forEach((item, index) => {
                                document.getElementById('cabang').innerHTML = `
               <option value="${getusercabang}">${getusercabang}</option>
               `;
                            });

                            let pdldatafetch = await fetch("/api/pdl/list/get");
                            let filtereddatapdl = await pdldatafetch.json();
                            document.getElementById('pdl').innerHTML = `
            <option value="pdl">pdl</option>

             `;
                            filtereddatapdl.forEach((item, index) => {
                                if (item.cabang.nama == getusercabang) {
                                    document.getElementById('pdl').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;

                                }
                            });

                            document.getElementById('cabang').classList.add('pointer-events-none');
                            document.getElementById('cabang').classList.add('bg-gray-200');
                            document.getElementById('cabang').classList.remove('bg-transparent');


                        } else {
                            filtereddata.forEach((item, index) => {
                                document.getElementById('cabang').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;
                            });

                        }
                    });

                    document.getElementById('cabang').addEventListener("input", async (e) => {

                        let datafetch = await fetch("/api/pdl/list/get");
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
                            newdata.forEach((item, index) => {
                                if (item.anggota.pdl.cabang.nama == e.target.value) {
                                    listtablebodyanggota.innerHTML += innertabledropping(index, item);
                                } else if (e.target.value == 'cabang') {
                                    listtablebodyanggota.innerHTML += innertabledropping(index, item);
                                }
                            });

                        });
                    });
                    document.getElementById('tanggal_dropping').addEventListener("input", async (e) => {
                        document.getElementById('search').value = '';

                        if (admin) {
                            document.getElementById('cabang').innerHTML = `
                                                                    <option value="cabang">cabang</option>

                                         `;
                            let datafetch = await fetch("/api/cabang/list/get");
                            filtereddata = await datafetch.json();
                            filtereddata.forEach((item, index) => {
                                document.getElementById('cabang').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;
                            });



                        }

                        document.getElementById('pdl').innerHTML = `
                                                                    <option value="pdl">pdl</option>

                                         `;
                        if (admin == false) {
                            let pdldatafetch = await fetch("/api/pdl/list/get");
                            let filtereddatapdl = await pdldatafetch.json();
                            document.getElementById('pdl').innerHTML = `
            <option value="pdl">pdl</option>

             `;

                            filtereddatapdl.forEach((item, index) => {
                                if (item.cabang.nama == getusercabang) {
                                    document.getElementById('pdl').innerHTML += `
               <option value="${item.nama}">${item.nama}</option>
               `;

                                }
                            });

                        }

                        newdata = data.filter((item) =>
                            item.tanggal_dropping.toLowerCase().includes(e.target.value)
                        );


                        listtablebodyanggota.innerHTML = "";
                        if (admin == false) {
                            newdata = newdata.filter(item => item.anggota.pdl.cabang.nama === getusercabang)
                        }
                        newdata.forEach((item, index) => {
                            listtablebodyanggota.innerHTML += innertabledropping(index, item);
                        });

                    });
                </script>
            </tbody>
        </table>
    </div>
@endsection
