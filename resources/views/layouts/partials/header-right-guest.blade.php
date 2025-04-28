<!-- Vieraskäyttäjälle näkyvät linkit, kuten "Kirjaudu Sisään" ja "Liity" -->
<ul class="hidden sm:flex gap-4">
    <li>
        <x-nav-link href="/login" :active="request()->is('login')" >
            Kirjaudu Sisään
        </x-nav-link>
    </li>
    <li>
        <x-nav-link href="/register" :active="request()->is('register')" >
            Liity
        </x-nav-link>
    </li>
</ul>


<!-- Mobiilissa näkyvät linkit Jetstreamin x-nav-link -komponentilla ilman pallukoita -->
<div class="sm:hidden flex flex-col items-center gap-2 mt-2">
    <x-nav-link href="/login" :active="request()->is('login')" class="text-sm text-gray-500 hover:text-blue-500">
        Kirjaudu Sisään
    </x-nav-link>
    <x-nav-link href="/register" :active="request()->is('register')" class="text-sm text-gray-500 hover:text-blue-500">
        Liity
    </x-nav-link>
</div>

