require('dotenv').config()

module.exports = {
  mode: 'spa',
  env: {
    FRONT_API_URL: process.env.FRONT_API_URL,
    PASSPORT_PASSWORD_GRANT_ID: process.env.PASSPORT_PASSWORD_GRANT_ID,
    PASSPORT_PASSWORD_GRANT_SECRET: process.env.PASSPORT_PASSWORD_GRANT_SECRET,
  },
  srcDir: "./nuxtjs",
  modules: [
    '@nuxtjs/dotenv',
    '@nuxtjs/proxy',
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    'bootstrap-vue/nuxt',
    'nuxt-fontawesome'
  ],

  router: {
    // middleware: ['auth']
  },

  auth: {
    strategies: {
      local: {
        endpoints: {
          login: { url: 'login', method: 'post', propertyName: 'meta.token' },
          user: { url: 'user', method: 'get', propertyName: 'data' },
          logout: { url: 'logout', method: 'post' }
        }
      }
    }
  },

  axios: {
  },

  plugins: ['~plugins/mixins/user.js'],

  proxy: {
    '/api': 'http://localhost:8000'
  },
  /*
  ** fontawesome
  */
  fontawesome: {
    imports: [
      {
        set: '@fortawesome/free-solid-svg-icons',
        icons: ['fas']
      }
    ]
  },
  /*
  ** Headers of the page
  */
  head: {
    title: 'techbank',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Nuxt.js project' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  /*
  ** Customize the progress bar color
  */
  loading: { color: '#3B8070' },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** Run ESLint on save
    */
    extend (config, { isDev, isClient }) {
      if (isDev && isClient) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/,
          options: {
            fix: true
          }
        })
      }
    }
  }
}

