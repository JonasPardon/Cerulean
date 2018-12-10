const nav = [
    {
        name: 'inventory',
        label: 'Inventory',
        icon: 'assignment',
        children: [
            {
                name: 'products',
                label: 'Products',
                // icon: 'tag',
                route: 'products'
            },
            {
                name: 'products.categories',
                label: 'Product categories',
                route: 'products.categories',
            }
        ]
    },
    // {
    //     name: 'test',
    //     label: 'Test',
    //     icon: 'whatshot',
    //     order: 200
    // },
];

export default nav;