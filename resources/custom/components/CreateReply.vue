<template>
  <div class="pt-editor form-default">
    <h6 class="pt-title">Post Your Reply</h6>
    <!-- <ckeditor :editor="editor" v-model="body" :config="editorConfig"
      >Hello world</ckeditor
    > -->
    <form @submit.prevent="createReply">
            <div class="form-group">
            <textarea
                v-model="body"
                class="form-control"
                rows="5"
                placeholder="Lets get started">
            </textarea>
            ({{ 200 - body.length }} chars)
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
import CKEditor from "ckeditor4-vue";
export default {
  props: ["path"],
  components: { CKEditor },
  data() {
    return {
      body: "",
      //   editor: CKEditor,
      //   editorConfig: {
      //     toolbar: {
      //       items: ["bold", "italic", "link", "undo", "redo"],
      //     },
      //   },
    };
  },
  methods: {
    createReply() {
      window.axios
        .post(this.path + "/reply", { body: this.body })
        .then((response) => {
          this.emitter.emit("flash", "Reply created");
          this.$emit("created", response.data.data);
          this.body = "";
        })
        .catch((error) => {
          this.emitter.emit("flash", error.response.data.error);
        });
    },
  },
};
</script>
