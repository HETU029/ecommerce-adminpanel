<?php

Breadcrumbs::register('admin.productcategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.productcategories.management'), route('admin.productcategories.index'));
});

Breadcrumbs::register('admin.productcategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.productcategories.index');
    $breadcrumbs->push(trans('menus.backend.productcategories.create'), route('admin.productcategories.create'));
});

Breadcrumbs::register('admin.productcategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.productcategories.index');
    $breadcrumbs->push(trans('menus.backend.productcategories.edit'), route('admin.productcategories.edit', $id));
});
