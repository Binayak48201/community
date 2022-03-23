<template>
    <div class="pt-editor form-default">
        <h6 class="pt-title">Post Your Reply</h6>
        <form @submit.prevent="createReply">
            <div class="form-group">
                <Wysiwug name="body" v-model="body" @input="setBody" :shouldClear="completed"></Wysiwug>
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
import Wysiwug from "./Wysiwug";

export default {
    props: ['path'],
    components: {Wysiwug},
    data() {
        return {
            body: '',
            completed: false
        }
    },
    methods: {
        setBody(payload) {
            this.body = payload
        },
        createReply() {
            window.axios.post(this.path + '/reply', {body: this.body})
                .then((response) => {
                    this.emitter.emit('flash', 'Reply created');
                    this.$emit('created', response.data.data)
                    this.body = ''
                    this.completed = true;
                    // this.$refs.trix.value = '';
                })
                .catch((error) => {
                    this.emitter.emit('flash', error.response.data.error);
                })
        }
    }
}
</script>
