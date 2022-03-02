<template>
    <div v-for="(reply,index) in replies" :key="index">
        <Reply :reply="reply" :id="index"></Reply>
    </div>
</template>
<script>
import Reply from './Reply';

export default {
    name: "Replies",
    props: ['slug'],
    components: {Reply},
    data() {
        return {
            endpoint: this.slug + '/replies',
            replies: []
        }

    },

    methods: {
        fetch() {
            window.axios.get(this.endpoint).then((response) => {
                this.replies = response.data.data
            })
        },
        removeItem(data) {
            this.replies.splice(data.key, 1)
        }
    },
    mounted() {
        this.fetch()
        this.emitter.on('deleted', (data) => {
            this.removeItem(data);
        })

    }
}
</script>
