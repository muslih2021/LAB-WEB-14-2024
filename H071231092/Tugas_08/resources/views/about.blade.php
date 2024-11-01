@extends('layouts.master')

@section('title', 'About')

@section('content')
    <div>
        <h1>About Us</h1>
        <div style="padding: 50px 40px">
            <div style="text-align: justify">
                <p style="display: flex; column-gap: 20px; padding: 20px;">
                    Capybara Go is a quirky, text-based roguelike RPG that invites players into the whimsical world of capybaras, developed by HABBY. 
                    Released in late August 2024, this adventure game lets players step into the role of a capybara, making choices to overcome various 
                    challenges and unravel mysteries. The gameplay focuses on forming alliances with other animal companions, collecting gear, and 
                    exploring diverse environments filled with randomized events and unpredictable outcomes. What makes Capybara Go unique is its 
                    lighthearted, chaotic approach, where each decision impacts the adventure’s outcome, making it perfect for fans of capybaras 
                    and rogue-style games alike. The game has been praised for its humor and engaging, randomized adventures, making every playthrough 
                    a fresh experience.
                </p>
                <p style="display: flex; column-gap: 20px; padding: 20px;">
                    Capybara Go! is a charming, mobile roguelike adventure game by Habby that lets players take on the role of a capybara in a vibrant, 
                    animal-filled world. Known for its quirky and humorous tone, the game is designed around capybaras navigating a whimsical wilderness 
                    full of other animals, hidden secrets, and humorous encounters. Gameplay involves decision-based adventures and luck-based elements 
                    typical of roguelikes, where choices shape the outcomes of various in-game events, often with a bit of randomness to keep each session 
                    fresh. The game is text-based but includes cute graphics, vibrant level designs, and a lively soundtrack to create an immersive and 
                    entertaining experience. Players can unlock customizations like outfits and accessories for their capybara character, enhancing 
                    personalization. Additionally, various levels with increasing challenges keep the gameplay engaging, while collectible items provide 
                    rewards and unlockables.
                </p>
            </div>
        </div>
        <p>This website was created to demonstrate basic laravel Blade templating skills.</p>
        <x-button title="Home" message="Return to the Home Page." />
    </div>
@endsection