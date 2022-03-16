<template>
    <div class="tt-item tt-info-box" :id="`reply-${reply.id}`">
        <div class="tt-single-topic">
            <div class="tt-item-header pt-noborder">
                <div class="tt-item-info info-top">
                    <div class="tt-avatar-icon">
                        <img src="https://gravatar.com/avatar" alt=""
                             class="h-16"
                             style="border-radius: 50%;"></div>
                    <h3 class="tt-item-title">
                        <a href="#">{{ reply.user.name }}</a>
                    </h3>
                    <a href="#" class="tt-info-time flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="height pr-2" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ reply.created_date }}
                    </a>
                </div>
            </div>
            <div v-if="editing">
                <textarea v-model="body" cols="10" rows="5" style="width:100%"></textarea>
                <button class="btn custom-red mr-3 ml-4" @click="editing = false">
                    <span class="tt-text">Cancel</span>
                </button>
                <button type="submit" class="btn btn-color02" @click="update">
                    <span class="tt-text">Update</span>
                </button>
            </div>
            <div v-else class="tt-item-description">
                {{ body }}
            </div>
            <div class="tw-flex pt-3">
                <Favourite :data="reply"></Favourite>
                <div v-if="authorized" class="pl-3">
                    <a class="tt-icon-btn tt-hover-02 tt-small-indent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="height" fill="none" viewBox="0 0 24 24"
                             @click="editing = true"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                    </a>
                    <a class="tt-icon-btn tt-hover-02 tt-small-indent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="height red" fill="none" viewBox="0 0 24 24"
                             @click="destroy"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-separator"></div>
</template>

<script>
import Favourite from "./Favourite";

export default {
    name: "Reply",
    props: ["reply"],
    emits: ['deleted'],
    components: {Favourite},
    data() {
        return {
            editing: false,
            body: this.reply.body,
            signedIn: window.App.signedIn
        }
    },
    computed: {
        authorized() {
            return window.App.signedIn && window.App.user.id == this.reply.user_id;
        }
    },
    methods: {
        async update() {
            await window.axios.patch('/replies/' + this.reply.id, {body: this.body})
                .then(() => {
                    this.editing = false
                    this.emitter.emit('flash', 'Reply Updated');
                })
                .catch((error) => {
                    this.emitter.emit('flash', error.response.data.error);
                })

        },
        destroy() {
            window.axios.delete('/replies/' + this.reply.id)
                .then(() => {
                    this.$emit('deleted')
                    this.emitter.emit('flash', 'Reply Deleted');
                })
                .catch((error) => {
                    this.emitter.emit('flash', 'Unauthorized action.');
                })
        },
    }
}
</script>
