<template>
  <div>
    <h2>User Management</h2>

    <!-- Add User Button -->
    <button @click="openAddUserModal">Add User</button>

    <!-- User List -->
    <table v-if="users.length">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <button @click="openEditUserModal(user)">Edit</button>
            <button @click="deleteUser(user.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- No users message -->
    <p v-else>No users found</p>

    <!-- Add/Edit User Modal -->
    <div v-if="isModalOpen" class="modal">
      <div class="modal-content">
        <h3>{{ isEditing ? 'Edit User' : 'Add User' }}</h3>
        <form @submit.prevent="submitForm">
          <div>
            <label for="name">Name</label>
            <input type="text" v-model="form.name" required />
          </div>
          <div>
            <label for="email">Email</label>
            <input type="email" v-model="form.email" required />
          </div>
          <div>
            <label for="password">Password</label>
            <input type="password" v-model="form.password" v-if="!isEditing" required />
          </div>
          <div>
            <button type="submit">{{ isEditing ? 'Update' : 'Add' }} User</button>
            <button type="button" @click="closeModal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [], // List of users
      isModalOpen: false, // Track modal visibility
      isEditing: false, // Flag to determine if we are editing a user
      form: {
        id: null,
        name: '',
        email: '',
        password: '',
      },
    };
  },
  mounted() {
    this.fetchUsers();
  },
  methods: {
    // Fetch users from the API
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

    // Open the modal to add a new user
    openAddUserModal() {
      this.isEditing = false;
      this.form = {
        id: null,
        name: '',
        email: '',
        password: '',
      };
      this.isModalOpen = true;
    },

    // Open the modal to edit an existing user
    openEditUserModal(user) {
      this.isEditing = true;
      this.form = { ...user }; // Pre-fill the form with user data
      this.isModalOpen = true;
    },

    // Close the modal
    closeModal() {
      this.isModalOpen = false;
    },

    // Submit the form to add or update the user
    async submitForm() {
      try {
        if (this.isEditing) {
          // Update the user
          await this.$axios.put(`/api/users/${this.form.id}`, this.form, {
            headers: {
              Authorization: `Bearer ${localStorage.getItem('authToken')}`,
            },
          });
        } else {
          // Add a new user
          await this.$axios.post('/api/users', this.form, {
            headers: {
              Authorization: `Bearer ${localStorage.getItem('authToken')}`,
            },
          });
        }

        // Fetch updated user list after add or update
        this.fetchUsers();
        this.closeModal();
      } catch (error) {
        console.error('Failed to save user:', error);
      }
    },

    // Delete a user
    async deleteUser(userId) {
      if (confirm('Are you sure you want to delete this user?')) {
        try {
          await this.$axios.delete(`/api/users/${userId}`, {
            headers: {
              Authorization: `Bearer ${localStorage.getItem('authToken')}`,
            },
          });
          this.fetchUsers();
        } catch (error) {
          console.error('Failed to delete user:', error);
        }
      }
    },
  },
};
</script>

<style scoped>
/* Modal Styles */
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
  width: 400px;
}

button {
  padding: 10px;
  margin-top: 10px;
}

table {
  width: 100%;
  margin-top: 20px;
  border-collapse: collapse;
}

table th, table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

button {
  padding: 5px 10px;
  margin-right: 10px;
  cursor: pointer;
}

button[type="submit"] {
  background-color: #28a745;
  color: white;
}

button[type="button"] {
  background-color: #dc3545;
  color: white;
}
</style>
