require('dotenv').config()

module.exports = {
  env: {
    FRONT_API_URL: process.env.FRONT_API_URL
  },
  srcDir: "./nuxtjs",
  modules: [
    '@nuxtjs/proxy',
    '@nuxtjs/axios',
    'bootstrap-vue/nuxt',
    'nuxt-fontawesome'
  ],

  axios: {
  },

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

