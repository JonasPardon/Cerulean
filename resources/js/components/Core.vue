<template>
  <v-app>
    <navigation :drawer='drawer' />
    <v-toolbar color="main" dark fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Laravel ERP</v-toolbar-title>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height>
        <v-layout
          justify-center
        >
          <v-flex xs12>
            <!-- <product-list></product-list>
            <product-category-list class="mt-5"></product-category-list> -->
            <router-view></router-view>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
    <v-footer color="main" app>
      <span class="white--text">&copy; Laravel ERP</span>
      <span class=white--text> | Version: 0.0.1</span>
    </v-footer>
  </v-app>
</template>

<script>
  import Navigation from './navigation/Navigation';
  import ProductList from './../modules/products/components/products/Listing';
  import ProductCategoryList from './../modules/products/components/categories/Listing';

  export default {
    name: 'core',
    data() {
      return {
        drawer: true,
      }
    },
    components: {
      'navigation': Navigation,
      'product-list': ProductList,
      'product-category-list': ProductCategoryList,
    },
    props: {
      source: String
    }
  }
</script>