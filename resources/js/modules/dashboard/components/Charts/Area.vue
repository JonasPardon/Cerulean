<template>
  <div class="example">
    <apexchart type="area" :options="chartOptions" :series="series"></apexchart>
  </div>
</template>

<script>

import VueApexChart from 'vue-apexcharts';

export default {
  name: 'AreaChart',
  components: {
      'apexchart': VueApexChart,
  },
  data: function() {
    return {
      chartOptions: {
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb"],
        },
        tooltip: {
            fixed: {
                enabled: false,
                position: 'topRight'
            }
        }
      }
      ,
      series: [{
          name: 'series1',
          data: [31, 40, 28, 51, 42, 109, 100, 11, 32, 45, 32, 34, 52, 41]
      }, {
          name: 'series2',
          data: [11, 32, 45, 32, 34, 52, 41, 31, 40, 28, 51, 42, 109, 100]
      }],
    }
  },
}
</script>
