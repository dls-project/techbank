const pkg = require("./package")

require("dotenv").config()

module.exports = {
  mode: "spa",

  modules: [
    "@nuxtjs/dotenv",
    "@nuxtjs/axios",
    "@nuxtjs/auth",
    "@nuxtjs/proxy",
    "bootstrap-vue/nuxt",
    "nuxt-fontawesome"
  ],
  env: {
    FRONT_API_URL: process.env.API_URL
  },

  axios: {
    baseURL: "http://localhost:8000/api"
    // credentials: true
    // proxy: true
  },

  plugins: [
    "./plugins/mixins/user.js",
    "./plugins/mixins/validation.js",
    "./plugins/axios.js"
  ],

  auth: {
    strategies: {
      local: {
        endpoints: {
          login: {
            url: "login",
            method: "post",
            propertyName: "meta.token"
          },
          user: { url: "user", method: "get", propertyName: false },
          logout: false
        }
      }
    }
  },
  proxy: {
    // "/api": "http://localhost:8000/"
  },
  /*
  ** fontawesome
  */
  fontawesome: {
    imports: [
      {
        set: "@fortawesome/free-solid-svg-icons",
        icons: ["fas"]
      }
    ]
  },

  router: {
    // middleware: ["auth"]
    middleware: ["clearValidationErrors"]
  },

  /*
  ** Headers of the page
  */
  head: {
    title: pkg.name,
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { hid: "description", name: "description", content: pkg.description }
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }]
  },
  /*
  ** Customize the progress bar color
  */
  loading: { color: "#3B8070" },

  /*
  ** Global CSS
  */
  css: ["@/assets/style.css"],

  /*
  ** Build configuration
  */
  build: {
    /*
    ** Run ESLint on save
    */
    extend(config, { isDev, isClient }) {
      if (isDev && isClient) {
        config.module.rules.push({
          enforce: "pre",
          test: /\.(js|vue)$/,
          loader: "eslint-loader",
          exclude: /(node_modules)/,
          options: {
            fix: true
          }
        })
      }
    }
  }
}
