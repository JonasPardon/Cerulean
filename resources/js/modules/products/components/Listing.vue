<template>

    <div>
        <v-card>
            <v-card-title>
                <span class="headline">Products</span>
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
                :items='products'
                class="elevation-1" 
                :loading='loading'
                :crud='true'
                :search='filter' >

                <template slot='items' slot-scope="props">
                    <td>{{ props.item.id }}.</td>
                    <td>{{ props.item.name }}</td>
                    <td>{{ props.item.price_per_unit }}</td>
                    <td>{{ props.item.unit }}</td>
                    <td>{{ props.item.weight }} {{ props.item.weight_unit }}</td>
                    <td>{{ props.item.manufactured_in }}</td>
                    <td>{{ props.item.stock }}</td>
                    <td align='right'>
                        <v-icon small class='mr-2' @click="editItem(props.item)">
                            edit
                        </v-icon>
                        <v-icon small class='mr-2' @click="deleteItem(props.item)">
                            delete
                        </v-icon>
                    </td>
                </template>
            </v-data-table>
        </v-card>

        <product-edit 
            v-model='showEditDialog' 
            :dialog='showEditDialog' 
            :product='editable'
            @close='closeEditDialog'
            @save='saveProduct' />
    </div>

</template>

<script>
    import axios from 'axios';
    import Edit from './Edit';

    export default {
        name: 'home-component',
        components: {
            'product-edit': Edit,
        },
        data() {
            return {
                headers: [
                    { text: 'ID', value: 'id' },
                    { text: 'Name', value: 'name' },
                    { text: 'Price', value: 'price_per_unit'},
                    { text: 'Unit', value: 'unit' },
                    { text: 'Weight', value: 'weight' },
                    { text: 'Manufactured in', value: 'manufactured_in' },
                    { text: 'Stock', value: 'stock' },
                    { text: 'Actions', value: '', align: 'right'}
                ],
                products: [],
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
            this.fetchProducts();
        },
        methods: {
            async fetchProducts(url = null) {
                this.loading = true;
                url = url ? url : '/api/products';
                
                this.callApi(url)
                    .then(response => {
                        this.products = response.data;
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
            editItem(product) {
                this.editable = product;
                this.showEditDialog = true;
            },
            closeEditDialog(response) {
                this.showEditDialog = false;
            },
            async saveProduct(product) {
                this.showEditDialog = false;

                this.loading = true;

                const response = await axios.patch(
                    `/api/products/${product.id}`,
                    product
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
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
