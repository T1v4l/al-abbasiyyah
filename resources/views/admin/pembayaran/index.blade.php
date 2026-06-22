<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display font-bold text-3xl text-brand-gray leading-tight">
            Konfirmasi Pembayaran
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Notifikasi akan muncul di sini setelah konfirmasi berhasil --}}
            @if (session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Murid</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orang Tua</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Pembayaran</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl. Dibuat</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($pembayaranMenunggu as $siswa)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $siswa->nama_lengkap }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $siswa->user->name }}</td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{-- Cek jika metodenya adalah Transfer --}}
                            @if($siswa->metode_pembayaran == 'Transfer Bank')
                                @if($siswa->status_pembayaran == 'Menunggu Konfirmasi')
                                    {{-- Muncul setelah user upload bukti --}}
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Menunggu Konfirmasi (Transfer)
                                    </span>
                                @else
                                    {{-- Muncul saat user sudah pilih transfer tapi belum upload bukti --}}
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                        Menunggu Pembayaran (Transfer)
                                    </span>
                                @endif
                            
                            {{-- Cek jika metodenya adalah Bayar Langsung --}}
                            @elseif($siswa->metode_pembayaran == 'Bayar Langsung')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu Pembayaran (Langsung)
                                </span>
                            
                            {{-- Status cadangan jika ada status lain --}}
                            @else
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    {{ $siswa->status_pembayaran }}
                                </span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $siswa->updated_at->format('d M Y, H:i') }}</td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-4">
                                
                                @if($siswa->metode_pembayaran == 'Transfer Bank' && $siswa->bukti_pembayaran)
                                    <a href="{{ asset('storage/' . $siswa->bukti_pembayaran) }}" target="_blank" class="text-blue-600 hover:text-blue-900 font-semibold underline">
                                        Lihat Bukti
                                    </a>
                                @elseif($siswa->metode_pembayaran == 'Bayar Langsung')
                                    <span class="text-teal-600 italic text-xs font-semibold">(Bayar Tunai)</span>
                                @else
                                    <span class="text-gray-400 italic text-xs">(Belum Upload)</span>
                                @endif

                                <div x-data="{ showModal: false }">
                                    <form id="form-konfirmasi-{{ $siswa->id }}" action="{{ route('admin.pembayaran.konfirmasi', $siswa->id) }}" method="POST" class="hidden">
                                        @csrf
                                    </form>

                                    <button type="button" @click="showModal = true" class="text-brand-teal hover:text-brand-teal-dark font-bold px-3 py-1 bg-teal-50 rounded hover:bg-teal-100 transition">
                                        Konfirmasi
                                    </button>

                                    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" style="display: none;">
                                        <div @click.away="showModal = false" class="bg-white rounded-2xl shadow-xl max-w-md mx-auto p-6 sm:p-8 text-center whitespace-normal">
                                            
                                            <div class="w-16 h-16 rounded-full bg-brand-teal-light flex items-center justify-center mx-auto">
                                                <svg class="w-10 h-10 text-brand-teal-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                                </svg>
                                            </div>

                                            <h3 class="text-2xl font-bold font-display text-brand-gray mt-4">Konfirmasi Pembayaran</h3>
                                            
                                            <p class="mt-2 text-gray-600">
                                                Anda yakin ingin mengonfirmasi pembayaran untuk murid: <br>
                                                <strong class="text-brand-teal-dark font-semibold">{{ $siswa->nama_lengkap }}</strong>?
                                            </p>
                                            
                                            <div class="mt-8 flex justify-center space-x-4">
                                                <button type="button" @click="showModal = false" class="px-6 py-3 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold transition">
                                                    Batal
                                                </button>
                                                
                                                <button type="button" onclick="document.getElementById('form-konfirmasi-{{ $siswa->id }}').submit();" class="px-6 py-3 rounded-lg bg-brand-teal text-white hover:bg-brand-teal-dark font-semibold transition shadow-lg hover:shadow-md">
                                                    Ya, Konfirmasi
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">
                            Tidak ada pembayaran yang perlu dikonfirmasi saat ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
                
                @if($pembayaranMenunggu->hasPages())
                    <div class="p-4 border-t border-gray-200">
                        {{ $pembayaranMenunggu->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>