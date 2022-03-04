<template>
    <nav class="custom-flex mt-4" v-if="shouldPaginate">
        <ul class="pagination row">
            <li class="page-item" rel="prev" v-show="preUrl">
                <span @click.prevent="page--;broadcast()" class="page-link" aria-hidden="true">‹‹Previous</span>
            </li>

            <li class="page-item" rel="next" v-show="nextUrl">
                <span @click.prevent="page++;broadcast()" class="page-link" aria-hidden="true">Next››</span>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    props: ['dataSet'],
    emits: ['changed'],
    data() {
        return {
            page: 1,
            preUrl: false,
            nextUrl: false
        }
    },
    methods: {
        broadcast() {
            this.$emit('changed', this.page)
        }
    },
    computed: {
        shouldPaginate() {
            return !!this.preUrl || !!this.nextUrl
        }
    },
    watch: {
        dataSet() {
            this.page = this.dataSet.current_page
            this.preUrl = this.dataSet.prev_page_url
            this.nextUrl = this.dataSet.next_page_url

        },
    },
}
</script>
