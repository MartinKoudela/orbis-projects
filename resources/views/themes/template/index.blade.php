<x-layout>

    <main class="mx-auto max-w-7xl px-6 py-16">
        <section class="max-w-3xl" id="hero">
            <h1 class="text-3xl font-semibold tracking-tight text-slate-900">
                ORBIS — Studentské projekty
            </h1>
            <p class="mt-4 text-base leading-7 text-slate-600">
                Toto je výchozí šablona. Upravte design dle vlastní fantazie.
            </p>
        </section>
        <section id="projects" class="mt-16 scroll-mt-24">
            <h2 class="text-xl font-semibold text-slate-900">Projekty</h2>
            <div id="filters-and-sorting" class="mt-10 rounded-lg border border-slate-200 bg-white p-4">
                <form method="GET" action="{{ url('/') }}"
                      class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Filtry a řazení</h2>
                        <p class="mt-1 text-sm text-slate-500">Vyber rok, třídu, typ projektu nebo typ práce.</p>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
                        <select name="year"
                                class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 focus:border-[#01a0e2] focus:outline-none focus:ring-2 focus:ring-[#01a0e2]/20">
                            <option value="">Rok</option>
                            @foreach (($taxonomies['year'] ?? []) as $taxonomy)
                                <option
                                    value="{{ $taxonomy['slug'] }}" @selected(request('year') === $taxonomy['slug'])>
                                    {{ $taxonomy['name'] }}
                                </option>
                            @endforeach
                        </select>

                        <select name="school_class"
                                class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 focus:border-[#01a0e2] focus:outline-none focus:ring-2 focus:ring-[#01a0e2]/20">
                            <option value="">Třída</option>
                            @foreach (($taxonomies['school_class'] ?? []) as $taxonomy)
                                <option
                                    value="{{ $taxonomy['slug'] }}" @selected(request('school_class') === $taxonomy['slug'])>
                                    {{ $taxonomy['name'] }}
                                </option>
                            @endforeach
                        </select>

                        <select name="project_type"
                                class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 focus:border-[#01a0e2] focus:outline-none focus:ring-2 focus:ring-[#01a0e2]/20">
                            <option value="">Typ projektu</option>
                            @foreach (($taxonomies['project_type'] ?? []) as $taxonomy)
                                <option
                                    value="{{ $taxonomy['slug'] }}" @selected(request('project_type') === $taxonomy['slug'])>
                                    {{ $taxonomy['name'] }}
                                </option>
                            @endforeach
                        </select>

                        <select name="work_type"
                                class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 focus:border-[#01a0e2] focus:outline-none focus:ring-2 focus:ring-[#01a0e2]/20">
                            <option value="">Typ práce</option>
                            @foreach (($taxonomies['work_type'] ?? []) as $taxonomy)
                                <option
                                    value="{{ $taxonomy['slug'] }}" @selected(request('work_type') === $taxonomy['slug'])>
                                    {{ $taxonomy['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="rounded-md bg-[#01a0e2] px-4 py-2 text-sm font-medium text-white transition hover:bg-[#008fc9]">
                            Filtrovat
                        </button>

                        <a href="{{ url('/') }}"
                           class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                            Zrušit
                        </a>
                    </div>
                </form>
            </div>

            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <a href="/themes/{{ request()->segment(2) ?: config('app.active_author') }}/project/{{ $project['slug'] }}"                       class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md block">

                        @if (!empty($project['thumbnail']))
                            <img src="{{ $project['thumbnail'] }}" alt="{{ $project['title'] }}"
                                 class="mb-4 h-40 w-full rounded-md object-cover">
                        @endif

                        <h3 class="text-base font-semibold text-slate-900">
                            {{ $project['title'] }}
                        </h3>

                        <div class="mt-3 space-y-2 text-sm text-slate-600">
                            @if ($project['school_year'])
                                <p><span
                                        class="font-medium text-slate-700">Školní rok:</span> {{ $project['school_year'] }}
                                </p>
                            @endif

                            @if ($project['school_class'])
                                <p><span class="font-medium text-slate-700">Třída:</span> {{ $project['school_class'] }}
                                </p>
                            @endif

                            @if ($project['project_type'])
                                <p><span
                                        class="font-medium text-slate-700">Typ projektu:</span> {{ $project['project_type'] }}
                                </p>
                            @endif

                            @if ($project['author']['name'])
                                <p><span
                                        class="font-medium text-slate-700">Autor:</span> {{ $project['author']['name'] }}
                                </p>
                            @endif
                        </div>

                        @if (!empty($project['excerpt']))
                            <p class="mt-4 text-sm leading-6 text-slate-600">{{ $project['excerpt'] }}</p>
                        @endif

                    </a>
                @endforeach
            </div>
        </section>

        <section id="about" class="mt-16 scroll-mt-24">
            <h2 class="text-xl font-semibold text-slate-900">O šabloně</h2>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">
                Výchozí šablona pro studentské projekty
                <a href="https://www.orbiszlin.cz/" class="text-[#01a0e2] hover:text-[#008fc9]">ORBIS Zlín</a>.
                Design je čistě na tobě — jediná podmínka je zachovat funkčnost: technologie <code
                    class="bg-slate-100 px-1 rounded">Laravel/PHP</code>,
                soubory <code class="bg-slate-100 px-1 rounded">index.blade.php</code> - hlavní stránka a <code
                    class="bg-slate-100 px-1 rounded">detail.blade.php</code> <span
                    class="text-slate-400">(volitelné)</span> - info o projektu, předepsané proměnné, odkaz na školu,
                přepínač témat, vše o projektu vypsané a filtry projektů.
                Podrobná dokumentace je na <a href="https://github.com/MartinKoudela/orbis-projects" target="_blank"
                                              class="text-[#01a0e2] hover:text-[#008fc9]">GitHubu</a>.
            </p>
        </section>
    </main>

</x-layout>
