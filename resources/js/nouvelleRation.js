export function nouvelleRation() {
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
            let res = await fetch(`/especes/${this.espece}/productions`)
            this.productions = await res.json()
        },

        async fetchRaces() {
            this.race = this.physiologie = ''
            this.physiologies = []
            if (!this.production) return
            let res = await fetch(`/productions/${this.production}/races`)
            this.races = await res.json()
        },

        async fetchPhysiologies() {
            this.physiologie = ''
            if (!this.race) return
            let res = await fetch(`/races/${this.race}/physiologies`)
            this.physiologies = await res.json()
        },

        async submit() {
            // Vérification minimale
            if (!this.espece || !this.production || !this.race || !this.physiologie) {
                alert('Veuillez remplir tous les champs !')
                return
            }

            try {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                const res = await fetch('/set-troupeau', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        espece_id: this.espece,
                        production_id: this.production,
                        race_id: this.race,
                        physiologie_id: this.physiologie
                    })
                })

                if (!res.ok) throw new Error('Erreur serveur')

                const data = await res.json()
                // // Ici tu peux rediriger ou afficher un message
                // alert('Données envoyées avec succès !')
                // console.log(data)
                window.location.href='/'
            } catch (error) {
                console.error(error)
                alert('Une erreur est survenue.')
            }
        }
    }
}
