<template>
  <div class="auth-container">
    <h2>Register</h2>
    <form @submit.prevent="register">
      <div>
        <label for="name">Name</label>
        <input type="text" v-model="name" required />
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" v-model="email" required />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" v-model="password" required />
      </div>
      <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" v-model="password_confirmation" required />
      </div>
      <div>
        <button type="submit" :disabled="loading">Register</button>
      </div>
    </form>
    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      loading: false,
      errorMessage: null,
    };
  },
  methods: {
    async register() {
      this.loading = true;
      this.errorMessage = null;

      try {
        const response = await this.$axios.post('/api/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        });
        this.$router.push('/login');
      } catch (error) {
        this.errorMessage = error.response.data.message || 'Registration failed';
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
.auth-container {
  width: 300px;
  margin: 0 auto;
}
.error {
  color: red;
  font-size: 14px;
}
</style>
