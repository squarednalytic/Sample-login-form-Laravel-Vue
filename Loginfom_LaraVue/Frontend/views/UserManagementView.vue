<template>
  <div>
    <h2>User Management</h2>
    <ul>
      <li v-for="user in users" :key="user.id">{{ user.name }} ({{ user.email }})</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    this.fetchUsers();
  },
  methods: {
    async fetchUsers() {
      try {
        const response = await this.$axios.get('/api/users', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('authToken')}`,
          },
        });
        this.users = response.data;
      } catch (error) {
        console.error('Failed to fetch users:', error);
      }
    },
  },
};
</script>
