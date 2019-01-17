<template>
  <nav>
    <b-list-group>
      <b-list-group-item 
        v-for="item in links" 
        :key="item.id">
        <b-link 
          :to="item.link"
          :disabled="item.disabled"
          variant="primary">
          {{ item.title }}
        </b-link>
      </b-list-group-item>
    </b-list-group>
  </nav>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      links: [
        // {id:0, title:'認証機能', link:'/login'},
        { id: 1, title: "HOME", link: "/" },
        { id: 2, title: "社員マスタ", link: "/employees" },
        { id: 3, title: "スキルマスタ", link: "/skills" },
        { id: 4, title: "サービスマスタ", link: "/services" },
        { id: 5, title: "資格マスタ", link: "/qualifications" },
        { id: 6, title: "社員スキル", link: "/emps_skills" }
      ]
    }
  },
  methods: {}
}
</script>

<style scoped>
</style>
