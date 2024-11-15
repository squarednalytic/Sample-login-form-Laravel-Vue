<template>
  <div>
    <h2>Welcome to the Dashboard</h2>
    <p>Welcome, {{ user.name }}!</p>
    <button @click="logout">Logout</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {},
    };
  },
  mounted() {
    this.fetchUser();
  },
  methods: {
    async fetchUser() {
      try {
        const response = await this.$axios.get('/api/user', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('authToken')}`,
          },
        });
        this.user = response.data;
      } catch (error) {
        console.error('Failed to fetch user data:', error);
      }
    },
    logout() {
      localStorage.removeItem('authToken');
      this.$router.push('/login');
    },
  },
};
</script>
