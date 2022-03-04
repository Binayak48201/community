<template>
    <div v-for="(reply,index) in replies" :key="reply.id" class="tt-item">
        <Reply :reply="reply" @deleted="removeItem(index)"></Reply>
    </div>
    <Paginator :dataSet="dataSet" @changed="fetch"></Paginator>

    <div class="tt-wrapper-inner" v-if="signedIn">
        <CreateReply :path="path" @created="replyCreated"></CreateReply>
    </div>
</template>
<script>
import Reply from './Reply';
import CreateReply from "./CreateReply";
import Paginator from "./Paginator"

export default {
    name: "Replies",
    props: ['slug', 'path'],
    emits: ['created','decreased'],
    components: {Reply, CreateReply, Paginator},
    data() {
        return {
            signedIn: window.App.signedIn,
            endpoint: this.slug + '/replies',
            replies: [],
            dataSet: false
        }
    },

    methods: {
        fetch(page) {
            window.axios.get(this.url(page)).then(this.refresh)
        },
        url(page) {
            if (!page) {
                let query = location.search.match(/page=(\d+)/);
                page = query ? query[1] : 1;
            }
            return `${this.endpoint}?page=${page}`;
        },
        refresh({data}) {
            this.dataSet = data
            this.replies = data.data
        },
        removeItem(index) {
            this.replies.splice(index, 1)
             this.$emit('decreased')
        },
        replyCreated(data) {
            this.replies.push(data);
            this.$emit('created')
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
