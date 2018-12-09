<template>

    <div>
        <v-card>
            <v-card-title>
                <span class="headline">Product categories</span>
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="filter" 
                    append-icon="search"
                    label="Filter"
                    single-line
                    hide-details />
            </v-card-title>

            <v-data-table
                :headers='headers'
                :items='categories'
                class="elevation-1" 
                :loading='loading'
                :crud='true'
                :search='filter'
                :rows-per-page-items="[25, 50, 100, { 'text': 'All (might be slow)', 'value': -1 }]" >

                <template slot='items' slot-scope="props">
                    <td>{{ props.item.id }}.</td>
                    <td>{{ props.item.name }}</td>
                    <td>{{ formatDate(props.item.created_at) }}</td>
                    <td>{{ formatDate(props.item.updated_at) }}</td>
                    <td align='right'>
                        <v-icon small class='mr-2' @click="editCategory(props.item)">
                            edit
                        </v-icon>
                        <v-icon small class='mr-2' @click="deleteCategory(props.item)">
                            delete
                        </v-icon>
                    </td>
                </template>
            </v-data-table>
        </v-card>

        <category-edit 
            v-model='showEditDialog' 
            :dialog='showEditDialog' 
            :category='editable'
            @close='closeEditDialog'
            @save='savecategory' />
    </div>

</template>

<script>
    import axios from 'axios';
    import Edit from './Edit';
    import moment from 'moment';

    export default {
        name: 'home-component',
        components: {
            'category-edit': Edit,
        },
        data() {
            return {
                headers: [
                    { text: 'ID', value: 'id' },
                    { text: 'Name', value: 'name' },
                    { text: 'Created', value: 'created_at' },
                    { text: 'Updated', value: 'updated_at' },
                    { text: 'Actions', value: '', align: 'right'}
                ],
                categories: [],
                links: {},
                loading: false,
                editable: {},
                showEditDialog: false,
                filter: null,
            }
        },
        beforeMount() {
            },
        mounted() {
            this.loading = true;  
            this.fetchCategories();
        },
        methods: {
            async fetchCategories(url = null) {
                this.loading = true;
                url = url ? url : '/api/product_categories';
                
                this.callApi(url)
                    .then(response => {
                        this.categories = response.data;
                        this.links = response.links;
                    });
            },
            async callApi(url) {
                return new Promise(async (resolve, reject) => {

                    const response = await axios.get(url);
                    const data = response.data.data;
                    const links = response.data.links;

                    this.loading = false;
                    return resolve({data, links});
                });
            },
            editCategory(category) {
                this.editable = category;
                this.showEditDialog = true;
            },
            closeEditDialog(response) {
                this.showEditDialog = false;
            },
            async savecategory(category) {
                this.showEditDialog = false;

                this.loading = true;

                const response = await axios.patch(
                    `/api/product_categories/${category.id}`,
                    category
                    ).then(response => {
                        if(response.status === 200) {
                            this.loading = false;
                        }else{
                            alert(`Something went wrong.\nStatus code: ${response.status}\nStatus message: ${response.statusText}`)
                            this.loading = false;
                        }
                    })
                    .catch(err => {
                        alert(err);
                    });
            },
            formatDate(date) {
                // return moment(date).format('LL');
                return moment(date).calendar();
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
