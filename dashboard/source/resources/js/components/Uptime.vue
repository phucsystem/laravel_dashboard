<template>
    <tile :position="position">
        <div class="grid gap-padding h-full markup">
            <div class="grid place-center w-10 h-10 rounded-full" style="background-color: rgba(255, 255, 255, .9)">
                <div class="text-3xl leading-none -mt-1" v-html="emoji('🖥️')"/>
            </div>
            <ul class="align-self-center">
                <li v-for="monitor in this.monitors">
                    <span class="font-bold" style="line-height: 0.9em">
                        <a :href="monitor.url" target="_blank">{{monitor.name}}</a>
                        <br>
                        <span style="font-size: 0.6em" class="text-dimmed">Uptime duration: {{monitor.uptime_duration | formatDuration}}</span>
                    </span>
                    <span v-if="monitor.status === 2 " class="font-bold variant-tabular text-online">Online</span>
                    <span v-else class="font-bold variant-tabular text-offline">Offline</span>
                </li>
            </ul>
        </div>
    </tile>
</template>

<script>
    import {emoji} from '../helpers';
    import echo from '../mixins/echo';
    import Tile from './atoms/Tile';
    import {formatDuration} from '../helpers';

    export default {
        components: {
            Tile,
        },

        filters: {
            formatDuration,
        },

        mixins: [echo],

        props: ['position'],

        data() {
            return {
                monitors: []
            };
        },

        computed: {
        },

        methods: {
            emoji,

            getEventHandlers() {
                return {
                    'Uptime.UptimeRobotFetched': response => {
                        this.monitors = response.monitors;
                    },
                };
            },
        },
    };
</script>
