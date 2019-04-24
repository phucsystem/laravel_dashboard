<template>
    <tile v-bind:class="{'bg-warn' : isDown}" :position="position" class="markup">
        <div class="grid gap-2 justify-items-center h-full" style="grid-template-rows: auto 1fr auto;">
            <div class="markup">
                <h1>Uptime Robot</h1>
            </div>
            <div class="align-self-center font-bold text-2xl tracking-wide leading-none">
                Status: {{ this.getStatus }}
            </div>
            <div class="">
                <div class="grid gap-2 items-center" style="grid-template-columns: repeat(3, auto);">
                    <span class="text-sm uppercase text-dimmed">Uptime: </span>
                    <span> {{ this.getUptime }} ms</span>
                </div>
                <div class="grid gap-2 items-center" style="grid-template-columns: repeat(3, auto);">
                    <span class="text-sm uppercase text-dimmed">Downtime: </span>
                    <span> {{ this.getDowntime }} ms</span>
                </div>
            </div>
        </div>
    </tile>
</template>

<script>
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
                status: 0,
                uptime: 0,
                downtime: 0
            };
        },

        computed: {
            isDown() {
                if (this.status == 2) {
                    return false;
                }
                return true;
            },
            getStatus() {
                if (this.status == 2) {
                    return 'Up';
                }
                return 'Down';
            },
            getUptime() {
                return Math.round(this.uptime / 60);
            },
            getDowntime() {
                return Math.round(this.downtime / 60);
            }
        },

        methods: {
            getEventHandlers() {
                return {
                    'Uptime.UptimeRobotFetched': response => {
                        this.status = response.status;
                        this.uptime = response.uptime;
                        this.downtime = response.downtime;
                    },
                };
            },
        },
    };
</script>
