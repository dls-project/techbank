<template>
  <section >
    <b-list-group>
      <b-list-group-item v-for="item in links" :key="item.id">
        <b-link 
          variant="primary"
          :to="item.link"
          :disabled="item.disabled">
          {{item.title}}
        </b-link>{{item.link}}
        <b-progress :value="item.sts" :max="max" show-progress animated></b-progress>
      </b-list-group-item>
    </b-list-group>
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
      links:[
              {id:0, title:'Layout', link:'/', disabled:true, sts:30},
              {id:1, title:'認証機能', link:'/login', disabled:false, sts:40},
              {id:2, title:'社員マスタ', link:'/employees', disabled:false, sts:50},
              {id:3, title:'スキルマスタ', link:'＃', disabled:true, sts:10},
              {id:4, title:'サービスマスタ', link:'＃', disabled:true, sts:10},
              {id:5, title:'資格マスタ', link:'＃', disabled:true, sts:0},
              {id:6, title:'保有スキル', link:'＃', disabled:true, sts:10}
            ],
      max:100
    }
  }
}
</script>

<style scoped>

</style>

