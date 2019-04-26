<template>
    <tile :position="position">
        <div class="grid gap-padding h-full markup">
            <div class="grid place-center w-10 h-10 rounded-full" style="background-color: rgba(255, 255, 255, .9)">
                <div class="text-3xl leading-none -mt-1" v-html="emoji('✉')"/>
            </div>
            <ul class="align-self-center">
                <li v-for="mail in mails">
                    <div class="my-2">
                        <div class="font-bold text-md-left">{{ mail.messageSubject }}</div>
                        <div style="font-size: 0.6em" class="text-sm text-dimmed">{{mail.messageDate}}</div>
                    </div>
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
                mails: []
            };
        },

        computed: {
        },

        methods: {
            emoji,

            getEventHandlers() {
                return {
                    'Mail.LastMails': response => {
                        this.mails = response.mails;
                    },
                };
            },
        },
    };
</script>
