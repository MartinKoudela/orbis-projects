<p align="center">
  <a href="https://orbiszlin.cz" target="_blank">
    <img src="/public/images/orbis-logo.png" width="300" alt="ORBIS Logo">
  </a>
</p>

# Instalace a spuštění

Tento dokument popisuje, jak projekt rozjet lokálně.

---

## Požadavky

- PHP 8.3+
- Composer 2.x+
- Node.js 20.x+ & npm
- SQLite / MySQL / PostgreSQL

---

## Postup inicializace

```bash
git clone https://github.com/MartinKoudela/orbis-projects.git
cd orbis-projects
composer run setup
```

Příkaz `setup` automaticky:

- nainstaluje PHP a JS závislosti
- vytvoří `.env` soubor z `.env.example`
- vygeneruje aplikační klíč
- spustí databázové migrace
- sestaví frontend assets

---

## Spuštění

```bash
composer run dev
```

Spustí souběžně vývojový server, frontu, log watcher a Vite.

---

## Konfigurace

Klíčové proměnné v `.env`:

| Proměnná | Výchozí | Popis |
|---|---|---|
| `APP_ACTIVE_AUTHOR` | *(prázdné)* | Slug šablony zobrazené na `/` (výherní/aktivní téma) |
| `APP_URL` | `http://localhost` | Veřejná URL aplikace |
| `DB_CONNECTION` | `sqlite` | Typ databáze (`sqlite`, `mysql`, `pgsql`) |

---

## Admin panel

Správa projektů, taxonomií a médií je dostupná na `/admin` přes [Filament](https://filamentphp.com).

Vytvoření administrátorského účtu:

```bash
php artisan make:filament-user
```

---

## Autor

Systém vytvořil **Martin Koudela**, student školy [ORBIS Zlín](https://orbiszlin.cz).

- Web: [martinkoudela.com](https://martinkoudela.com)
- GitHub: [@MartinKoudela](https://github.com/MartinKoudela)
- LinkedIn: [Martin Koudela](https://www.linkedin.com/in/martin-koudela-a5b645343/)
- E-mail: mk@martinkoudela.com
