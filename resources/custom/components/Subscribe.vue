<template>
    <button type="submit" class="btn btn-color02 mr-3" @click.prevent="toogle">{{ text }}</button>
</template>
<script>
export default {
    name: "Subscribe",
    props: ['post'],
    data() {
        return {
            text: '',
            subscribeStatus: this.post.isSubscribedTo,
            endpoint: this.post.path
        }
    },
    methods: {
        toogle() {
            if (this.subscribeStatus) {
                axios.delete(this.endpoint + '/unsubscribe')
                    .then((response) => {
                        this.text = 'Subscribe'
                        this.subscribeStatus = false
                        this.emitter.emit('flash', 'Successfully unsubscribe.');
                    })
                    .catch((error) => {

                    })
            } else {
                axios.post(this.endpoint + '/subscribe')
                    .then((response) => {
                        this.text = 'UnSubscribe'
                        this.subscribeStatus = true
                        this.emitter.emit('flash', 'Successfully subscribe.');

                    })
                    .catch((error) => {

                    })
            }
        }
    },
    mounted() {
        this.text = this.post.isSubscribedTo ? 'UnSubscribe' : 'Subscribe'
    }
}
</script>
