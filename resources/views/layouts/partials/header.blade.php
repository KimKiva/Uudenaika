<header class="w-full border-b border-gray-100 py-3 px-6">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Logo vasemmalle (mobiilissa näkyy yhdessä valikon kanssa) -->
        <div
            class="text-xl font-semibold text-blue-600 sm:order-1 w-full sm:w-auto flex justify-between sm:justify-start">
            <a href="/">Uudenaika</a>
        </div>

        <!-- Keskilinkit (mobiilissa menevät allekkain, desktopissa vierekkäin) -->
        <nav class="sm:order-2 w-full sm:w-auto">
            <ul class="flex flex-col sm:flex-row justify-start sm:justify-center gap-4">
                <li><a class="text-sm text-blue-500 hover:text-blue-900" href="/">Kotisivu</a></li>
                <li><a class="text-sm text-gray-500 hover:text-blue-500" href="/blog">Blogi</a></li>
                <li><a class="text-sm text-gray-500 hover:text-blue-500" href="/about">Tietoa ALH-Hoidoista</a></li>
                <li><a class="text-sm text-gray-500 hover:text-blue-500" href="/contact">Tilaa Uutiskirje</a></li>
                <li><a class="text-sm text-gray-500 hover:text-blue-500" href="/contact">Varaa ALH-Hoito</a></li>
            </ul>
        </nav>

        <!-- Oikea reuna: vieraskäyttäjä tai kirjautunut käyttäjä -->
        <div class="sm:order-3 flex items-center gap-4">
            @guest
            <!-- Vieraskäyttäjä -->
            @include('layouts.partials.header-right-guest')
            @endguest

            @auth
            <!-- Kirjautunut käyttäjä -->
            @include('layouts.partials.header-right-auth')
            @endauth
        </div>
    </div>
</header>