<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nouvelle ration
        </h2>
    </x-slot>

    <div>

        <div x-data="nouvelleRation()" class="p-6 max-w-xl mx-auto space-y-4 bg-white rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-4 text-center">Choix de l’animal</h2>

            <label>Espèce</label>
            <select x-model="espece" @change="fetchProductions()" class="w-full border rounded p-2">
                <option value="">-- Choisir --</option>
                @foreach ($especes as $e)
                    <option value="{{ $e->id }}">{{ $e->name }}</option>
                @endforeach
            </select>

            <template x-if="productions.length">
                <div>
                    <label>Production</label>
                    <select x-model="production" @change="fetchRaces()" class="w-full border rounded p-2">
                        <option value="">-- Choisir --</option>
                        <template x-for="prod in productions" :key="prod.id">
                            <option :value="prod.id" x-text="prod.name"></option>
                        </template>
                    </select>
                </div>
            </template>

            <template x-if="races.length">
                <div>
                    <label>Race</label>
                    <select x-model="race" @change="fetchPhysiologies()" class="w-full border rounded p-2">
                        <option value="">-- Choisir --</option>
                        <template x-for="r in races" :key="r.id">
                            <option :value="r.id" x-text="r.name"></option>
                        </template>
                    </select>
                </div>
            </template>

            <template x-if="physiologies.length">
                <div>
                    <label>Physiologie</label>
                    <select x-model="physiologie" class="w-full border rounded p-2">
                        <option value="">-- Choisir --</option>
                        <template x-for="p in physiologies" :key="p.id">
                            <option :value="p.id" x-text="p.name"></option>
                        </template>
                    </select>
                </div>
            </template>

            <button class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700"
                @click="submit">
                Valider
            </button>
        </div>


        <!-- contenu ici -->
    </div>
    @vite('resources/js/nouvelleRation.js')
</x-app-layout>
