<?php

return [
    'layout' => [
        'title' => ':title Admin | Ecommerce'
    ],
    'menu' => [
        'categories' => 'Categories',
        'users' => 'Users',
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
    'users' => [
        'title' => 'Users',
        'index' => [
            'title' => 'Users',
            'table-title' => 'User List',
            'breadcrumb' => 'Users',
        ],
        'create' => [
            'title' => 'Add new user',
            'breadcrumb' => 'New User',
            'form-title' => 'User Information',
            'name-input' => 'Enter user name',
            'button' => 'Create',
            'success' => 'Create new user successfully!',
        ],
        'edit' => [
            'title' => 'Update the user',
            'breadcrumb' => 'Update the User',
            'form-title' => 'User Information',
            'name-input' => 'Enter user name',
            'button' => 'Update',
            'success' => 'Update the user successfully!',
        ],
        'delete' => [
            'success' => 'Delete the user successfully!',
        ],
    ],
];
