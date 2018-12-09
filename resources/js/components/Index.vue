<template>

    <div>
        <v-data-table
            :headers='headers'
            :items='products'
            class="elevation-1" 
            :loading='loading'
            :crud='true' >

            <template slot='items' slot-scope="props">
                <td>{{ props.item.id }}.</td>
                <td>{{ props.item.name }}</td>
                <td>{{ props.item.price_per_unit }} {{ props.item.currency }} / {{ props.item.unit }}</td>
                <td>{{ props.item.weight }} {{ props.item.weight_unit }}</td>
                <td>{{ props.item.manufactured_in }}</td>
                <td>{{ props.item.stock }}</td>           
            </template>

        </v-data-table>

        <!-- <button @click='fetchFirstPage'>First page</button>
        <button @click='fetchPreviousPage'>Previous page</button>
        <button @click='fetchNextPage'>Next page</button>
        <button @click='fetchLastPage'>Last page</button> -->
    </div>

</template>

<script>
    import axios from 'axios';

    export default {
        name: 'home-component',
        data() {
            return {
                headers: [
                    { text: 'ID', value: 'id' },
                    { text: 'Name', value: 'name' },
                    { text: 'Price', value: 'price_per_unit'},
                    { text: 'Weight', value: 'weight' },
                    { text: 'Manufactured in', value: 'manufactured_in' },
                    { text: 'Stock', value: 'stock' }
                ],
                products: [],
                links: {},
                loading: false,
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

                    console.log(response.data);
                    this.loading = false;
                    return resolve({data, links});
                });
            },
            fetchNextPage() {
                this.fetchProducts(this.links.next);
            },
            fetchPreviousPage() {
                this.fetchProducts(this.links.prev);
            },
            fetchFirstPage() {
                this.fetchProducts(this.links.first);
            },
            fetchLastPage() {
                this.fetchProducts(this.links.last);
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
