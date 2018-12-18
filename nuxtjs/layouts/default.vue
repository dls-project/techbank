<template>
  <div>
    <nav class="top-nav">
      <b-link id="logo" to="/">TechBank</b-link>
    </nav>
    <nuxt/>
  </div>
</template>

<style>
html {
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
}

.top-nav {
  height: 50px;
  display: flex;
  align-items: center;
  background:#3B8070;
  color: white;
  padding: 0 1rem;
}
#logo {
  font-size: 1.5rem;
  color: white;
  text-decoration: none;
}
</style>

