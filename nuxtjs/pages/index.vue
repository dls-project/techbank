<template>
  <section >
    <div>
      <strong>User</strong>
      <pre>{{$auth.user}}</pre>
    </div>
    <!-- <button @click="logout">Logout</button> -->
    <a class="nav-link" @click.prevent="logout" href="#">Logout</a> 
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
      this.$auth.logout()
      this.$router.replace("/login")
    }
  }
}
</script>

<style scoped>

</style>

