<?php

return [
    'layout' => [
        'title' => ':title | Admin | Ecommerce'
    ],
    'menu' => [
        'category' => 'Category',
    ],
    'breadcrumb' => 'Admin',
    'dashboard' => [
        'title' => 'Dashboard',
    ],
    'categories' => [
        'title' => 'Categories',
        'index' => [
            'title' => 'Categories',
            'table-title' => 'Category List',
            'breadcrumb' => 'Categories',
        ],
        'create' => [
            'title' => 'Add new category',
            'breadcrumb' => 'New Category',
            'form-title' => 'Category Information',
            'name-input' => 'Enter category name',
            'button' => 'Create',
            'success' => 'Create new category successfully!',
        ],
        'edit' => [
            'title' => 'Update the category',
            'breadcrumb' => 'Update the Category',
            'form-title' => 'Category Information',
            'name-input' => 'Enter category name',
            'button' => 'Update',
            'success' => 'Update the category successfully!',
        ],
        'delete' => [
            'success' => 'Delete the category successfully!',
        ],
    ],
];
