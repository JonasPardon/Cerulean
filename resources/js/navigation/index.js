import DashboardNav from './../modules/dashboard/navigation';
import ProductsNav from './../modules/products/navigation';

const nav = [
    ...DashboardNav,
    ...ProductsNav,
    // {
    //     name: 'crm',
    //     label: 'CRM',
    //     icon: 'whatshot',
    //     children: [
    //         {
    //             name: 'crmplaceholder',
    //             label: 'Placeholder',
    //             route: 'crm_placeholder'
    //         }
    //     ],
    // },
    // {
    //     name: 'hrm',
    //     label: 'HRM',
    //     icon: 'people',
    //     children: [
    //         {
    //             name: 'hrmplaceholder',
    //             label: 'Placeholder',
    //             route: 'crm_placeholder'
    //         }
    //     ],
    // },
    // {
    //     name: 'sales',
    //     label: 'Sales',
    //     icon: 'shopping_cart',
    //     route: 'sales_placeholder'
    // }
];

export default nav;