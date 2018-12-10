import ProductList from './../modules/products/components/products/Listing';
import ProductCategoryList from './../modules/products/components/categories/Listing';

const routes = [
    {
        name: 'products',
        path: '/products',
        component: ProductList,
    },
    {
        name: 'products.categories',
        path: '/products/categories',
        component: ProductCategoryList,
    }
];

export default routes;