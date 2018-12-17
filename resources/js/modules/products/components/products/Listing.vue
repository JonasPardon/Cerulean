<template>

    <div>

        <master-datatable
            title="Products"
            :headers="headers"
            :items="products"
            crud
            filterable
            :loading="loading"
            @add="addItem"
            @edit="editItem"
            @delete="deleteItem" />

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

    import API from './../../../api';
    
    import Edit from './Edit';
    import Confirm from './../../../../components/generic/confirm/Confirm';
    import MasterDatatable from './../../../../components/generic/datatable/Master';

    export default {
        name: 'home-component',
        components: {
            'product-edit': Edit,
            'confirm': Confirm,
            'master-datatable': MasterDatatable,
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
                    { text: 'Created', value: 'created_at.date', type: 'date' },
                    { text: 'Updated', value: 'updated_at.date', type: 'date' },
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

                API.get('products')
                    .then(res => {
                        this.loading = false;
                        this.products = res;
                    })
                    .catch(err => {
                        alert(err);
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

                API.delete('products', this.deleteable.id)
                    .then(res => {
                        this.loading = false;
                        this.products = this.products.filter(product => {
                            return product.id !== this.deleteable.id;
                        });
                        this.deleteable = {};
                    })
                    .catch(err => {
                        alert(err);
                        this.loading = false;
                        this.deleteable = {};
                    });
            },
            closeEditDialog(response) {
                this.showEditDialog = false;
            },
            async saveProduct(product) {
                this.showEditDialog = false;
                this.loading = true;

                if (!this.editable.id) {
                    API.post('products', product)
                        .then(res => {
                            this.loading = false;
                            this.products.push(res);
                        })
                        .catch(err => {
                            alert(err);
                            this.loading = false;
                        });
                } else {
                    API.patch('products', product.id, product)
                        .then(res => {
                            this.loading = false;
                        })
                        .catch(err => {
                            alert(err);
                            this.loading = false;
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
