<template>

    <div>
        <v-card>
            <v-card-title>
                <span class="headline">Products</span>
                <v-spacer></v-spacer>
                <v-text-field
                    class="search-filter"
                    v-model="filter" 
                    append-icon="search"
                    label="Filter"
                    single-line
                    hide-details />
                <v-btn
                    class="ml-3"
                    color="accent"
                    flat
                    @click='addItem'>
                    <v-icon>add</v-icon>
                    Add
                </v-btn>
            </v-card-title>

            <v-data-table
                :headers='headers'
                :items='products'
                class="elevation-1" 
                :loading='loading'
                :crud='true'
                :search='filter'
                :rows-per-page-items="[25, 50, 100, { 'text': 'All (might be slow)', 'value': -1 }]" >

                <template slot='items' slot-scope="props">
                    <td>{{ props.item.id }}.</td>
                    <td>{{ props.item.name }}</td>
                    <td>{{ props.item.price_per_unit }}</td>
                    <td>{{ props.item.unit }}</td>
                    <td>{{ props.item.weight }} {{ props.item.weight_unit }}</td>
                    <td>{{ props.item.stock }}</td>
                    <td>{{ formatDate(props.item.created_at.date) }}</td>
                    <td>{{ formatDate(props.item.updated_at.date) }}</td>
                    <td align='right'>
                        <v-icon small class='mr-2' @click="editItem(props.item)">
                            edit
                        </v-icon>
                        <v-icon small class='mr-2' @click="deleteItem(props.item)">
                            delete
                        </v-icon>
                        <!-- <v-icon small class='mr-2'>
                            visibility
                        </v-icon> -->
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

        <confirm
            v-model="showConfirmDialog"
            :condition='showConfirmDialog'
            title="Product delete"
            @cancel='showConfirmDialog = false'
            @confirm='confirmDeleteItem' >

            <div class="body-1">Are you sure you want delete this product?</div>

        </confirm>
    </div>
</template>

<script>
    import axios from 'axios';
    import moment from 'moment';
    
    import Edit from './Edit';
    import Confirm from './../../../../components/generic/confirm/Confirm';

    export default {
        name: 'home-component',
        components: {
            'product-edit': Edit,
            'confirm': Confirm,
        },
        data() {
            return {
                headers: [
                    { text: 'ID', value: 'id' },
                    { text: 'Name', value: 'name' },
                    { text: 'Price', value: 'price_per_unit'},
                    { text: 'Unit', value: 'unit' },
                    { text: 'Weight', value: 'weight' },
                    { text: 'Stock', value: 'stock' },
                    { text: 'Created', value: 'created_at' },
                    { text: 'Updated', value: 'updated_at' },
                    { text: '', value: '', align: 'right', sortable: false}
                ],
                products: [],
                links: {},
                loading: false,
                editable: {},
                deleteable: {},
                showEditDialog: false,
                showConfirmDialog: false,
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
            deleteItem(product){
                this.deleteable = product;
                this.showConfirmDialog = true;
            },
            addItem() {
                this.editable = {};
                this.showEditDialog = true;
            },
            async confirmDeleteItem(){
                this.showConfirmDialog = false;
                this.loading = true;

                const response = await axios.delete(`api/products/${this.deleteable.id}`)
                    .then(response => {
                        if(response.status === 200) {
                            this.loading = false;
                            this.products = this.products.filter(product => {
                                return product.id !== this.deleteable.id;
                            });
                            this.deleteable = {};
                        } else {
                            alert(`Something went wrong.\nStatus code: ${response.status}\nStatus message: ${response.statusText}`);
                            this.loading = false;
                            this.deleteable = {};
                        }
                    })
                    .catch(err => {
                        alert(err);
                    });
            },
            closeEditDialog(response) {
                this.showEditDialog = false;
            },
            async saveProduct(product) {
                this.showEditDialog = false;
                this.loading = true;

                if (!this.editable.id) {
                     const response = await axios.post(
                        `/api/products`,
                        product
                        ).then(response => {
                            if(response.status === 201) {
                                this.loading = false;
                                this.products.push(response.data.data);
                            }else{
                                alert(`Something went wrong.\nStatus code: ${response.status}\nStatus message: ${response.statusText}`);
                                this.loading = false;
                            }
                        })
                        .catch(err => {
                            alert(err);
                        });
                } else {
                    const response = await axios.patch(
                        `/api/products/${product.id}`,
                        product
                        ).then(response => {
                            if(response.status === 200) {
                                this.loading = false;
                            }else{
                                alert(`Something went wrong.\nStatus code: ${response.status}\nStatus message: ${response.statusText}`);
                                this.loading = false;
                            }
                        })
                        .catch(err => {
                            alert(err);
                        });
                }
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
.search-filter {
    padding-top: 0;
    margin-top: 0;
}
</style>
