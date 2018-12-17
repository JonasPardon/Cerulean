<template>
    <div>
        <v-layout fluid>
            <v-flex xs12 sm6 md3 class="ma-2">
                <v-card>
                    <v-card-title>
                        Bar chart
                    </v-card-title>
                    <v-card-text>
                        <bar-chart></bar-chart>
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs12 sm6 md6 class="ma-2">
                <v-card>
                    <v-card-title>
                        Area chart
                    </v-card-title>
                    <v-card-text>
                        <area-chart></area-chart>
                    </v-card-text>
                </v-card>
            </v-flex>
             <v-flex xs12 sm6 md3 class="ma-2">
                <v-card>
                    <v-card-title>
                        Bar chart
                    </v-card-title>
                    <v-card-text>
                        <bar-chart></bar-chart>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
        
    </div>
</template>

<script>
import Vue from 'vue';

import VueApexCharts from 'vue-apexcharts';
import BarChart from './Charts/Bar';
import AreaChart from './Charts/Area';

// Vue.use(ApexCharts);

export default {
    name: 'dashboard',
    components: {
        'apex-chart': VueApexCharts,
        'bar-chart': BarChart,
        'area-chart': AreaChart,
    },
    data() {
        return {}
    },
    mounted() {
        this.$nextTick(() => {
            window.dispatchEvent(new Event('resize'));
        });
    }
}
</script>

<style lang="scss" scoped>
.chart-small {
    max-width: 100%;
}
</style>
