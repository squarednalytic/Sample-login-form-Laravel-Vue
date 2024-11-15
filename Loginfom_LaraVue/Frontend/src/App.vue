<template>
  <div id="app">
    <header>
      <nav>
        <ul>
          <li><router-link to="/dashboard">Dashboard</router-link></li>
          <li><router-link to="/login">Login</router-link></li>
          <li><router-link to="/register">Register</router-link></li>
          <li><router-link to="/user-management">User Management</router-link></li>
        </ul>
      </nav>
    </header>

    <main>
      <router-view />
    </main>

    <footer>
      <p>&copy; 2024 Your Company</p>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
}

header {
  background-color: #333;
  padding: 10px 0;
  color: white;
}

nav ul {
  list-style: none;
  padding: 0;
}

nav li {
  display: inline;
  margin: 0 10px;
}

footer {
  margin-top: 50px;
  padding: 20px;
  background-color: #333;
  color: white;
  text-align: center;
}
</style>
