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
        plantType: 'Type de plante : ',
        plantSeason: 'Saison : ',
        sowDate: 'Date de semance : ',
        harvestDate: 'Date de récolte : ',
        daysConservation: 'Temps de conservation : ',
        plantDistance: 'Distance de plants : ',
        groundType: 'Type de sol : ',
        description: 'Fonctionnement : ',
        favCond: 'Conditions Favorables',
        problems: 'Problèmes',
        problem: 'Problème',
        optimal: 'optimale',
        connect: 'Se connecter',
        mail: 'Adresse Courriel : ',
        password: 'Mot de passe : ',
        rememberMe: 'Se rappeler de moi',
        firstName: 'Prénom : ',
        lastName: 'Nom de famille : ',
        search: 'Rechercher'
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
        plantType: 'Plant type : ',
        plantSeason: 'Season : ',
        sowDate: 'Sow date : ',
        harvestDate: 'harvest date : ',
        daysConservation: 'Conservation time : ',
        plantDistance: 'Plant distance ',
        groundType: 'Ground type : ',
        description: 'Functionning : ',
        favCond: 'favorable conditions',
        problems: 'Problems',
        problem: 'Problem : ',
        optimal: 'optimal',
        connect: 'Sign up',
        mail: 'Email address ',
        password: 'Password ',
        rememberMe: 'Remember me',
        passwordForgot: 'Forgot your password?',
        problemType: 'Problem type : ',
        solution: 'Solution : ',
        firstName: 'First name ',
        lastName: 'Last name ',
        search: 'Search'
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
