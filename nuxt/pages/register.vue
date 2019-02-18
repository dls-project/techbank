<template>
  <b-container 
    fruid 
    style="margin-top: 20px;">
    <b-form @submit.prevent="register">
      <b-row>
        <b-col md="6">
          <b-form-group 
            id="employeeEmail" 
            label="メールアドレス" 
            label-for="email" 
            description="あなたのメールアドレスです">
            <b-form-input 
              id="email"
              :value="this.$auth.user.email || 'not login'" 
              disabled />
          </b-form-group>
        </b-col>
      </b-row>
      <b-form-row>
        <b-col md="6">
          <b-form-group 
            id="inputStationGroup"
            label="最寄り駅名" 
            label-for="station" 
            description="最寄り駅名を入力してください" 
          >
            <b-form-input 
              id="station" 
              v-model="form.station" 
              type="text" 
              placeholder="最寄り駅名" />
          </b-form-group>
        </b-col>
      </b-form-row>
      <b-button 
        variant="success" 
        type="submit">登録</b-button>
    </b-form>
  </b-container>
</template>

<script>
export default {
  layout: 'auth',
  data() {
    return {
      form: {
        email: 'test@test.com',
        station: ''
      }
    }
  },
  methods: {
    async register() {
      // 登録完了でルートにリダイレクトさせる
      this.$router.push({
        path: '/'
      })
    }
  }
}
</script>

<style scoped>
</style>
