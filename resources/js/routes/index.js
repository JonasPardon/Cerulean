import DashboardRoutes from './../modules/dashboard/routes';
import ProductRoutes from './../modules/products/routes';

const routes = [
    ...ProductRoutes,
    ...DashboardRoutes,
];

export default routes;