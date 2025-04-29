<nav class="w-full border-b border-gray-100 py-3 px-6">
    <div id="nav-left" class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Logo vasemmalle (mobiilissa näkyy yhdessä valikon kanssa) -->

        <x-application-logo />

        <!-- Keskilinkit (mobiilissa menevät allekkain, desktopissa vierekkäin) -->
        <nav class="sm:order-2 w-full sm:w-auto">
            <ul class="flex flex-col sm:flex-row justify-start sm:justify-center gap-4">
                <li>
                    <x-nav-link href="/" :active="request()->is('/')">
                        Kotisivu
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/blog" :active="request()->is('blog*')">
                        Blogi
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/about" :active="request()->is('about')">
                        Tietoa ALH-Hoidoista
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/contact" :active="request()->is('contact')">
                        Tilaa Uutiskirje
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/contact" :active="request()->is('contact')">
                        Varaa ALH-Hoito
                    </x-nav-link>
                </li>
            </ul>
        </nav>

        <div id="nav-right" class="sm:order-3 flex items-center gap-4">
            @auth
                @include('layouts.partials.header-right-auth')
            @else
                @include('layouts.partials.header-right-guest')
            @endauth
        </div>
    </div>
</nav>
