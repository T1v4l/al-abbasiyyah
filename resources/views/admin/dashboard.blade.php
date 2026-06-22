<x-app-layout>
   <x-slot name="header">
    <div class="relative overflow-hidden -mb-10">
        {{-- Banner Gelap dengan Aksen Emas --}}
        <div class="relative bg-slate-900 p-7 rounded-tr-[100px] rounded-bl-[20px] rounded-tl-[20px] rounded-tl-[20px] rounded-br-[20px] shadow-xl border-l-8 border-amber-400">
            <div class="flex items-center gap-5">
                <div class="bg-amber-400 p-3 rounded-xl rotate-12 shadow-lg flex-shrink-0">
                    <svg class="w-8 h-8 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-display font-black text-3xl text-white tracking-tight">
                        Portal Admin <span class="text-amber-400">PaudQu</span>
                    </h2>
                    <p class="text-slate-400 text-sm font-medium mt-1">Selamat datang kembali! Pantau perkembangan sekolah hari ini.</p>
                </div>
            </div>
        </div>
    </div>
   </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-teal-50 p-3 rounded-2xl">
                            <svg class="w-8 h-8 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Murid Terdaftar</p>
                            <p class="font-display text-4xl font-bold text-brand-teal-dark">{{ $jumlahSiswa }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-amber-50 p-3 rounded-2xl">
                            <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Jurnal Kegiatan</p>
                            <p class="font-display text-4xl font-bold text-slate-800">{{ $jumlahJurnal }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-50 p-3 rounded-2xl">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Guru Aktif</p>
                            <p class="font-display text-4xl font-bold text-slate-800">{{ $jumlahGuru }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[40px] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                    <div>
                        <h3 class="font-display font-bold text-xl text-slate-800 italic">Pendaftar Baru</h3>
                        <p class="text-sm text-gray-500">Konfirmasi pendaftaran murid baru di sini.</p>
                    </div>
                    <a href="{{ route('admin.siswa.index') }}" class="text-brand-teal font-bold text-sm hover:underline">Lihat Semua</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Calon Murid</th>
                                <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Tanggal Daftar</th>
                                <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Status</th>
                                <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            
                            @forelse ($pendaftarBaru ?? [] as $siswa)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="h-10 w-10 rounded-full bg-brand-teal/10 flex items-center justify-center text-brand-teal font-bold uppercase">
                                                {{ substr($siswa->nama_lengkap, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-800">{{ $siswa->nama_lengkap }}</p>
                                                <p class="text-xs text-gray-500">NIK: {{ $siswa->nik }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-sm text-gray-600">
                                        {{ $siswa->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-8 py-5">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">
                                            {{ $siswa->status }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex justify-center gap-2">
                                
                                            <form action="{{ route('admin.pendaftar.terima', $siswa) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-white bg-brand-teal hover:bg-teal-700 font-bold py-2 px-4 rounded-lg transition duration-300">Terima</button>
                                            </form>
                                            <form action="{{ route('admin.pendaftar.tolak', $siswa) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-gray-700 bg-gray-200 hover:bg-gray-300 font-bold py-2 px-4 rounded-lg transition duration-300">Tolak</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">Semua Sudah Diverifikasi!</h3>
                                        <p class="mt-1 text-sm text-gray-500">Tidak ada pendaftar baru yang menunggu tindakan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>