<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-display font-bold text-2xl text-brand-gray leading-tight">Manajemen Murid</h2>
            <a href="{{ route('admin.siswa.create') }}" class="inline-block bg-brand-orange text-white font-bold px-4 py-2 rounded-lg shadow-md hover:bg-brand-orange-dark transition">
                + Tambah Murid
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Notifikasi untuk status update, delete, create --}}
            @if (session('status'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg" role="alert"><p>{{ session('status') }}</p></div>
            @endif
            {{-- Notifikasi untuk konfirmasi pembayaran tunai --}}
            @if (session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg" role="alert"><p>{{ session('success') }}</p></div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Nama Murid</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Orang Tua</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Status Murid</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Status Pembayaran</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($siswas as $siswa)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"><div class="font-semibold text-brand-gray">{{ $siswa->nama_lengkap }}</div></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $siswa->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $siswa->status == 'Siswa Aktif' || $siswa->status == 'Diterima' ? 'bg-green-100 text-green-800' : ($siswa->status == 'Menunggu Verifikasi' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $siswa->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($siswa->status_pembayaran == 'Lunas') bg-green-100 text-green-800
                                            @elseif($siswa->status_pembayaran == 'Menunggu Konfirmasi') bg-blue-100 text-blue-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ $siswa->status_pembayaran }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center justify-center gap-2">
                                            {{-- Tombol Detail Baru --}}
                                            <a href="{{ route('admin.siswa.show', $siswa) }}" class="text-white bg-blue-600 hover:bg-blue-700 font-bold py-2 px-3 rounded-lg text-xs">Detail</a>
                                            
                                            {{-- Tombol Edit Anda (tetap sama) --}}
                                            <a href="{{ route('admin.siswa.edit', $siswa) }}" class="text-white bg-brand-teal hover:bg-brand-teal-dark font-bold py-2 px-3 rounded-lg text-xs">Edit</a>
                                            
                                            {{-- Tombol Hapus Anda (tetap sama) --}}
                                            <form action="{{ route('admin.siswa.destroy', $siswa) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-bold py-2 px-3 rounded-lg text-xs">Hapus</button>
                                            </form>

                                            {{-- Tombol Konfirmasi Tunai (kondisional) --}}
                                            @if($siswa->status_pembayaran == 'Menunggu Pembayaran (Langsung)')
                                                
            
                                                <form action="{{ route('admin.pembayaran.konfirmasi', $siswa->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin mengonfirmasi pembayaran tunai untuk murid ini?');">
                                                    @csrf
                                                    <button type="submit" class="font-bold py-2 px-3 rounded-lg text-white bg-brand-orange hover:bg-brand-orange-dark text-xs">Konfirmasi Tunai</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        Tidak ada data murid yang ditemukan.
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