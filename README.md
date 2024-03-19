
Laravel Vue.js Inertia.js Przepisy Projekt
Projekt Przepisy to aplikacja internetowa umożliwiająca użytkownikom dodawanie, ocenianie i przeglądanie przepisów kulinarnych. Została zbudowana przy użyciu frameworka Laravel jako backendu oraz Vue.js wraz z Inertia.js do dynamicznego renderowania interfejsu użytkownika bez konieczności przeładowywania strony.

Funkcjonalności
Dodawanie Przepisów
Użytkownicy mogą dodawać nowe przepisy wraz z:

Tytułem
Zdjęciem
Opisem
Rodzajem (np. śniadanie, obiad, deser itp.)
Składnikami, ilościami i jednostką (np. gram, litr, sztuka itp.)
Ocenianie Przepisów
Użytkownicy mają możliwość oceniania przepisów innych użytkowników w skali od 1 do 5.

Ocena Średnia
System oblicza średnią ocen przepisu.

Komentarze
Użytkownicy mogą dodawać i wyświetlać komentarze do przepisów.

Wyszukiwanie Przepisów
Użytkownicy mogą przeszukiwać bazę danych przepisów za pomocą paska wyszukiwania.

Profil Użytkownika
Każdy użytkownik ma swój profil, gdzie może zobaczyć dodane przepisy oraz edytować swoje dane (login, email, hasło) i usunąć konto.

Instrukcje uruchomienia
Sklonuj repozytorium z GitHub.
Zainstaluj zależności PHP przy użyciu Composer: composer install.
Zainstaluj zależności JavaScript przy użyciu npm: npm install.
Skonfiguruj plik .env, ustawiając odpowiednie parametry bazy danych i innych ustawień.
Uruchom migracje bazy danych: php artisan migrate.
Uruchom serwer deweloperski: php artisan serve.
Uruchom kompilację zasobów JavaScript: npm run dev.
Wsparcie
Dla dalszych informacji na temat frameworków Laravel, Vue.js i Inertia.js, proszę odwiedzić oficjalną dokumentację:

Laravel Documentation
Vue.js Documentation
Inertia.js Documentation
Licencja
Ten projekt jest dostępny na zasadach licencji MIT.
