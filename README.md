# Bartłomiej Ert — motyw WordPress (Marketing Strategiczny)

Nowoczesny, ciemny motyw portfolio dla specjalisty ds. marketingu i płatnych
kampanii reklamowych (Meta Ads, Google Search Ads, LinkedIn Ads). Powstał na
bazie statycznej strony i został przekonwertowany na w pełni działający,
instalowalny motyw WordPress.

## ⬇️ Pobierz motyw (gotowy .zip)

**[➡️ Pobierz `bartlomiej-ert.zip`](../../raw/add-wordpress-theme/bartlomiej-ert.zip)**

> Link uruchamia pobieranie gotowej paczki motywu, którą wgrywasz w WordPressie.

## 🚀 Instalacja w WordPress

1. Zaloguj się do panelu WordPress (`/wp-admin`).
2. Przejdź do **Wygląd → Motywy → Dodaj nowy → Wyślij motyw na serwer**.
3. Wybierz pobrany plik `bartlomiej-ert.zip` i kliknij **Zainstaluj**.
4. Kliknij **Włącz**.

To wszystko. Po aktywacji motyw **automatycznie**:

- tworzy podstrony: *Usługi, Proces, Realizacje, O mnie, Kontakt* (z właściwymi szablonami),
- buduje menu główne i menu w stopce,
- ustawia stronę startową.

## ⚙️ Konfiguracja (bez kodu)

Przejdź do **Wygląd → Dostosuj**, aby zmienić:

- **Marka i logo** — imię/nazwisko, skrót w logo, tagline, własne logo.
- **Dane kontaktowe** — e-mail, telefon, godziny, LinkedIn.
- **Metryki i statystyki** — lata doświadczenia, liczba projektów, ROAS, CPA.

Formularz kontaktowy wysyła wiadomości na adres e-mail ustawiony w sekcji
**Dane kontaktowe** (wykorzystuje `wp_mail`, z zabezpieczeniem nonce + honeypot).

## ✨ Co zostało ulepszone względem statycznej wersji

- Pełna integracja z WordPress (menu, Customizer, logo, tłumaczenia).
- **Responsywne menu mobilne** (hamburger) — wcześniej nawigacja znikała na telefonach.
- **Działający formularz kontaktowy** wysyłający e-mail (zamiast atrapy).
- Edytowalne treści (dane kontaktowe, metryki) bez dotykania kodu.
- Automatyczna konfiguracja stron i menu po instalacji.

## 🧩 Struktura motywu

```
bartlomiej-ert/
├── style.css                # nagłówek motywu + pełne style
├── functions.php            # konfiguracja, zasoby, menu
├── header.php / footer.php
├── front-page.php           # strona główna
├── page.php / index.php     # szablony ogólne / zapasowe
├── template-uslugi.php      # szablon: Usługi
├── template-proces.php      # szablon: Proces + FAQ
├── template-realizacje.php  # szablon: Realizacje (case studies)
├── template-o-mnie.php      # szablon: O mnie
├── template-kontakt.php     # szablon: Kontakt (formularz)
├── assets/js/theme.js       # nawigacja, animacje, FAQ
├── inc/                     # customizer, formularz, auto-setup
└── screenshot.png
```

## 📝 Uzupełnianie realizacji

Sekcja *Realizacje* zawiera przygotowane sloty na case studies (metryki, zrzuty
ekranu, dashboard). Instrukcja uzupełniania znajduje się bezpośrednio na stronie
(bloki oznaczone jako „Do uzupełnienia") oraz w pliku `template-realizacje.php`.

---

*Wymagania: WordPress 5.9+ · PHP 7.4+*
