const nav = [
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
];

export default nav;