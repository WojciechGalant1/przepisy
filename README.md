<style>
  /* Dodaj style dla opisu */
  .project-description {
    font-size: 16px;
    line-height: 1.5;
    color: #333;
    margin-bottom: 20px;
  }

  .functionality {
    font-weight: bold;
    margin-bottom: 10px;
  }

  .instructions {
    font-style: italic;
    margin-top: 20px;
  }
</style>

# Laravel Vue.js Inertia.js Przepisy Projekt

<div class="project-description">
  Projekt Przepisy to aplikacja internetowa umożliwiająca użytkownikom dodawanie, ocenianie i przeglądanie przepisów kulinarnych. Została zbudowana przy użyciu frameworka Laravel jako backendu oraz Vue.js wraz z Inertia.js do dynamicznego renderowania interfejsu użytkownika bez konieczności przeładowywania strony.
</div>

## Funkcjonalności

<div class="functionality">Dodawanie Przepisów</div>
Użytkownicy mogą dodawać nowe przepisy wraz z:

- Tytułem
- Zdjęciem
- Opisem
- Rodzajem (np. śniadanie, obiad, deser itp.)
- Składnikami, ilościami i jednostką (np. gram, litr, sztuka itp.)

<div class="functionality">Ocenianie Przepisów</div>
Użytkownicy mają możliwość oceniania przepisów innych użytkowników w skali od 1 do 5.

...

## Instrukcje uruchomienia

<div class="instructions">
  Sklonuj repozytorium z GitHub.
  Zainstaluj zależności PHP przy użyciu Composer: composer install.
  Zainstaluj zależności JavaScript przy użyciu npm: npm install.
  Skonfiguruj plik .env, ustawiając odpowiednie parametry bazy danych i innych ustawień.
  Uruchom migracje bazy danych: php artisan migrate.
  Uruchom serwer deweloperski: php artisan serve.
  Uruchom kompilację zasobów JavaScript: npm run dev.
</div>
