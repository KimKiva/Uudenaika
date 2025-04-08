# Käynnistetään uusi PowerShell-ikkuna komennolla "npm run dev"
Start-Process -FilePath "powershell.exe" -ArgumentList "-NoExit", "-Command", "npm run dev"

# Käynnistetään uusi PowerShell-ikkuna komennolla "php artisan serve"
Start-Process -FilePath "powershell.exe" -ArgumentList "-NoExit", "-Command", "php artisan serve"
