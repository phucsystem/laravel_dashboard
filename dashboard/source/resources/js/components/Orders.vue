<template>
    <tile :position="position">
        <div class="grid gap-padding h-full markup">
            <div class="grid place-center w-10 h-10 rounded-full" style="background-color: rgba(255, 255, 255, .9)">
                <div class="text-3xl leading-none -mt-1" v-html="emoji('📦')"/>
            </div>
            <ul class="align-self-center">
                <li v-for="order in orders">
                    <span class="font-bold" style="line-height: 0.9em">
                        {{order.number}}
                        <br>
                        <span style="font-size: 0.6em" class="text-dimmed">{{order.date_created}}</span>
                    </span>
                    <span class="font-bold variant-tabular text-dimmed">{{order.status}}</span>
                </li>
            </ul>
        </div>
    </tile>
</template>

<script>
import { emoji, formatNumber } from '../helpers';
import echo from '../mixins/echo';
import Tile from './atoms/Tile';

export default {
    components: {
        Tile,
    },

    mixins: [echo],

    props: ['position'],

    data() {
        return {
            orders: [],
        };
    },

    methods: {
        emoji,
        formatNumber,
        getEventHandlers() {
            return {
                'Statistics.WooCommerceOrderFetched': response => {
                    this.orders = response.orders;
                },
            };
        },
    },
};
</script>
