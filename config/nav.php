<?php

return [
    [
        // "icon"   => "nav-icon fas fa-tachometer-alt",
        "route"  => "admin.dashboard",
        "title"  => "dashboard/general.home",
        "active" => "admin.dashboard",
    ],
    [
        "route" => "admin.categories.index",
        "title" => "dashboard/general.categories",
        "badge" => "Eslam",
        "active"=> "admin.categories.*"
    ],
    [
        "route" => "admin.brands.index",
        "title" => "dashboard/general.brands",
        "active"=> "admin.brands.*",
    ],
    [
        "route" => "admin.products.index",
        "title" => "dashboard/general.products",
        "active"=> "admin.products.*",
    ],
];