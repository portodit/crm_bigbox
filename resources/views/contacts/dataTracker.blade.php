@extends('layouts.app')

@section('content')
    <div class="px-1 py-8">
        <!-- Heading: Data Leads -->
        <h1 class="text-black font-poppins text-[25px] font-normal leading-[120%] mb-6">Data Leads</h1>

        <!-- Data Tracker Container -->
        <div
            class="datatracker-container flex flex-col items-start gap-[7.568px] p-[18.135px] rounded-[11.35px] border-[0.95px] border-[#EAECF0] w-full">

            <!-- Top Container -->
            <div class="top-container flex w-full items-center">
                <!-- Search Button -->
                <div class="relative flex items-center">
                    <input type="text"
                        class="pl-10 pr-4 py-2 h-[41.622px] w-full text-[#667085] text-[13.243px] font-poppins font-normal leading-[18.919px] placeholder-[#667085] rounded-[11.351px] border border-[#D0D5DD] bg-[#F9FAFB] focus:outline-none focus:ring-0"
                        placeholder="Cari kata kunci..." />
                    <img src="{{ asset('icons/search.svg') }}" alt="Search Icon" class="absolute left-3 w-[16px] h-[16px]" />
                </div>


                <!-- Filter Button -->
                <button
                    class="ml-[250px] flex items-center h-[41.622px] px-[18.919px] gap-[7.568px] rounded-[11.351px] bg-[#F9FAFB] border">
                    <span class="text-[#667085] text-[13.243px] font-poppins font-semibold whitespace-nowrap">Pilih
                        Filter</span>
                    <img src="{{ asset('icons/filter.svg') }}" alt="Filter Icon" class="w-[16px] h-[16px]" />
                </button>


                <!-- Tambah Lead Button -->
                <button
                    class="ml-[22px] flex items-center h-[41.622px] px-[18.919px] gap-[7.568px] rounded-[11.351px] bg-[#0549CF] text-white"
                    onclick="showPopup()">
                    <span class="text-[13.243px] font-poppins font-semibold whitespace-nowrap">Tambah Lead</span>
                    <img src="{{ asset('icons/add.svg') }}" alt="Add Icon" class="w-[16px] h-[16px]" />
                </button>


                <!-- Import Button -->
                <button
                    class="ml-[22px] flex items-center h-[41.622px] px-[18.919px] gap-[7.568px] rounded-[11.351px] bg-[#DAE4F8]">
                    <span class="text-[#032C7C] text-[13.243px] font-poppins font-semibold whitespace-nowrap">Import
                        xlsx/csv</span>
                    <img src="{{ asset('icons/add_blue.svg') }}" alt="Add Blue Icon" class="w-[16px] h-[16px]" />
                </button>
            </div>

            <!-- Table Section -->
            <div class="mt-5 w-full table-container">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-[#F2F4F7] text-black text-xs font-bold">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Nomor Telepon</th>
                            <th class="px-4 py-2">Pekerjaan</th>
                            <th class="px-4 py-2">Perusahaan</th>
                            <th class="px-4 py-2">Lokasi</th>
                            <th class="px-4 py-2">Lead Status</th>
                            <th class="px-4 py-2">PIC</th>
                            <th class="px-4 py-2">Action</th> <!-- Kolom Action -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                            <tr class="border-t border-[#D0D5DD]">
                                <td class="px-4 py-2 text-sm text-[#1D2939]">{{ $contact->id }}</td>
                                <td class="px-4 py-2 text-sm text-[#1D2939]">{{ $contact->date_added }}</td>
                                <td class="px-4 py-2 text-sm text-[#1D2939]">{{ $contact->individual_name }}</td>
                                <td class="px-4 py-2 text-sm text-[#1D2939]">{{ $contact->email }}</td>
                                <td class="px-4 py-2 text-sm text-[#1D2939]">{{ $contact->phone }}</td>
                                <td class="px-4 py-2 text-sm text-[#1D2939]">{{ $contact->job_title }}</td>
                                <td class="px-4 py-2 text-sm text-[#1D2939]">{{ $contact->company_name }}</td>
                                <td class="px-4 py-2 text-sm text-[#1D2939]">{{ $contact->location }}</td>
                                <td class="px-4 py-2 text-sm">
                                    <span
                                        class="inline-block px-2 py-1 rounded text-white whitespace-nowrap {{ $contact->lead_status == 'Hot Leads'
                                            ? 'bg-[#F54A45]'
                                            : ($contact->lead_status == 'Warm Leads'
                                                ? 'bg-[#FF931E]'
                                                : 'bg-[#0549CF]') }}">
                                        {{ $contact->lead_status }}
                                    </span>
                                </td>


                                <!-- Kolom PIC -->
                                <td class="px-4 py-2 text-sm text-center">
                                    @if ($contact->pic == null)
                                        <button class="text-red-600" title="No PIC">
                                            <img src="{{ asset('icons/nouser.svg') }}" alt="No PIC" class="w-4 h-4" />
                                            <!-- Ganti dengan gambar dari icons/nouser.svg -->
                                        </button>
                                    @else
                                        {{ $contact->pic }} <!-- Tampilkan nama PIC jika ada -->
                                    @endif
                                </td>

                                <!-- Kolom Action -->
                                <td class="px-4 py-2 text-sm text-center">
                                    <div class="flex items-center justify-center gap-2"> <!-- Tambahkan flex disini -->
                                        <!-- Tombol Edit -->
                                        <button
                                            class="flex justify-center items-center w-[30.965px] h-[30.965px] p-[4px] gap-[2px] rounded-[5.193px] bg-[#EFF4FF]">
                                            <img src="{{ asset('icons/edit.svg') }}" alt="Edit Icon" />
                                        </button>

                                        <!-- Tombol Delete -->
                                        <button
                                            class="flex justify-center items-center w-[30.965px] h-[30.965px] p-[4px] gap-[2px] rounded-[5.193px] bg-[#FEF3F2]">
                                            <img src="{{ asset('icons/delete.svg') }}" alt="Delete Icon" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="px-4 py-2 text-center">No contacts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

            <!-- Pagination Section -->
            <div class="mt-4 pagination-container">
                <!-- Pagination placeholder -->
            </div>
        </div>
    </div>



