<template>
  <b-container 
    fruid 
    style="margin: 20px auto;">
    <b-form @submit.prevent="register">
      <b-row>
        <b-col md="6">
          <b-form-group 
            id="employeeEmail" 
            label="メールアドレス" 
            label-for="email" 
            description="あなたのメールアドレスが表示されています">
            <b-form-input 
              id="email"
              :value="this.$data.form.email"
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
      <b-form-row>
        <b-col md="6">
          <b-form-group>
            <b-form-select 
              v-model="form.services" 
              :options="form.services_options">
              <template slot="first">
                <option 
                  :value="null" 
                  disabled>領域を選択してください</option>
              </template>
            </b-form-select>
          </b-form-group>
        </b-col>
      </b-form-row>
      <b-form-row>
        <b-col md="6">
          <b-form-group label="資格">
            <b-form-checkbox-group 
              v-model="form.qualifications"
              :options="form.qualifications_options" 
              stacked 
              name="資格"/>
          </b-form-group>
        </b-col>
      </b-form-row>
      <b-form-row>
        <b-col md="6">
          <b-form-group label="スキル">
            <b-form-checkbox-group 
              v-model="form.skills"
              :options="form.skills_options"
              stacked 
              name="スキル"/>
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
  // ログインしていなくても表示できるように
  auth: false,
  asyncData() {
    return {
      form: {
        email: 'your@email.com',
        station: '',
        services: null,
        services_options: [
          { text: '領域１', value: '領域１' },
          { text: '領域２', value: '領域２' },
          { text: '領域３', value: '領域３' }
        ],
        qualifications: [],
        qualifications_options: [
          { text: '資格１', value: '資格１' },
          { text: '資格２', value: '資格２' },
          { text: '資格３', value: '資格３' }
        ],
        skills: [],
        skills_options: [
          { text: 'スキル１', value: 'スキル１' },
          { text: 'スキル２', value: 'スキル２' },
          { text: 'スキル３', value: 'スキル３' }
        ]
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
