<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Katalog UMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md text-center">

        <!-- Ikon Berhasil -->
        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Berhasil Dibuat!</h2>
        <p class="text-gray-600 mb-6 text-sm">Terima kasih telah berbelanja. Berikut adalah rincian transaksi Anda:</p>

        <!-- Box Rincian Pesanan -->
        <div class="bg-gray-50 p-5 rounded-md text-left text-sm text-gray-700 space-y-3 mb-6 border">
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-500">ID Transaksi:</span>
                <span class="font-bold text-gray-800">#ORD-{{ str_pad($order['id'], 5, '0', STR_PAD_LEFT) }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-500">Nama Pemesan:</span>
                <span class="text-gray-800">{{ $order['name'] }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-500">Nomor WhatsApp:</span>
                <span class="text-gray-800">{{ $order['phone_number'] }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-500">Alamat Pengiriman:</span>
                <span class="text-right max-w-xs text-gray-800">{{ $order['address'] }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold text-gray-500">Total Pembayaran:</span>
                <span class="font-bold text-green-600">Rp {{ number_format($order['total_price'], 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-500">Status Transaksi:</span>
                <span class="bg-yellow-100 text-yellow-800 px-2.5 py-0.5 rounded text-xs uppercase font-bold">
                    {{ $order['status'] ?? 'PENDING' }}
                </span>
            </div>
        </div>

        @php
            // Menyusun format teks pesan otomatis ke WhatsApp
            $waNumber = '62895348705090';
            $waMessage =
                "Halo Admin UMKM, saya telah membuat pesanan direct:\n\n" .
                'ID Pesanan: #ORD-' .
                str_pad($order['id'], 5, '0', STR_PAD_LEFT) .
                "\n" .
                'Nama: ' .
                $order['name'] .
                "\n" .
                'Total: Rp ' .
                number_format($order['total_price'], 0, ',', '.') .
                "\n\n" .
                'Mohon info instruksi pembayaran. Terima kasih!';

            $waUrl = 'https://wa.me/' . $waNumber . '?text=' . urlencode($waMessage);
        @endphp

        <!-- Tombol Aksi -->
        <div class="space-y-3">
            <a href="{{ $waUrl }}" target="_blank"
                class="w-full bg-green-600 text-white py-2.5 px-4 rounded-md font-semibold hover:bg-green-700 transition duration-200 flex items-center justify-center gap-2">
                <!-- Ikon WhatsApp -->
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.205 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                </svg>
                Kirim Pesanan ke WhatsApp Admin
            </a>

            <a href="{{ route('checkout.index') }}"
                class="block w-full bg-gray-200 text-gray-700 py-2.5 px-4 rounded-md font-semibold hover:bg-gray-300 transition duration-200">
                Kembali ke Katalog
            </a>
        </div>

    </div>
</body>

</html>
