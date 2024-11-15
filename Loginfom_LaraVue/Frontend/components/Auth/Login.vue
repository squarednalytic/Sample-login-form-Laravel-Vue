<template>
  <div class="auth-container">
    <h2>Login</h2>
    <form @submit.prevent="login">
      <div>
        <label for="email">Email</label>
        <input type="email" v-model="email" required />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" v-model="password" required />
      </div>
      <div>
        <button type="submit" :disabled="loading">Login</button>
      </div>
    </form>
    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: '',
      loading: false,
      errorMessage: null,
    };
  },
  methods: {
    async login() {
      this.loading = true;
      this.errorMessage = null;

      try {
        const response = await this.$axios.post('/api/login', {
          email: this.email,
          password: this.password,
        });
        localStorage.setItem('authToken', response.data.token);
        this.$router.push('/dashboard');
      } catch (error) {
        this.errorMessage = error.response.data.message || 'Login failed';
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
