<template>
    <div>
        DASHBOARD
        <v-layout fluid>
            <v-flex xs12 sm6 md3>
                <v-card>
                    <v-card-title>
                        Bar chart
                    </v-card-title>
                    <v-card-text>
                        <apex-chart width="500" type="bar" :options="charts[0].options" :series="charts[0].options.series"></apex-chart>
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
                }
            ]
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
