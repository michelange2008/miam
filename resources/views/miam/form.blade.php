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
                <div x-data="rationForm()" class="p-6 max-w-xl mx-auto space-y-4 bg-white rounded-xl shadow">

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

                <script>
                    function rationForm() {
                        return {
                            espece: '',
                            production: '',
                            race: '',
                            physiologie: '',
                            productions: [],
                            races: [],
                            physiologies: [],

                            async fetchProductions() {
                                this.production = this.race = this.physiologie = ''
                                this.races = this.physiologies = []
                                if (!this.espece) return
                                let res = await fetch(`/miam/especes/${this.espece}/productions`)
                                this.productions = await res.json()
                            },

                            async fetchRaces() {
                                this.race = this.physiologie = ''
                                this.physiologies = []
                                if (!this.production) return
                                let res = await fetch(`/miam/productions/${this.production}/races`)
                                this.races = await res.json()
                            },

                            async fetchPhysiologies() {
                                this.physiologie = ''
                                if (!this.race) return
                                let res = await fetch(`/miam/races/${this.race}/physiologies`)
                                this.physiologies = await res.json()
                            },

                            submit() {
                                alert(
                                    `Espèce ID: ${this.espece}\nProduction ID: ${this.production}\nRace ID: ${this.race}\nPhysiologie ID: ${this.physiologie}`)
                                // Tu peux ici envoyer avec axios.post('/miam/ration', {...})
                            }
                        }
                    }
                </script>

                <!-- contenu ici -->
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
