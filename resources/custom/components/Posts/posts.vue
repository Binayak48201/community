<template>
  <div class="custom-main">
    <button type="submit" class="btn btn-danger" @submit="deletePost($id)">
      Delete
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: "",
    };
  },
  methods: {
    deletePost($id) {
      let posts = this.posts;
      posts.splice(1, $id);
    },
  },
};
</script>


<style scoped>
</style>