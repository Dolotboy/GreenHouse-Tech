// If using a module system (e.g. via vue-cli), import Vue and VueI18n and then call Vue.use(VueI18n).

import Vue from './unpkgVue.js'
import VueI18n from './vue-i18n.js'

Vue.use(VueI18n)

// Ready translated locale messages
const messages = {
  
  fr: {
    message: {
      leg: 'légume'
    }
  },
  en: {
    message: {
      leg: 'vegetable'
    }
  }
}


// Create VueI18n instance with options
const i18n = new VueI18n({
  globalInjection: true,
  locale: localStorage.getItem("locale"), // set locale
  messages, // set locale messages
})


// Create a Vue instance with `i18n` option
new Vue({ i18n }).$mount('#app')

// Now the app has started!