<div id="leadFormPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="flex flex-col gap-[36.862px] p-[30.256px] rounded-[11.128px] bg-[#FAFAFA] w-[700px] overflow-y-auto max-h-[90vh]">
        <h2 class="text-[#292929] font-poppins text-[20.052px] font-bold leading-[112%]">Tambah Leads Baru</h2>

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="individual_name" class="flex items-center font-poppins font-semibold">
                        Nama Lengkap <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="individual_name" name="individual_name"
                        placeholder="Masukkan nama lengkap kontak"
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2 placeholder-poppins"
                        required />
                </div>
                <div class="flex flex-col">
                    <label for="jobrole" class="flex items-center font-poppins font-semibold">
                        Pekerjaan <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="jobrole" name="jobrole" placeholder="Masukkan pekerjaan kontak"
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2 placeholder-poppins"
                        required />
                </div>
                <div class="flex flex-col">
                    <label for="location" class="flex items-center font-poppins font-semibold">
                        Domisili <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="location" name="location" placeholder="Masukkan domisili kontak"
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2 placeholder-poppins"
                        required />
                </div>
                <div class="flex flex-col">
                    <label for="company_name" class="flex items-center font-poppins font-semibold">
                        Perusahaan <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="company_name" name="company_name" placeholder="Masukkan nama perusahaan kontak"
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2 placeholder-poppins"
                        required />
                </div>
                <div class="flex flex-col">
                    <label for="email" class="flex items-center font-poppins font-semibold">
                        Email <span class="text-red-600">*</span>
                    </label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email kontak"
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2 placeholder-poppins"
                        required />
                </div>
                <div class="flex flex-col">
                    <label for="phone" class="flex items-center font-poppins font-semibold">
                        Phone <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="phone" name="phone" placeholder="Masukkan nomor telepon kontak"
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2 placeholder-poppins"
                        required />
                </div>
                <div class="flex flex-col">
                    <label for="date_added" class="flex items-center font-poppins font-semibold">
                        Tanggal Ditambahkan <span class="text-red-600">*</span>
                    </label>
                    <input type="date" id="date_added" name="date_added"
                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2 placeholder-poppins" />
                </div>
                <div class="flex flex-col">
                    <label for="stages" class="flex items-center font-poppins font-semibold">
                        Pilih Tahapan
                    </label>
                    <select id="stages" name="stages"
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2">
                        <option value="Proposal">Proposal</option>
                        <option value="Meeting">Meeting</option>
                        <option value="Calling">Calling</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="lead_status" class="flex items-center font-poppins font-semibold">
                        Pilih Lead Status
                    </label>
                    <select id="lead_status" name="lead_status"
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2">
                        <option value="Warm Leads">Warm Leads</option>
                        <option value="Cold Leads">Cold Leads</option>
                        <option value="Hot Leads">Hot Leads</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="follow_up_date" class="flex items-center font-poppins font-semibold">
                        Jadwal Follow Up <span class="text-red-600">*</span>
                    </label>
                    <input type="date" id="follow_up_date" name="follow_up_date"
                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required
                        class="h-[40px] rounded-[5.564px] border border-[#C5CFEF] text-[#333] text-left pl-2 placeholder-poppins" />
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between mt-4">
                <button type="button"
                    class="flex items-center justify-center py-2 px-4 rounded-[5.564px] bg-[#A5A5A5] font-poppins font-semibold"
                    onclick="closePopup()">
                    <span class="text-white">Batal</span>
                </button>
                <button type="submit"
                    class="flex items-center justify-center py-2 px-4 rounded-[5.564px] bg-[#0549CF] font-poppins font-semibold">
                    <img src="{{ asset('icons/update.svg') }}" alt="Update Icon" class="mr-2" />
                    <span class="text-white">Tambah</span>
                </button>
            </div>
        </form>
    </div>
</div>


@endsection
