<footer class="bg-white text-black py-10 h-[30vh]">
    <div class="container mx-auto grid grid-cols-2">
        <div class="col-span-1">
            <img src="{{ asset('images/spacehublogo.png') }}" alt="logo" class="h-10">
        </div>
        <div class="col-span-1 flex flex-row justify-between items-start">
            <div class="flex flex-col">
                <h4 class="font-bold mb-5">Kontak Kami</h4>
                <p class="text-sm text-gray-500">hspace640@gmail.com</p>
            </div>
            <div class="flex flex-col">
                <h4 class="font-bold mb-5">Sosial Media</h4>
                <a href="https://www.instagram.com/spacehub_id/" class="text-sm text-gray-500 hover:underline">Instagram</a>
                <a href="https://www.linkedin.com/in/spacehubid/" class="text-sm text-gray-500 hover:underline">LinkedIn</a>
            </div>
        </div>
        
    </div>
    <div class="text-center mt-5 text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} SpaceHub. All rights reserved.</p>
        <p>Menghubungkan Ruang Kerja, Memberdayakan Bisnis</p>
    </div>
</footer>

{{-- <p>&copy; {{ date('Y') }} SpaceHub. All rights reserved.</p>
<p>Follow us on:
    <a href="https://twitter.com/spacehub" class="text-blue-400 hover:underline">Twitter</a>, --}}
