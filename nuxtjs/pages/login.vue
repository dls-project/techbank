<template>
  <b-container fluid>
    <b-row class="main" align-v="center">
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
            <b-form>
                <b-form-group id="loginInputGroup1"
                            label="ユーザー名"
                            label-for="loginInput1">
                    <b-form-input id="loginInput1"
                                type="text"
                                v-model="userForm.username"
                                placeholder="ユーザーIDを入力">
                    </b-form-input>
                </b-form-group>
                <b-form-group id="loginInputGroup2"
                            label="パスワード"
                            label-for="loginInput2">
                    <b-form-input id="loginInput2"
                                type="password"
                                v-model="userForm.password"
                                placeholder="パスワードを入力">
                    </b-form-input>
                </b-form-group>
                <b-button @click="login" variant="primary">ログイン</b-button>
                <b-button @click="oauthLogin" variant="primary">passportログイン</b-button>
            </b-form>
        </div>
        </b-col>
    </b-row>
  </b-container>
</template>

<script>

export default {
    layout: 'base',
    middleware: 'auth',
    components: {
        
    },
    data() {
        return {
            userForm: {
                username:'',
                password:''
            }
        }
    },
    created () {
        if (this.$auth.loggedIn) {
            this.$router.replace('/')
        }
    },
    methods: {
        // getHeaders(token) {
        //   return {
        //     Authorization: `Bearer ${token}`
        //   }
        // },
        // login() {
        //     const postData = {
        //         grant_type: 'password',
        //         client_id: process.env.PASSPORT_PASSWORD_GRANT_ID,
        //         client_secret: process.env.PASSPORT_PASSWORD_GRANT_SECRET,
        //         scope: "*",
        //         username: this.userForm.username,
        //         password: this.userForm.password,
        //     }
        //     console.log(postData)
        //     axios.post('http://localhost:8000/oauth/token', postData)
        //     .then(
        //         response => {
        //             //取得したアクセストークンをヘッダーに入れる
        //             const headers = this.getHeaders(response.data.access_token)
        //             axios.defaults.headers.common['Authorization'] = headers.Authorization
        //         },
        //     )
        //     .catch(error => {
        //         alert('ログインに失敗しました')
        //     })
        // }
        async login() {
            try {     
                await this.$auth.loginWith('local', {              
                    data: this.userForm, 
                })
                console.log(this.$auth.loggedIn)
                this.$router.push('/')
                console.log(this.userForm.username)
                console.log(this.$store.state.auth.loggedIn)
             } catch(e) {
                 alert("login失敗")
             }
        },
        oauthLogin() {
            this.$auth.loginWith("laravel.passport");
        }
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

