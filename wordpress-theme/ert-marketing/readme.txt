=== Bartłomiej Ert — Marketing Strategiczny ===

Autorski motyw WordPress (portfolio specjalisty marketingu: Meta Ads, Google Ads, strony WWW).

== INSTALACJA ==

1. Spakuj folder "ert-marketing" do pliku ZIP (jeśli pobierasz gotowy ZIP — pomiń ten krok).
2. W panelu WordPress wejdź w: Wygląd → Motywy → Dodaj nowy → Wyślij motyw.
3. Wybierz plik ZIP i kliknij "Zainstaluj teraz".
4. Kliknij "Włącz".

== CO DZIEJE SIĘ PO AKTYWACJI ==

Motyw automatycznie:
- tworzy stronę startową oraz podstrony: Usługi, Proces, Realizacje, O mnie, Kontakt,
- ustawia stronę startową jako stronę główną witryny,
- włącza czytelne bezpośrednie odnośniki (/nazwa-strony/), jeśli nie były ustawione.

Nawigacja w nagłówku i stopce jest wbudowana w motyw — nie trzeba ręcznie tworzyć menu.

== EDYCJA TREŚCI ==

Treść podstron jest zaszyta w plikach szablonów (page-*.php), dzięki czemu wygląd
jest identyczny jak w projekcie. Aby zmienić teksty/liczby:
- Usługi:      page-uslugi.php
- Proces/FAQ:  page-proces.php
- Realizacje:  page-realizacje.php  (sekcja statystyk + bloki case study)
- O mnie:      page-o-mnie.php
- Kontakt:     page-kontakt.php
- Strona gł.:  front-page.php

Edycji dokonasz przez: Wygląd → Edytor plików motywu, albo edytując pliki przez FTP.

== REALIZACJE / ZRZUTY EKRANU ==

W page-realizacje.php znajdują się gotowe bloki "case-card" do uzupełnienia.
- Metryki: wpisz liczby w znaczniki .case-metric-val
- Screenshot: wgraj obraz w Mediach, wstaw jego URL do <img src="..."> i dodaj klasę
  has-image do otaczającego .screenshot-slot
- Dashboard: wstaw URL do <iframe src="..."> i dodaj klasę has-iframe do .iframe-slot

== WYMAGANIA ==

- WordPress 5.8+
- PHP 7.4+

== LICENCJA ==

GNU General Public License v2 lub nowsza.
