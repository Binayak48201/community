<template>
    <div>
        <button class="custom-button tw-flex"
                @click.prevent="favourite"
                :disabled="favouriteDisabled">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 1.5rem;" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
            </svg>
            <span class="tt-text">{{ favCount }}  </span>
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
        return this.data.user_id === window.App.user.id ? this.favouriteDisabled = true : ''
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
