<template>
  <div>
    <header class="header">
      <a class="btn-menu" @click="show=!show"><font-awesome-icon icon="bars"/></a>
      <a id="logo" href="/">TechBank</a>
    </header>
    <div class="wrapper">
      <nav class="menu-bar" v-show="show">
        <b-list-group>
          <b-list-group-item v-for="item in links" :key="item.id">
            <b-link 
              variant="primary"
              :to="item.link"
              :disabled="item.disabled">
              {{item.title}}
            </b-link>{{item.link}}
            <b-progress
              :variant="item.variant"
              :value="item.sts"
              :max="max"
              height="6px"
              animated
            />
          </b-list-group-item>
        </b-list-group>
      </nav>
      <div class="main">
        <nuxt/>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      show: true,
      links:[
        {id:0, title:'認証機能', link:'/login', disabled:false, sts:40, variant:'danger'},
        {id:1, title:'HOME', link:'/', disabled:false, sts:30},
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
<style>
html, {
  font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*, *:before, *:after {
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
.btn-menu {
  display: block;
  width: 50px;
  background: rgba(0,0,0,0.1);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}
.btn-menu:hover {
  background-color: rgba(0,0,0,0.2)
}
#logo {
  font-size: 1.5rem;
  color: white;
  text-decoration: none;
  margin-left: 10px;
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
.menu-bar {
  order: 0;
  width: 250px;
  padding: 15px;
  background: #f5f5f5;
  border-right:1px solid gainsboro;
}
.main {
  order: 1;
  flex-grow: 1;
  overflow-y: auto;
}
</style>