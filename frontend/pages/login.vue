<template>
  <b-container fluid>
    <b-row 
      class="main" 
      align-v="center">
      <b-col class="left">
        <!-- <app-logo/> -->
        <div class="logo-group">
          <h1 class="title">
            <span class="T">T</span>ech<span class="B">B</span>ank
          </h1>
          <h2 class="subtitle">
            社員スキル管理システム <small>-開発版</small>
          </h2>
        </div>
      </b-col>
      <b-col class="right">
        <div class="login-form">
          <b-form @submit.prevent="login">
            <b-form-group 
              id="loginInputGroup1"
              label="ユーザー名"
              label-for="loginInput1">
              <b-form-input 
                id="loginInput1"
                v-model="userForm.username"
                type="text"
                placeholder="ユーザーIDを入力"/>
            </b-form-group>
            <b-form-group 
              id="loginInputGroup2"
              label="パスワード"
              label-for="loginInput2">
              <b-form-input 
                id="loginInput2"
                v-model="userForm.password"
                type="password"
                placeholder="パスワードを入力"/>
            </b-form-group>
            <b-button 
              variant="primary"
              type="submit"
              @click="login">ログイン</b-button>
          </b-form>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  layout: "base",
  middleware: "guest",
  components: {},
  data() {
    return {
      userForm: {
        username: "",
        password: ""
      }
    }
  },
  // created() {
  //   if (this.$auth.loggedIn) {
  //     this.$router.replace("/")
  //   }
  // },
  methods: {

    async login() {
      await this.$auth.loginWith("local", {
        data: this.userForm
      })
      this.$router.push({
        path: this.$route.query.redirect || "/"
      })
    },

  }
}
</script>

<style scoped>
.main {
  height: 100vh;
}

.title {
  /* font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; 1 */
  display: block;
  font-weight: 100;
  font-size: 5rem;
  color: #35495e;
}

.subtitle {
  text-align: center;
  font-weight: 300;
  font-size: 20px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
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
  height: 100%;
  display: flex;
  align-items: center;
  border-right: 1px solid gainsboro;
  background: #e5f2fa;
}
.logo-group {
  width: fit-content;
  margin: auto;
}

.login-form {
  padding: 50px;
}
</style>
