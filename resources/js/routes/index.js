import ProductList from './../modules/products/components/products/Listing';
import ProductCategoryList from './../modules/products/components/categories/Listing';
import Dashboard from './../modules/dashboard/components/Dashboard';

const routes = [
    {
        name: 'products',
        path: '/products',
        component: ProductList,
    },
    {
        name: 'product_categories',
        path: '/product_categories',
        component: ProductCategoryList,
    },
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard,
    }
];

export default routes;