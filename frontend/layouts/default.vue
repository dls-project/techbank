<template>
  <div>
    <header class="header">
      <a 
        id="btn-menu" 
        @click="show=!show"><font-awesome-icon icon="bars"/></a>
      <a 
        id="logo" 
        href="/">TechBank</a>
      <div class="user-menu">
        <b-dropdown 
          variant="success" 
          right 
          size="sm">
          <template slot="button-content">
            <font-awesome-icon icon="user"/>
          </template>
          <b-dropdown-item href="#">username</b-dropdown-item>
          <b-dropdown-item @click="logout">ログアウト</b-dropdown-item>
        </b-dropdown>
      </div>
    </header>
    <div class="wrapper">
      <div 
        v-on-clickaway="away" 
        v-show="show" 
        class="left-side">
        <org-menu/>
      </div>
      <div class="main">
        <nuxt/>
      </div>
    </div>
  </div>
</template>

<script>
import OrgMenu from "@/components/organisms/OrgMenu"
import { mixin as clickaway } from "vue-clickaway"
export default {
  components: {
    OrgMenu
  },
  mixins: [clickaway],
  data() {
    return {
      show: true,
      max: 100
    }
  },
  methods: {
    logout() {
      this.$auth.logout()
      this.$router.replace("/login")
    },
    away(e) {
      let element = document.getElementById("btn-menu")
      if (this.show == false) {
        return
      }
      if (element.contains(e.target)) {
        return
      }
      this.show = false
    }
  }
}
</script>
<style>
html {
  font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI",
    Roboto, "Helvetica Neue", Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.header {
  height: 50px;
  display: flex;
  align-items: center;
  /* background:#3B8070; */
  background: indigo;
  color: white;
}
#btn-menu {
  display: block;
  width: 50px;
  background: rgba(0, 0, 0, 0.1);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}
#btn-menu:hover {
  background-color: rgba(0, 0, 0, 0.2);
}
#logo {
  font-size: 1.5rem;
  color: white;
  text-decoration: none;
  margin-left: 10px;
}

.user-menu {
  margin-left: auto;
  margin-right: 10px;
  color: white;
}

.user-menu {
  color: white;
}

.wrapper {
  display: flex;
  align-items: stretch;
  flex-flow: row wrap;
  width: 100%;
  height: calc(100vh - 50px);
}
.wrapper > * {
  /* padding: 10px; */
}
.left-side {
  order: 0;
  width: 250px;
  padding: 15px;
  height: calc(100vh - 50px);
  background: rgba(255, 255, 255, 0.8);
  /* border-right:1px solid gainsboro; */
  position: absolute;
  z-index: 9999;
  box-shadow: 3px 0px 40px rgba(0, 0, 0, 0.4);
}
.main {
  order: 1;
  flex-grow: 1;
  overflow-y: auto;
}
</style>
