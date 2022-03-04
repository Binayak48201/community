<template>
    <div>
        <button class="custom-button tw-flex"
                @click.prevent="favourite"
                :disabled="favouriteDisabled">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 1.5rem;" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
            <span class="tt-text pl-2">{{ favCount }}</span>
        </button>
    </div>
</template>
<script>
export default {
    name: "Favourite",
    props: ['data'],
    data() {
        return {
            favouriteStatus: this.data.isFavorited,
            favCount: this.data.favoritesCount,
            endpoint: '/replies/' + this.data.id + '/favorites',
            favouriteDisabled: false
        }
    },
    mounted() {
        if (window.App.signedIn) {
            return this.data.user_id === window.App.user.id ? this.favouriteDisabled = true : ''
        }
    },
    methods: {
        createFavourite() {
            window.axios.post(this.endpoint)
                .then((response) => {
                    this.favCount++
                    this.favouriteStatus = true
                    this.emitter.emit('flash', response.data.data);
                    this.favouriteDisabled = false
                })
        },

        destroyFavourite() {
            window.axios.delete(this.endpoint)
                .then((response) => {
                    this.favCount--
                    this.favouriteStatus = false
                    this.emitter.emit('flash', response.data.data);
                    this.favouriteDisabled = false
                })
        },
        favourite() {
            this.favouriteDisabled = true
            this.favouriteStatus ? this.destroyFavourite() : this.createFavourite()
        }
    }
}
</script>
<style scoped>
button:focus {
    outline: none;
}
</style>
