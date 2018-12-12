import ProductList from './../modules/products/components/products/Listing';
import ProductCategoryList from './../modules/products/components/categories/Listing';

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
    }
];

export default routes;