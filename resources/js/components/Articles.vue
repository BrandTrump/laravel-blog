<template>
  <div>
      <form @submit.prevent="submit">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Create Blog Post</h4>
          <div class="row g-3">
            <div class="col-sm-6">
              <input type="text" class="form-control" name="title" id="title" v-model="fields.title" placeholder="Title">
              <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
            </div>

            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" id="name" v-model="fields.name" placeholder="Category">
              <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
            </div>
          </div><br>

          <textarea class="form-control" name="body" id="body" rows="7" v-model="fields.body" placeholder="Content"></textarea>
          <div v-if="errors && errors.body" class="text-danger">{{ errors.body[0] }}</div><br>

          <button type="submit" class="btn btn-primary">Submit</button>

          <div v-if="success" class="alert alert-success mt-3">
            Post Added
          </div>
        </div>
      </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
      selected: '',
    }
  },
  methods: {
    submit() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.post('/submit', this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },
}
</script>