<template>
    <v-card>
        <v-card-title>
            <span class="headline">
                {{ title }}
            </span>
            <v-spacer />
            <v-text-field 
                v-if="filterable"
                class="search-filter"
                v-model="filter"
                append-icon="search"
                label="Filter"
                single-line
                hide-details />
            <v-btn
                v-if="crud"
                class="ml-3"
                color="accent"
                flat
                @click='addItem'>
                <v-icon>add</v-icon>
                Add
            </v-btn>
        </v-card-title>
        <c-datatable
            :crud="crud"
            :filterable="filterable"
            :headers="headers"
            :items="items"
            :loading="loading"
            :filter="filter"
            @edit="editItem"
            @delete="deleteItem" >

        </c-datatable>
    </v-card>
</template>

<script>
import CDatatable from './Datatable';

export default {
    name: 'master-datatable',
    components: {
        'c-datatable': CDatatable,
    },
    props: {
        title: {
            required: true,
            type: String,
        },
        filterable: {
            default: false,
            type: Boolean,
        },
        crud: {
            default: false,
            type: Boolean,
        },
        headers: {
            required: true,
            type: Array,
        },
        items: {
            required: true,
            type: Array,
        },
        loading: {
            default: true,
            type: Boolean,
        },
    },
    data() {
        return {
            filter: '',
        }
    },
    methods: {
        addItem() {
            this.$emit('add');
        },
        editItem(item) {
            this.$emit('edit', item);
        },
        deleteItem(item) {
            this.$emit('delete', item);
        },
    }
}
</script>

<style lang="scss" scoped>

</style>
