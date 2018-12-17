<template>
  <section class="container">
    <div class="left">
      <app-logo/>
      <h1 class="title">
        <span class="T">T</span>ech<span class="B">B</span>ank
      </h1>
      <h2 class="subtitle">
        社員スキル管理システム
      </h2>
    </div>
    <div class="right">
      <div class="links">
        <a
          href="/employees"
          class="button--green">社員マスタ</a>
      </div>
    </div>
  </section>
</template>

<script>
import AppLogo from '~/components/AppLogo.vue'

export default {
  components: {
    AppLogo
  }
}
</script>

<style>
.container {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; /* 1 */
  display: block;
  font-weight: 300;
  font-size: 50px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 20px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}

.T {
  color: rgb(93, 93, 250);
  font-weight: bold;
}

.B {
  color: rgb(55, 226, 55);
  font-weight: bold;
}

.left {
  width: 50%;
  float: left;
  border-right: 1px solid gainsboro;
}
.right {
  width: 50%;
  float: right;
}
.login-form {
  padding: 20px;
}
</style>

