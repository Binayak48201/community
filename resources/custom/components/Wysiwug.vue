<template>
    <div>
        <input id="trix" type="hidden" :name="name" :value="value">
        <trix-editor ref="trix" input="trix"></trix-editor>
    </div>
</template>
<script>
import Trix from "trix";

export default {
    props: ['name', 'value', 'shouldClear'],
    emits: ['input'],
    mounted() {
        this.$refs.trix.addEventListener('trix-change', e => {
            this.$emit('input', e.target.innerHTML);
        });
        this.$watch('shouldClear', () => {
            this.$refs.trix.value = '';
        });
    }
}
</script>
