<x-filament-panels::page>

    <p style="font-weight: 700">Pilih Kategori:</p>
    <ul style="list-style-type: none; padding: 0;">
        @foreach ($category as $item)
            <li style="margin-bottom: 10px;">
                <a href="/admin/sales/laporan/kategori/{{ $item->id }}"
                    style="text-decoration: none; color: #007bff;">
                    {{ $item->kategori }}
                </a>
            </li>
        @endforeach
    </ul>

</x-filament-panels::page>
