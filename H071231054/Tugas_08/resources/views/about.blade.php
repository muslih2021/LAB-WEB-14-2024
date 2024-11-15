<!-- resources/views/about.blade.php -->

@extends('layouts.main')

@section('content')
<div class="container mx-auto my-12 px-4 py-10">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">About Minecraft</h1>
        <p class="text-lg text-gray-600">Discover the World of Minecraft - where creativity meets endless possibilities!</p>
    </div>
    
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Section 1: Overview -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Overview</h2>
            <p class="text-gray-700">Minecraft is a sandbox game that allows players to explore, create, and survive in a blocky, procedurally generated 3D world. Players can build structures, mine resources, and face challenges in various environments.</p>
        </div>

        <!-- Section 2: Features -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Features</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>Creative Mode: Build anything you can imagine with unlimited resources.</li>
                <li>Survival Mode: Gather resources, craft tools, and survive against mobs.</li>
                <li>Multiplayer: Play with friends in a shared world.</li>
                <li>Adventure Mode: Explore custom maps and play stories crafted by others.</li>
            </ul>
        </div>

        <!-- Section 3: Experience the Adventure -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Experience the Adventure</h2>
            <p class="text-gray-700">Whether you want to unleash your creativity, survive in a challenging environment, or explore vast biomes, Minecraft has something for everyone. Join millions of players around the world and start your adventure today!</p>
        </div>

        <!-- Section 4: Join the Community -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Join the Community</h2>
            <p class="text-gray-700">Minecraft is more than just a game; it's a community. From building massive structures to creating mods, the community is filled with passionate players. Join forums, participate in events, and share your creations with the world!</p>
        </div>
    </div>
</div>
@endsection
