<template>
    <div class="alert alert-primary custom-message " role="alert" v-show="show">
        {{ body }}
    </div>
</template>

<script>
export default {
    props: ["message"],
    data() {
        return {
            show: false,
            body: '',
        }
    },
    methods: {
        flash(message) {
            this.show = true;
            this.body = message
            this.hide()
        },
        hide() {
            setTimeout(() => {
                this.show = false;
            }, 3000)
        }
    },
    mounted() {
        if (this.message) {
            this.flash(this.message)
        }
        this.emitter.on('flash', (message) => {
            this.flash(message)
        })
    },
};
</script>
<style>
.custom-message {
    position: fixed;
    z-index: 1000;
    right: 25px;
    bottom: 25px;
    background: #1c69a1;
    padding: 14px 32px;
    border-radius: 18px;
    color: white;
}
</style>s
