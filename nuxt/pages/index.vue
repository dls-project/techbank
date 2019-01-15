<template>
  <section>
    {{ $auth.loggedIn }}
    {{ $auth.user }}
    {{ $auth.user.name }}
    {{ $auth.user.email }}
    <button @click="logout">
      logout
    </button>
  </section>
</template>

<script>
export default {
  components: {},
  data() {
    return {}
  },
  methods: {
    logout() {
      this.$auth.logout()
    }
  }
}
</script>

<style scoped>
</style>
