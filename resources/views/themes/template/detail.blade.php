<x-layout>

<main class="mx-auto max-w-4xl px-6 py-16 h-screen">

    @if (!empty($project['thumbnail']))
        <img src="{{ $project['thumbnail'] }}" alt="{{ $project['title'] }}"
             class="mb-8 w-full rounded-lg object-cover">
    @endif

    <h1 class="text-3xl font-semibold tracking-tight text-slate-900">
        {{ $project['title'] }}
    </h1>

    <div class="mt-4 flex flex-wrap gap-4 text-sm text-slate-600">
        @if ($project['school_year'])
            <span><span class="font-medium text-slate-700">Školní rok:</span> {{ $project['school_year'] }}</span>
        @endif

        @if ($project['author']['name'])
            <span><span class="font-medium text-slate-700">Autor:</span> {{ $project['author']['name'] }}</span>
        @endif

        @if ($project['school_class'])
            <span><span class="font-medium text-slate-700">Třída:</span> {{ $project['school_class'] }}</span>
        @endif

        @if ($project['project_type'])
            <span><span class="font-medium text-slate-700">Typ projektu:</span> {{ $project['project_type'] }}</span>
        @endif

        @if ($project['work_type'])
            <span><span class="font-medium text-slate-700">Typ práce:</span> {{ $project['work_type'] }}</span>
        @endif
    </div>

    @if (!empty($project['excerpt']))
        <p class="mt-6 text-base leading-7 text-slate-600">
            {{ $project['excerpt'] }}
        </p>
    @endif

    @if (!empty($project['description']))
        <div class="mt-6 text-base leading-7 text-slate-600">
            {!! $project['description'] !!}
        </div>
    @endif

    @if (!empty($project['links']))
        <div class="mt-8 flex flex-wrap gap-3">
            @foreach ($project['links'] as $link)
                <a href="{{ $link['url'] }}"
                   target="_blank"
                   class="rounded-md bg-[#01a0e2] px-4 py-2 text-sm font-medium text-white transition hover:bg-[#008fc9]">
                    {{ $link['label'] ?? 'Otevřít' }}
                </a>
            @endforeach
        </div>
    @endif

</main>
</x-layout>
