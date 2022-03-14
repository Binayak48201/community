<template>
    <div class="tt-desktop-menu">
        <nav class="pt-2">
            <ul>
                <li>
                    <a href="#" class="tt-btn-icon" v-if="signIn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="height" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </a>
                    <ul v-if="notification">
                        <li v-for="(notification,index) in notifications" :key="index">
                            <a @click.prevent="removeNoti(notification.id)" :href="notification.data.link"
                               v-text="notification.data.message"></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
export default {
    data() {
        return {
            signIn: window.App.signedIn,
            notifications: []
        }
    },
    methods: {
        getNotification() {
            window.axios.get(`/profile/${window.App.user.id}/notification`)
                .then((response) => {
                    this.notifications = response.data;
                })
        },
        removeNoti(idx) {
            window.axios.delete(`/profile/${window.App.user.id}/notification/${idx}`)
                .then((response) => {
                    window.location.reload();
                })
        }
    },
    mounted() {
        this.signIn ? this.getNotification() : ''
    }
}
</script>
