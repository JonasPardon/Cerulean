<template>

    <div>

        <master-datatable 
            title="Product categories"
            :headers="headers"
            :items="categories"
            :loading="loading"
            @add="addCategory"
            @edit="editCategory"
            @delete="deleteCategory"
            crud
            filterable />

        <category-edit 
            v-model='showEditDialog' 
            :dialog='showEditDialog' 
            :category='editable'
            @close='closeEditDialog'
            @save='saveCategory' />
    </div>

</template>

<script>
    import axios from 'axios';
    import Edit from './Edit';
    import moment from 'moment';

    import API from './../../../api';

    import MasterDatatable from './../../../../components/generic/datatable/Master';

    export default {
        name: 'home-component',
        components: {
            'category-edit': Edit,
            'master-datatable': MasterDatatable,
        },
        data() {
            return {
                headers: [
                    { text: 'ID', value: 'id' },
                    { text: 'Name', value: 'name' },
                    { text: 'Created', value: 'created_at.date', type: 'date' },
                    { text: 'Updated', value: 'updated_at.date', type: 'date' },
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
            async fetchCategories() {
                this.loading = true;
                
                API.get('product_categories')
                    .then(res => {
                        this.categories = res;
                        this.loading = false;
                    })
                    .catch(err => {
                        alert(err);
                        this.loading = false;
                    });
            },
            addCategory(category) {
                this.editable = {};
                this.showEditDialog = true;
            },
            deleteCategory(category) {

            },
            editCategory(category) {
                this.editable = category;
                this.showEditDialog = true;
            },
            saveCategory(category) {
                this.loading = true;
                this.showEditDialog = false;

                if (!this.editable.id) {
                    API.post('product_categories', this.editable)
                        .then(res => {
                            this.categories.push(res);
                            this.loading = false;
                        })
                        .catch(err => {
                            alert(err);
                            this.loading = false;
                        });
                } else {
                    API.patch('product_categories', this.editable.id, this.editable)
                        .then(res => {
                            this.editable = {};
                            this.loading = false;
                        })
                        .catch(err => {
                            alert(err);
                            this.editable = {};
                            this.loading = false;
                        });
                }
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
