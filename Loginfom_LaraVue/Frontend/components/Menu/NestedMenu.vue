<template>
  <div>
    <ul>
      <li v-for="menu in menus" :key="menu.id">
        <a :href="menu.route">{{ menu.name }}</a>
        <NestedMenu v-if="menu.children" :menus="menu.children" />
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ['menus'],
};
</script>
