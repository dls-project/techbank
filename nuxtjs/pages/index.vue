<template>
  <section >
    <div>
      <strong>User</strong>
      <pre>user</pre>
    </div>
    <button @click="logout">Logout</button>
  </section>
</template>

<script>
import AppLogo from '~/components/AppLogo.vue'

export default {
  components: {
    AppLogo
  },
  data() {
    return {

    }
  },
  methods: {
    logout() {
      // this.$auth.logout();
      this.$router.replace("/login");
    }
  }
}
</script>

<style scoped>

</style>

