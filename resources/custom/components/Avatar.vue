<template>
    <div>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="profile_photo_path"
                   @change="onChange"
                   style=" width: 100px;height: 100px;border-radius: 50%">
        </form>
        <img :src="show" alt="">
    </div>
</template>
<script>
export default {
    data() {
        return {
            show: ''
        }
    },
    methods: {
        onChange(e) {
            if (!e.target.files.length) return;

            let file = e.target.files[0];

            let reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = e => {
                this.show = e.target.result;

            }
            let data = new FormData();

            data.append('profile_photo_path', file);

            axios.post('/avatar/update', data)
        },
    }
}
</script>
