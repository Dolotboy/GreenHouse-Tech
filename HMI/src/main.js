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
        APIInterface: "Interface de l'API",
        apropos: 'À Propos',
        signIn: 'Connexion',
        signUp: "S'inscrire",
        hi: 'Bonjour, ',
        profileNumber: 'numéro du profil',
        disconnect: 'Se déconnecter',
        plantName: 'Nom de la plante',
        plantType: 'Type de plante',
        plantSeason: 'Saison',
        sowDate: 'Date de semance',
        harvestDate: 'Date de récolte',
        daysConservation: 'Temps de conservation',
        plantDistance: 'Distance de plants',
        groundType: 'Type de sol',
        description: 'Fonctionnement',
        neighboor: 'Voisinage',
        difficulty: 'Difficulté',
        family: 'Famille',
        favCond: 'Conditions Favorables',
        problems: 'Problèmes',
        problem: 'Problème',
        optimal: 'Optimale',
        login: 'Se connecter',
        logout: 'Se déconnecter',
        mail: 'Adresse Courriel ',
        password: 'Mot de passe ',
        passwordConfirm: 'Confirmation du mot de passe',
        rememberMe: 'Se rappeler de moi',
        passwordForgot: 'Vous avez oublié votre mot de passe ?',
        favorite: 'Favoris',
        problemType: 'Type de problème',
        firstName: 'Prénom ',
        lastName: 'Nom de famille ',
        decisionHelping: 'Aide à la décision ',
        serreTech: 'Serre-Tech',
        search: 'Rechercher',
        type: 'Type',
        easy: 'Facile',
        medium: 'Moyen',
        hard: 'Difficile',
        alphabetical: 'alphabétique'
      }
    },
    en: {
      message: {
        filtreFruit: 'Fruits',
        filtreLeg: 'Vegetables',
        filtreAll: 'All',
        accueil: 'Home',
        APIInterface: "API interface",
        apropos: 'About',
        signIn: 'Sign In',
        signUp: 'Sign up',
        hi: 'hi, ',
        profileNumber: 'Profile number',
        disconnect: 'Disconnect',
        plantName: 'Plant name',
        plantType: 'Plant type',
        plantSeason: 'Season',
        sowDate: 'Sow date',
        harvestDate: 'Harvest date',
        daysConservation: 'Conservation time',
        plantDistance: 'Plant distance ',
        groundType: 'Ground type',
        description: 'Functioning',
        neighboor: 'Neighbor',
        difficulty: 'Difficulty',
        family: 'Family',
        favCond: 'Favorable conditions',
        problems: 'Problems',
        problem: 'Problem',
        optimal: 'Optimal',
        login: 'login',
        logout: 'logout',
        mail: 'Email address ',
        password: 'Password ',
        passwordConfirm: 'Password confirmation ',
        rememberMe: 'Remember me',
        passwordForgot: 'Forgot your password?',
        favorite: 'Favoris',
        problemType: 'Problem type',
        solution: 'Solution',
        firstName: 'First name ',
        lastName: 'Last name ',
        decisionHelping: 'Decision helping ',
        serreTech: 'Serre-Tech',
        search: 'Search',
        type: 'Type',
        easy: 'Easy',
        medium: 'Medium',
        hard: 'Hard',
        alphabetical: 'Alphabetical'
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
