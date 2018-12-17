const nav = [
    {
        name: 'dashboard',
        label: 'Dashboard',
        icon: 'dashboard',
        route: 'dashboard',
    },
    {
        name: 'inventory',
        label: 'Inventory',
        icon: 'assignment',
        children: [
            {
                name: 'products.all',
                label: 'Products',
                route: 'products.all'
            },
            {
                name: 'products.categories',
                label: 'Product categories',
                route: 'products.categories',
            }
        ]
    },
    {
        name: 'crm',
        label: 'CRM',
        icon: 'whatshot',
        children: [
            {
                name: 'crmplaceholder',
                label: 'Placeholder',
                route: 'crm_placeholder'
            }
        ],
    },
    {
        name: 'hrm',
        label: 'HRM',
        icon: 'people',
        children: [
            {
                name: 'hrmplaceholder',
                label: 'Placeholder',
                route: 'crm_placeholder'
            }
        ],
    },
    {
        name: 'sales',
        label: 'Sales',
        icon: 'shopping_cart',
        route: 'sales_placeholder'
    }
];

export default nav;