<?php

return [
    [
        // "icon"   => "nav-icon fas fa-tachometer-alt",
        "route"  => "admin.dashboard",
        "title"  => "الرئيسية",
        "active" => "admin.dashboard",
    ],
    [
        "route" => "admin.categories.index",
        "title" => "الاقسام",
        "badge" => "Eslam",
        "active"=> "admin.categories.*"
    ],
    [
        "route" => "admin.brands",
        "title" => "البراندات",
        "active"=> "admin.brands.*",
    ],
    [
        "route" => "admin.products",
        "title" => "المنتجات",
        "active"=> "admin.products.*",
    ],
];