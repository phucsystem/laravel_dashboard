import './bootstrap.js';

import Echo from 'laravel-echo';
import Vue from 'vue';
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

import Dashboard from './components/Dashboard';
import Calendar from './components/Calendar';
import Statistics from './components/Statistics';
import InternetConnection from './components/InternetConnection';
import TeamMember from './components/TeamMember';
import TimeWeather from './components/TimeWeather';
import Trains from './components/Trains';
import Twitter from './components/Twitter';
import Uptime from './components/Uptime';
import Velo from './components/Velo';
import TileTimer from './components/TileTimer';
import LastMails from './components/LastMails';
import Orders from './components/Orders';

const messages = {
    en: {
        message: {
            uptime: 'Uptime duration',
            dashboard: 'Dashboard',
            pending: 'Pending',
            onhold: 'On-hold',
            completed: 'Completed',
            online: 'Online',
            offline: 'Offline'
        }
    },
    se: {
        message: {
        }
    }
}

// Create VueI18n instance with options
const i18n = new VueI18n({
    locale: 'en', // set locale
    messages, // set locale messages
})

new Vue({
    el: '#dashboard',
    i18n,

    components: {
        Dashboard,
        Calendar,
        Statistics,
        InternetConnection,
        TeamMember,
        TimeWeather,
        Trains,
        Twitter,
        Uptime,
        Velo,
        TileTimer,
        LastMails,
        Orders
    },

    created() {
        let config = {
            broadcaster: 'pusher',
            key: window.dashboard.pusherKey,
            cluster: window.dashboard.pusherCluster,
            wsHost: window.location.hostname,
            wsPath: window.dashboard.clientConnectionPath,
            wsPort: window.dashboard.wsPort,
            disableStats: true,
        };

        if (window.dashboard.environment === 'local') {
            config.wsPort = 6001;
        }

        this.echo = new Echo(config);
    },
});
