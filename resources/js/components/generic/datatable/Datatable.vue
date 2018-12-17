<template>
    <v-data-table
        :headers='headers'
        :items='items'
        class="elevation-1" 
        :loading='loading'
        :crud='true'
        :search='filter'
        :rows-per-page-items="[25, 50, 100, { 'text': 'All (might be slow)', 'value': -1 }]" >

        <template slot="items" slot-scope="{ item }">
            <tr>
                <td v-for="header in $props.headers"
                    :key="header.value" >

                    <span v-if="header.type == 'date'">
                        {{ formatDate(dashGet(item, header.value)) }}
                    </span>
                    <span v-else>
                        {{ isNumber(dashGet(item, header.value)) ? toLocalNumber(dashGet(item, header.value)) : dashGet(item, header.value) }}
                    </span>

                </td>
                <td v-if="crud" align="right">
                    <slot name="actions"></slot>

                    <v-icon small class='mr-2' @click="editItem(item)" title="edit">
                        edit
                    </v-icon>
                    <v-icon small class='mr-2' @click="deleteItem(item)" title="delete">
                        delete
                    </v-icon>
                </td>
            </tr>
        </template>

        <template slot="no-data">
            <slot name="no-data">
                <v-alert
                    :value="true"
                    color="error"
                    icon="warning"
                    v-if="!loading"
                >
                    {{ noResultText }}
                </v-alert>
            </slot>
        </template>

    </v-data-table>
</template>

<script>
import moment from 'moment';

import dashGet from './../../../lib/dashGet';

export default {
    name: 'c-datatable',
    components: {

    },
    props: {
        crud: {
            type: Boolean,
            default: false,
        },
        headers: {
            required: true,
            type: Array,
        },
        items: {
            required: true,
            type: Array,
        },
        noResultText: {
            type: String,
            default: 'No data available',
        },
        loading: {
            type: Boolean,
            default: true,
        },
        filter: {
            type: String,
            default: '',
        }
    },
    data() {
        return {
            
            }
    },
    beforeMount() {
        if(this.crud) {
            this.headers.push({text: '', value: ''});
        }
    },
    methods: {
        dashGet,
        editItem(item) {
            this.$emit('edit', item);
        },
        deleteItem(item) {
            this.$emit('delete', item);
        },
        isNumber(value) {
            return typeof(value) == 'number';
        },
        toLocalNumber(value) {
            return value.toLocaleString('be-NL', { maximumSignificantDigits: 5 });
        },
        formatDate(date) {
            // return moment(date).format('LL');
            return moment(date).calendar();
            // return date;
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
