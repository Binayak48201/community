<template>
    <div class="pt-editor form-default">
        <h6 class="pt-title">Post Your Reply</h6>
        <form @submit.prevent="createReply">
            <div class="form-group">
            <textarea
                v-model="body"
                class="form-control"
                rows="5"
                placeholder="Lets get started">
            </textarea>
            </div>
            <div class="pt-row">
                <div class="col-auto">
                    <button class="btn btn-secondary btn-width-lg">Reply</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>

export default {
    props: ['path'],
    data() {
        return {
            body: '',
        }
    },
    methods: {
        createReply() {
            window.axios.post(this.path + '/reply', {body: this.body})
                .then((response) => {
                    this.emitter.emit('flash', 'Reply created');
                    this.$emit('created', response.data.data)
                    this.body = ''
                })
                .catch((error) => {
                    this.emitter.emit('flash', error.response.data.error);
                })
        }
    }
}
</script>
