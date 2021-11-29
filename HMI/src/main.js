import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createI18n } from 'vue-i18n'

const messages = {
  
    fr: {
      message: {
        filtreFruit: 'Fruits',
        filtreLeg: 'Légumes',
        filtreAll: 'Tous',
        accueil: 'Accueil',
        apropos: 'À Propos',
        inscription: "S'inscrire",
        connexion: 'Connexion',
      }
    },
    en: {
      message: {
        filtreFruit: 'Fruits',
        filtreLeg: 'Vegetables',
        filtreAll: 'All',
        accueil: 'Home',
        apropos: 'About',
        inscription: 'Sign In',
        connexion: 'Sign Up',
      }
    }
  }
  
  
  // Create VueI18n instance with options
  const i18n = createI18n({
    globalInjection: true,
    locale: localStorage.getItem("locale"), 
    fallbackLocale: "fr",
    messages, // set locale messages
  })

createApp(App).use(router).use(i18n).mount('#app')
