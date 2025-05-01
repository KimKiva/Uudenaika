# init.ps1 – Laravel Jetstreamin käynnistys PowerShellissä

Write-Host "Laravel Jetstream -aloitusskripti käynnissä..."

# 1. Tarkista ja kopioi .env
if (-Not (Test-Path ".env")) {
    if (Test-Path ".env.example") {
        Copy-Item ".env.example" ".env"
        Write-Host ".env kopioitu .env.example:sta"
    } else {
        Write-Host ".env.example ei löytynyt. Keskeytetään."
        exit
    }
} else {
    Write-Host ".env on jo olemassa, ohitetaan kopiointi."
}

# 2. Composer install
Write-Host "Asennetaan Composer-riippuvuudet..."
composer install

# 3. Laravel key:generate
Write-Host "Generoidaan APP_KEY..."
php artisan key:generate

# 4. Migrate
Write-Host "Ajetaan tietokantamigraatiot..."
php artisan migrate

# 4.5. Storage link
Write-Host "Luodaan symbolinen linkki storage-kansioon..."
php artisan storage:link

# 5. NPM asennus ja build
Write-Host "Asennetaan Node.js-paketit ja käännetään frontti..."
npm install
npm run build
