<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Accueil
        </h2>
    </x-slot> --}}

    <div>
        <div id=entete class="h-20 bg-gray-200 my-2">

        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 h-screen gap-2">
            <!-- Panneau gauche : définition des animaux -->
            <div class="md:col-span-1 bg-green-100 overflow-y-auto flex flex-col">
                <div class="bg-vertfonce text-white p-3">
                    <h2 class="font-bold">Troupeau ou lot</h2>
                </div>
                @if (session()->has('troupeau'))
                @php
                    $troupeau = session('troupeau')
                @endphp
                    <p>Espèce : {{ $troupeau['espece']->name }}</p>
                    <p>Production : {{ session('troupeau.production')->name }}</p>
                    <p>Race : {{ session('troupeau.race')->name }}</p>
                    <p>Physiologie : {{ session('troupeau.physiologie_id') }}</p>
                @endif

            </div>

            <!-- Panneau central : détail de la ration -->
            <div class="md:col-span-2 bg-white p-4 overflow-y-auto border-x border-gray-200">
                <h2 class="font-bold mb-2">Ration</h2>
                <!-- contenu ici -->
            </div>

            <!-- Panneau droit : résultat -->
            <div class="md:col-span-1 bg-blue-100 p-4 overflow-y-auto">
                <h2 class="font-bold mb-2">Résultats</h2>
                <!-- contenu ici -->
            </div>
        </div>
    </div>

</x-app-layout>
