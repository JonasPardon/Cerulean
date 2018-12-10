const nav = [
    {
        name: 'inventory',
        label: 'Inventory',
        icon: 'assignment',
        children: [
            {
                name: 'products',
                label: 'Products',
                route: 'products'
            },
            {
                name: 'products.categories',
                label: 'Product categories',
                route: 'product_categories',
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
    }
];

export default nav;