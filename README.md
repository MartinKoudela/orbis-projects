<p align="center">
  <a href="https://orbiszlin.cz" target="_blank">
    <img src="/public/images/orbis-logo.png" width="300" alt="ORBIS Logo">
  </a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13.x-ff2d20?style=flat&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.3+-777bb4?style=flat&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Filament-5.x-f59e0b?style=flat&logo=filament" alt="Filament">
  <img src="https://img.shields.io/badge/Spatie%20Media%20Library-11.x-ef4444?style=flat" alt="Spatie Media Library">
  <img src="https://img.shields.io/badge/Tailwind%20CSS-4.x-38bdf8?style=flat&logo=tailwindcss" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Vite-8.x-646cff?style=flat&logo=vite" alt="Vite">
<img src="https://img.shields.io/badge/License-PolyForm%20NC%201.0-blue?style=flat" alt="License">
</p>

# ORBIS — Studentské projekty

Webová platforma pro prezentaci studentských projektů školy [ORBIS Zlín](https://orbiszlin.cz). Systém spravuje databázi
projektů, jejich taxonomii a média. Každý student navíc vytváří vlastní vizuální šablonu v Blade/PHP — **design je zcela
na něm**, funkčnost zajišťuje platforma.

---

## Obsah

- [Rychlý start pro studenta](#rychlý-start-pro-studenta)
- [Dostupné proměnné](#dostupné-proměnné)
- [REST API](#rest-api)
- [Instalace a spuštění](SETUP.md)
- [Autor](#autor)

---

## Rychlý start pro studenta

Tento postup tě provede vytvořením vlastní šablony od začátku do konce. Platforma už běží a data jsou připravena — ty
pouze vytváříš design.

**Krok 1 — Zkopíruj výchozí šablonu**

```bash
cp -r resources/views/themes/template resources/views/themes/jmeno-prijmeni
```

Složku pojmenuj podle sebe — bez diakritiky, malými písmeny, slova odděl pomlčkou (např. `jan-novak`).

**Krok 2 — Přepiš .env**

V souboru .env přepiš:

```env
ACTIVE_AUTHOR=template // přepiš na název šablony
```

**Krok 3 — Vytvoř soubor s metadaty**

Vytvoř soubor `public/themes/jmeno-prijmeni/meta.json`:

```json
{
    "author": "Jméno Příjmení",
    "year": 2026
}
```

Bez tohoto souboru šablona funguje, ale nebude viditelná v přepínači témat. Pokud soubor chybí, doplní ho administrátor.

**Krok 4 — Uprav `index.blade.php`**

Otevři `resources/views/themes/jmeno-prijmeni/index.blade.php` a uprav design dle vlastní fantazie. Celý obsah musí být
uvnitř `<x-layout>`:

```blade
<x-layout>

    {{-- zde je tvůj HTML/Tailwind kód --}}

    @foreach ($projects as $project)
        <a href="/themes/{{ request()->segment(2) ?: config('app.active_author') }}/project/{{ $project['slug'] }}">
            {{ $project['title'] }}
        </a>
    @endforeach

</x-layout>
```

Šablona musí zobrazovat všechny projekty, obsahovat filtry (rok, třída, typ projektu, typ práce) a odkaz
na [orbiszlin.cz](https://orbiszlin.cz). Viz sekci [Dostupné proměnné](#dostupné-proměnné).

**Krok 5a — Uprav `detail.blade.php`** *(klasický přístup)*

Projekt se otevře na samostatné stránce `/themes/jmeno-prijmeni/project/{slug}`. Dostaneš proměnnou `$project` se
stejnou strukturou jako položka v `$projects`.

**Krok 5b — Nebo zvol vlastní řešení** *(modal, overlay, inline rozbalení...)*

Místo samostatné stránky můžeš detail zobrazit libovolně přímo na stránce se seznamem — vyskakovací okno, rozbalení
karty apod. Data si načteš JavaScriptem z `/api/projects/{slug}`. V takovém případě `detail.blade.php` nepotřebuješ.

> Ať zvolíš jakýkoliv přístup, **každý projekt musí jít nějak rozbalit / zobrazit celý detail** — to je povinná součást
> šablony.

**Krok 6 — Otevři v prohlížeči**

Tvoje šablona je dostupná na:

```
http://orbis-projects.test/themes/jmeno-prijmeni
```

### Hotovo — co musí šablona splňovat

- Zobrazuje **všechny projekty** ze seznamu
- Obsahuje **filtry** (rok, třída, typ projektu, typ práce)
- Každý projekt lze **rozbalit / zobrazit celý detail**
- Obsahuje odkaz na **[orbiszlin.cz](https://orbiszlin.cz)**
- U každého projektu jsou vidět **všechny dostupné informace**

---

## Dokumentace projektu

Následující sekce popisují strukturu dat, dostupné proměnné a API. Užitečné pro každého, kdo chce lépe pochopit jak
platforma funguje, nebo implementovat vlastní řešení detailu přes JavaScript.

Chceš projekt rozjet lokálně? Viz [SETUP.md](SETUP.md).

---

## Dostupné proměnné

### `index.blade.php`

#### `$projects` — pole projektů

Každý projekt obsahuje:

```php
[
    'id'           => 1,
    'title'        => 'Název projektu',
    'slug'         => 'nazev-projektu',
    'excerpt'      => 'Krátký popis zobrazovaný v kartě.',
    'description'  => '<p>Plný HTML popis projektu.</p>',
    'thumbnail'    => 'https://.../thumbnail.jpg',   // prázdný řetězec, pokud není
    'school_year'  => 'Rok (např. 2025/2026)',
    'year'         => 'Ročník (např. 1.ročník)',
    'project_type' => 'Typ projektu (např. Web)',
    'work_type'    => 'Typ práce (např. Maturitní)',
    'school_class' => 'Třída (např. S1I)',
    'author'       => [
        'name'  => 'Jan Novák',
        'class' => 'S1I',
        'email' => 'jan.novak@skola.cz',
    ],
    'links'        => [
        // type: 'github' | 'website' | 'appstore' | 'googleplay' | 'video' | 'other'
        ['type' => 'github', 'url' => 'https://github.com/...', 'label' => 'GitHub'],
    ],
    'published_at' => '2025-04-01T12:00:00Z',
]
```

Příklad výpisu v Blade:

```blade
@foreach ($projects as $project)
    <a href="/themes/{{ request()->segment(2) ?: config('app.active_author') }}/project/{{ $project['slug'] }}">
        <h2>{{ $project['title'] }}</h2>
        <p>{{ $project['excerpt'] }}</p>
    </a>
@endforeach
```

> `request()->segment(2)` zajišťuje správný odkaz ať je šablona otevřena přes `/themes/jmeno-prijmeni` nebo přes `/` (
> aktivní téma).

#### `$taxonomies` — taxonomie seskupené podle typu

```php
$taxonomies['year']         // ročníky
$taxonomies['project_type'] // typy projektů
$taxonomies['work_type']    // typy prací
$taxonomies['school_class'] // třídy
```

Každá položka je pole s klíči `id`, `name`, `slug`, `type`.

Příklad filtrovacího selectu:

```blade
<select name="year">
    <option value="">Rok</option>
    @foreach (($taxonomies['year'] ?? []) as $taxonomy)
        <option value="{{ $taxonomy['slug'] }}" @selected(request('year') === $taxonomy['slug'])>
            {{ $taxonomy['name'] }}
        </option>
    @endforeach
</select>
```

Filtr se aplikuje odesláním formuláře metodou `GET`. Akci formuláře nastav dynamicky, aby fungovala pro obě URL (`/` i
`/themes/jmeno-prijmeni`):

```blade
<form method="GET" action="{{ request()->segment(2) ? url('/themes/' . request()->segment(2)) : url('/') }}">
```

### `detail.blade.php`

#### `$project` — jeden projekt

Stejná struktura jako položka v poli `$projects` výše.

---

## REST API

Šablony přijímají data přes interní REST API. Endpointy lze volat i přímo pro vlastní účely.

### Projekty

#### `GET /api/projects`

Vrátí seznam publikovaných projektů.

**Query parametry (filtrování):**

| Parametr       | Typ           | Popis                     |
|----------------|---------------|---------------------------|
| `year`         | string (slug) | Filtr podle ročníku       |
| `project_type` | string (slug) | Filtr podle typu projektu |
| `work_type`    | string (slug) | Filtr podle typu práce    |
| `school_class` | string (slug) | Filtr podle třídy         |

```
GET /api/projects?year=2025&project_type=webova-aplikace
```

#### `GET /api/projects/{slug}`

Vrátí detail jednoho projektu. Užitečné při implementaci vlastního detailu přes JavaScript.

```json
{
    "id": 1,
    "title": "Název projektu",
    "slug": "nazev-projektu",
    "excerpt": "Krátký popis.",
    "description": "<p>Plný HTML popis projektu.</p>",
    "thumbnail": "https://.../thumbnail.jpg",
    "school_year": "2024/2025",
    "year": "2.ročník",
    "project_type": "Webová aplikace",
    "work_type": "Individuální",
    "school_class": "S2E",
    "author": {
        "name": "Jan Novák",
        "class": "4.A",
        "email": "jan.novak@skola.cz"
    },
    "links": [
        {
            "type": "github",
            "url": "https://github.com/...",
            "label": "GitHub"
        }
    ],
    "published_at": "2025-04-01T12:00:00Z"
}
```

### Taxonomie

#### `GET /api/taxonomies`

Vrátí seznam všech taxonomií (všechny typy dohromady).

### Šablony

#### `GET /api/themes`

Vrátí seznam dostupných šablon a informaci o aktivní šabloně.

---

## Autor

Systém vytvořil **Martin Koudela**, student školy [ORBIS Zlín](https://orbiszlin.cz).

- Web: [martinkoudela.com](https://martinkoudela.com)
- GitHub: [@MartinKoudela](https://github.com/MartinKoudela)
- LinkedIn: [Martin Koudela](https://www.linkedin.com/in/martin-koudela-a5b645343/)
- E-mail: mk@martinkoudela.com
