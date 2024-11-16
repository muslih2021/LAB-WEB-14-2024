<nav class="navbar navbar-dark bg-primary fixed-top">
<div class="container">
    <a class="navbar-brand" href="#">MathZone</a>
    <div class="d-flex"> 
        <ul class="navbar-nav ms-auto d-flex flex-row gap-3"> 
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'Home') ? 'active' : '' }}" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'About') ? 'active' : '' }}" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'Posts') ? 'active' : '' }}" href="/contact">Contact</a>
            </li>
        </ul>
    </div>
</div>
</nav>
