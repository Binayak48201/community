<template>
  <!-- :id="`reply-${reply.id}`" -->
  <div class="tt-item">
    <div class="tt-single-topic">
      <div class="tt-item-header pt-noborder">
        <div class="tt-item-info info-top">
          <div class="tt-avatar-title">
            <a href="#">{{ reply.user.name }}</a>
          </div>
          <a href="#" class="tt-info-time">
            {{ reply.created_at }}
          </a>
        </div>
      </div>
      <div v-if="editing">
        <textarea
          v-model="body"
          cols="10"
          rows="5"
          style="width: 100%"
        ></textarea>
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
      <div class="tw-flex pt-3">
        <div :class="reply.isFavorited ? '' : ''">
          <form action="" method="POST">
            <button
              class="custom-button tw-flex"
              :disabled="reply.isFavorited ? 'disabled' : ''"
              type="submit"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                style="height: 1.5rem"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
                />
              </svg>
              <span class="tt-text">{{ reply.favorites_count }} </span>
            </button>
          </form>
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
    </div>
  </div>
</template>

<script>
export default {
  name: "Reply",
  props: ["reply"],
  components: ["flash"],
  data() {
    return {
      replies: [],
      editing: false,
      body: this.reply.body,
    };
  },
  created() {
    this.getAllReplies();
  },
  methods: {
    getAllReplies() {
      axios.get("/replies").then((res) => console.log(res.data));
    },
    update() {
      axios.patch("/replies/" + this.reply.id, { body: this.body });
      this.editing = false;
    },
    deleteReply() {
      if (confirm("Are You Sure?")) {
        axios
          .post("/replies/" + this.reply.id, { _method: "delete" })
          .then((res) => console.log(res))
          .then((data) => {
            alert("Replies Deleted");
            this.replies;
          })
          .catch((err) => console.log(err));
      }
    },
  },
};
</script>
