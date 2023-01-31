<script>
import axios from 'axios';
export default {
    name:'Contacts',
    data(){
        return {
      name: "",
      object: "",
      email: "",
      message: "",
      errors: {},
      isLoading: false
    };
    },
    methods:
    {
    sendForm() {
      const data = {
        name: this.name,
        email: this.email,
        message: this.message,
      };
      this.isLoading = true;
      axios.post("http://127.0.0.1:8000/api/contacts", data).then((result) => {
        this.isLoading = false;
        console.log(result.data);
        if(!result.data.success){
            this.errors = result.data.errors;
        }else {
            this.name = '';
            this.object = '';
            this.email = '';
            this.message = '';
            this.errors = {};
        }
      });
    },
  }
}
</script>


<template>
  <h1>
    CONTATTI
  </h1>
  <form @submit.prevent="sendForm()">
    <div>
      <input
        class="form-control"
        :class="{'is-invalid' : errors.name}"
        v-model.trim="name"
        type="text"
        placeholder="name"
      />
      <p v-for="(error, index) in errors.name" :key="'name'+index" class="invalid-feedback">
        {{ error }}
      </p>
    </div>
    <div>
      <input
        class="form-control"
        :class="{'is-invalid' : errors.email}"
        v-model.trim="email"
        type="text"
        placeholder="email"
      />
      <p v-for="(error, index) in errors.email" :key="'email'+index" class="invalid-feedback">
        {{ error }}
      </p>

    </div>
    <div>
      <textarea
        class="form-control"
        :class="{'is-invalid' : errors.message}"
        v-model.trim="message"
        name="message"
        placeholder="message"
        cols="30"
        rows="10"
      ></textarea>
      <p v-for="(error, index) in errors.message" :key="'messaggio'+index" class="invalid-feedback">
        {{ error }}
      </p>

    </div>
    <button type="submit"  :disabled="isLoading">{{isLoading ? 'invio in corso ... ' : 'invia '}}</button>
  </form>
</template>


<style lang="scss" scoped>
form {
  padding-top: 150px;
  width: 50%;
  margin: 0 auto;
}
</style>
