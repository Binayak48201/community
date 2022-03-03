<template>
    <div v-for="(reply,index) in replies" :key="reply.id">
        <Reply :reply="reply" @deleted="removeItem(index)"></Reply>
    </div>
    <div class="tt-wrapper-inner" v-if="signedIn">
        <CreateReply :path="path" @created="replyCreated"></CreateReply>
    </div>
</template>
<script>
import Reply from './Reply';
import CreateReply from "./CreateReply";

export default {
    name: "Replies",
    props: ['slug', 'path'],
    components: {Reply, CreateReply},
    data() {
        return {
            signedIn: window.App.signedIn,
            endpoint: this.slug + '/replies',
            replies: [],
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
            this.replies = data.data
        },
        removeItem(index) {
            this.replies.splice(index, 1)
        },
        replyCreated(data) {
            this.replies.push(data);
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
