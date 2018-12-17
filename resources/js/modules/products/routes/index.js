import ProductList from './../components/products/Listing';
import CategoryList from './../components/categories/Listing';

const routes = [
    {
        name: 'products.all',
        path: '/products/all',
        component: ProductList,
    },
    {
        name: 'products.categories',
        path: '/products/categories',
        component: CategoryList,
    }
];

export default routes;