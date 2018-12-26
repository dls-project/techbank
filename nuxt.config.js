require('dotenv').config()

module.exports = {
  mode: 'spa',
  srcDir: "./nuxtjs",
  modules: [
    '@nuxtjs/dotenv',
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    '@nuxtjs/proxy',
    'bootstrap-vue/nuxt',
    'nuxt-fontawesome'
  ],
  env: {
    FRONT_API_URL: process.env.FRONT_API_URL,
    PASSPORT_PASSWORD_GRANT_ID: process.env.PASSPORT_PASSWORD_GRANT_ID,
    PASSPORT_PASSWORD_GRANT_SECRET: process.env.PASSPORT_PASSWORD_GRANT_SECRET,
  },

  axios: { 
    baseURL: 'http://localhost:8000/',
    proxy: true
  },

  auth: {
    plugins: ['~/plugins/mixins/user.js'],
    strategies: {
      local: {
        endpoints: {
          login: { url: 'login', method: 'post', propertyName: 'access_token' },
          user: { url: 'user', method: 'get', propertyName: false },
          logout: false,
        }
      },
    }
  },
  proxy: {
    '/api': 'http://localhost:8000/'
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

  router: {
    // middleware: ['auth']
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

