<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Contact
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact', route('contact'));
});
// Home > FAQ
Breadcrumbs::register('faq', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('FAQ', route('faq.index'));
});

// Home > Cgu
Breadcrumbs::register('cgu', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('CGU', route('cgu.index'));
});

// Home > Cgv
Breadcrumbs::register('cgv', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('CGV', route('cgv.index'));
});

// Home > cart
Breadcrumbs::register('basket', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cart', route('basket.index'));
});
