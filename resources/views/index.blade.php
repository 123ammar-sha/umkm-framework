<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Direct - Katalog UMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">

        <!-- Header Halaman -->
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Formulir Pemesanan</h2>
            <p class="text-sm text-gray-600 mt-1">Isi data pemesan di bawah ini untuk melanjutkan pemesanan.</p>
        </div>

        <!-- Peringatan Ringkasan Error (Jika Validasi Gagal) -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r">
                <p class="font-semibold text-sm">Terjadi kesalahan input:</p>
                <ul class="list-disc list-inside text-xs mt-1 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulir Transaksi -->
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <!-- Input: Nama Lengkap -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full px-3 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Budi Santoso">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input: Nomor WhatsApp -->
            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp /
                    HP</label>
                <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                    class="w-full px-3 py-2 border @error('phone_number') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: 081234567890">
                @error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input: Alamat Lengkap -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap
                    Pengiriman</label>
                <textarea name="address" id="address" rows="3"
                    class="w-full px-3 py-2 border @error('address') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Jalan, No. Rumah, RT/RW, Kecamatan, Kota">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input: Total Harga -->
            <div class="mb-6">
                <label for="total_price" class="block text-sm font-medium text-gray-700 mb-1">Total Pesanan (Rp)</label>
                <input type="number" name="total_price" id="total_price" value="{{ old('total_price', 150000) }}"
                    class="w-full px-3 py-2 border @error('total_price') border-red-500 @else border-gray-300 @enderror rounded-md bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('total_price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2.5 px-4 rounded-md font-semibold hover:bg-blue-700 transition duration-200">
                Buat Pesanan Sekarang
            </button>
        </form>
    </div>
</body>

</html>
