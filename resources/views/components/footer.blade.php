<footer class="flex flex-col gap-4 text-black p-8 md:p-16 min-h-[35vh] border-t border-gray-400">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Logo Section -->
        <div class="flex justify-start">
            <img src="{{ asset('images/spacehublogo.png') }}" alt="logo" class="h-10">
        </div>

        <!-- Contact and Social Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <!-- Contact Us -->
            <div class="flex flex-col items-start">
                <h4 class="font-bold mb-5">Kontak Kami</h4>
                <p class="text-sm text-gray-500">hspace640@gmail.com</p>
            </div>

            <!-- Social Media -->
            <div class="flex flex-col items-start">
                <h4 class="font-bold mb-5">Sosial Media</h4>
                <a href="https://www.instagram.com/spacehub_id/" class="text-sm text-gray-500 hover:underline">Instagram</a>
                <a href="https://www.linkedin.com/in/spacehubid/" class="text-sm text-gray-500 hover:underline">LinkedIn</a>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="text-center mt-5 text-xs text-gray-500">
        <p>&copy; {{ date('Y') }} SpaceHub. All rights reserved.</p>
        <p>Menghubungkan Ruang Kerja, Memberdayakan Bisnis</p>
    </div>
</footer>
