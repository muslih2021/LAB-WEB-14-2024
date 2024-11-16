<header>
    <div class="font-mono container mx-auto px-4">
        <nav class="fixed top-0 left-0 w-full bg-[#00b3b4] z-50">
            <ul class="flex justify-center items-center space-x-6 py-4">
                <li>
                    <a href="{{ route('home') }}" class="text-white text-lg font-medium px-4 py-2 rounded-lg hover:bg-cyan-300 hover:font-white">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="text-white text-lg font-medium px-4 py-2 rounded-lg hover:bg-cyan-300 hover:font-white">
                        about
                    </a>
                </li>
                <li>
                    <a href="{{ route('gallery') }}" class="text-white text-lg font-medium px-4 py-2 rounded-lg hover:bg-cyan-300 hover:font-white">
                        Gallery
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
