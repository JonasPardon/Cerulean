<template>
    <div>
        DASHBOARD
        <v-layout fluid>
            <v-flex xs12 sm6 md3 class="ma-2">
                <v-card>
                    <v-card-title>
                        Bar chart
                    </v-card-title>
                    <v-card-text>
                        <apex-chart type="bar" :options="charts[0].options" :series="charts[0].options.series"></apex-chart>
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs12 sm6 md3 class="ma-2">
                <v-card>
                    <v-card-title>
                        Donut chart
                    </v-card-title>
                    <v-card-text>
                        <apex-chart type="donut" :options="charts[1].options" :series="charts[1].options.series"></apex-chart>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
        
    </div>
</template>

<script>
import Vue from 'vue';

import VueApexCharts from 'vue-apexcharts';

// Vue.use(ApexCharts);

export default {
    name: 'dashboard',
    components: {
        'apex-chart': VueApexCharts,
    },
    data() {
        return {
            charts: [
                {
                    options: {
                        chart: {
                            type: 'line'
                        },
                        series: [{
                            name: 'sales',
                            data: [30,40,35,50,49,60,70,91,125]
                        }],
                        xaxis: {
                            categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
                        }
                    }
                },
                {
                    options: {
                        series: [
                            44, 55, 41, 17, 15
                        ]
                    }
                }
            ]
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
