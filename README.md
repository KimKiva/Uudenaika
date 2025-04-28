# Uudenaika Laravel-nettiaplikaatio Dokumentaatio

> Huom! Tämän ohjeistuksen toimivuus edellyttää, että kaikki tarvittavat riippuvuudet, ympäristöt ja ohjelmistot (kuten PHP, Composer ja Laravel) on asennettu oikein kehitysympäristöösi.

Alta löydät linkit ohjeistuksiin:

- [PHP:n asennus](https://www.php.net/manual/en/install.php)
- [Composerin asennus](https://getcomposer.org/download/)
- [Xampin asennus](https://www.apachefriends.org/index.html)
- [Node.js asennus](https://nodejs.org/)
- [Laravelin asennus](https://laravel.com/docs/12.x/installation)
- [Jetstreamin asennus](https://jetstream.laravel.com/installation.html)
- [Gitin asennus ja käyttö](https://git-scm.com/)

---

## Repositoryn kloonaus GitHubista

1. Pidä huoli, että sinulla on tallessa alkuperäinen `.env`-tiedosto.  
2. Avaa Git-terminaali kansiossa, johon haluat kloonata repositoryn.
3. Kirjoita komento:
    ```bash
    git clone https://github.com/KimKiva/Uudenaika.git
    ```
4. Anna salasana tai tunnistaudu selaimen kautta GitHubiin.
5. Odota, että kloonaus valmistuu ilman virheilmoituksia.

---

## Muutosten työntö GitHubiin

1. Avaa Git-terminaali kloonatussa kansiossa.
2. Lisää muutokset:
    ```bash
    git add .
    ```
3. Tee commit:
    ```bash
    git commit -m "Yhteenveto tehdyistä muutoksista"
    ```
4. Pushaa muutokset:
    ```bash
    git push origin main
    ```

---

## Laravel-ympäristön pystyttäminen

1. Käynnistä Xamppista `MySQL` ja `Apache` serverit.
2. Avaa VSCode kloonatussa repositoryssa.
3. Aja Powershellissä komento:
    ```bash
    .\initEnvironment.ps1
    ```
4. Jos tulee käyttöoikeusvirhe, aja:
    ```bash
    Set-ExecutionPolicy RemoteSigned -Scope CurrentUser -Force
    .\initEnvironment.ps1
    ```
5. Kun skripti onnistuu, jatka:
    ```bash
    .\initConcurrent.ps1
    ```
6. Nyt sinulla on kehitysympäristö käynnissä.

---

## Datan luonti testausta varten

> **Huom:** Älä suorita tuotantotietokannassa!

1. Varmista että `DatabaseSeeder.php` on konfiguroitu oikein.
2. Aja komento:
    ```bash
    php artisan db:seed
    ```

---

## Laravel-ympäristön pystyttäminen manuaalisesti (jos skripti ei toimi)

1. Käynnistä MySQL ja Apache Xamppista.
2. Avaa VSCode kloonatussa repositoryssa.
3. Kopioi .env-tiedosto:
    ```bash
    Copy-Item .env.example .env
    ```
4. Asenna riippuvuudet:
    ```bash
    composer install
    ```
5. Luo app-avain:
    ```bash
    php artisan key:generate
    ```
6. Asenna Node.js-paketit:
    ```bash
    npm install
    ```
7. Avaa kaksi terminaalia:
    - Toisessa aja:
        ```bash
        npm run dev
        ```
    - Toisessa aja:
        ```bash
        php artisan serve
        ```

---

# Linkkejä

- [Laravelin viralliset dokumentit](https://laravel.com/docs/12.x/installation)
- [Jetstream dokumentaatio](https://jetstream.laravel.com/installation.html)
- [GitHub repo: Uudenaika](https://github.com/KimKiva/Uudenaika.git)
- YouTube-videot:
  - [Video 1](https://youtu.be/n04w2SzGr_U?si=j2PsWgbTrpEwX99M)
  - [Video 2](https://youtu.be/-3Xz7tuKyMI?si=NQw1N2VKAu7fRtm1)
  - [Video 3](https://youtu.be/qAP3hsFfWr8?si=zya6MIjk8uDQk8Bw)
  - [Video 4](https://youtu.be/qZQmCfkmbNA?si=nfqr799MXbFB9TAW)
  - [Video 5](https://youtu.be/HkdAHXoRtos?si=HvLNQLgRtLJ8Nefw)

---
