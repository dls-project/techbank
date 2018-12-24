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
                                v-model="user.username"
                                required
                                placeholder="ユーザーIDを入力">
                    </b-form-input>
                </b-form-group>
                <b-form-group id="loginInputGroup2"
                            label="パスワード"
                            label-for="loginInput2">
                    <b-form-input id="loginInput2"
                                type="password"
                                v-model="user.password"
                                required
                                placeholder="パスワードを入力">
                    </b-form-input>
                </b-form-group>
                <b-button @click="login" variant="primary">ログイン</b-button>
            </b-form>
        </div>
        </b-col>
    </b-row>
  </b-container>
</template>

<script>
import AppLogo from '~/components/AppLogo.vue'
import axios from 'axios';
export default {
    layout: 'base',
    components: {
        AppLogo
    },
    data() {
        return {
            user: {
                username:'',
                password:''
            }
        }
    },
    methods: {
        auth: false,
        getHeaders(token) {
          return {
            Authorization: `Bearer ${token}`
          }
        },
        login() {
            const postData = {
                grant_type: 'password',
                client_id: process.env.PASSPORT_PASSWORD_GRANT_ID,
                client_secret: process.env.PASSPORT_PASSWORD_GRANT_SECRET,
                scope: "*",
                username: this.user.username,
                password: this.user.password,
            }
            console.log(postData)
            axios.post('http://localhost:3000/api/oauth/token', postData)
            .then(
                response => {
                //取得したアクセストークンをヘッダーに入れる
                const headers = this.getHeaders(response.data.access_token)
                axios.defaults.headers.common['Authorization'] = headers.Authorization
                
                }
            )
            .catch(error => {
                alert('ログインに失敗しました')

            })
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

