<template>
    <div class="tt-item tt-info-box" :id="`reply-${reply.id}`">
        <div class="tt-single-topic">
            <div class="tt-item-header pt-noborder">
                <div class="tt-item-info info-top">
                    <div class="tt-avatar-title">
                        <a href="#">{{ reply.user.name }}</a>
                    </div>
                    <a href="#" class="tt-info-time">
                        {{ reply.created_date }}
                    </a>
                </div>
            </div>
            <div v-if="editing">
                <textarea v-model="body" cols="10" rows="5" style="width:100%"></textarea>
                <button class="btn btn-color02 mr-3 ml-4" @click="editing = false">
                    <span class="tt-text">Cancel</span>
                </button>
                <button type="submit" class="btn btn-custom" @click="update">
                    <span class="tt-text">Update</span>
                </button>
            </div>
            <div v-else class="tt-item-description">
                {{ body }}
            </div>
            <div class=" tw-flex pt-3" v-if="signedIn">
                <Favourite :data="reply"></Favourite>
                <button class="btn btn-color02 mr-3 ml-4" @click="editing = true">
                    <span class="tt-text">Edit</span>
                </button>

                <button type="submit" class="btn btn-custom" @click="destroy">
                    <span class="tt-text">Delete</span>
                </button>
                <div class="col-separator"></div>
            </div>
        </div>

        <button
          class="btn btn-color02 mr-3 ml-4"
          @click.prevent="editing = true"
        >
          <span class="tt-text">Edit</span>
        </button>
        <button class="btn btn-custom" @click.prevent="deleteReply">
          <span class="tt-text">Delete</span>
        </button>
        <div class="col-separator"></div>
      </div>
</template>

<script>
import Favourite from "./Favourite";

export default {
    name: "Reply",
    props: ["reply", "id"],
    components: {Favourite},
    data() {
        return {
            editing: false,
            body: this.reply.body,
            signedIn: window.App.signedIn
        }
    },
    methods: {
        async update() {
            await window.axios.patch('/replies/' + this.reply.id, {body: this.body})
            this.editing = false
        },
        destroy() {
            window.axios.delete('/replies/' + this.reply.id)
            this.emitter.emit('deleted', {
                'id': this.reply.id,
                'key': this.id
            });
            // let dom = document.querySelectorAll('#reply-' + this.reply.id)
            // dom.forEach(function (el) {
            //     el.classList.add('tw-none');
            // });
        },
    }
}
</script>
<style>
.tw-none {
    display: none;
}
</style>
