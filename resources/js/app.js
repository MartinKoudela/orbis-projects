import './bootstrap';

document.addEventListener('DOMContentLoaded', async () => {
    const select = document.getElementById('theme-switcher');
    if (!select) return;

    const res = await fetch('/api/themes');
    const {active, themes} = await res.json();

    themes.forEach(({slug, author, year}) => {
        const opt = new Option(`${author} (${year})`, slug, slug === active, slug === active);
        select.add(opt);
    });

    select.addEventListener('change', () => {
        if (select.value) window.location.href = `/themes/${select.value}`;
    });
});

// do každého blade studenta přidat ->
//
// <div class="ml-auto pr-6">
//             <select
//                 id="theme-switcher"
//                 class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 shadow-sm focus:border-[#01a0e2] focus:outline-none focus:ring-2 focus:ring-[#01a0e2]/20"
//             >
//                 <option value="">Vybrat téma</option>
//             </select>
//         </div>
//
