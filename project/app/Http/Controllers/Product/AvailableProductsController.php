<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;

class AvailableProductsController extends Controller
{
    public $available_products = [
        'T-shirt' => [
            'name' => 'T-shirt',
            'price' => T_SHIRT_PRICE,
            'weight' => T_SHIRT_WEIGHT,
            'shipped_from' => 'US',
        ],
        'Blouse' => [
            'name' => 'Blouse',
            'price' => BLOUSE_PRICE,
            'weight' => BLOUSE_WEIGHT,
            'shipped_from' => 'UK',
        ],
        'Pants' => [
            'name' => 'Pants',
            'price' => PANTS_PRICE,
            'weight' => PANTS_WEIGHT,
            'shipped_from' => 'UK',
        ],
        'Sweatpants' => [
            'name' => 'Sweatpants',
            'price' => SWEATPANTS_PRICE,
            'weight' => SWEATPANTS_WEIGHT,
            'shipped_from' => 'CN',
        ],
        'Jacket' => [
            'name' => 'Jacket',
            'price' => JACKET_PRICE,
            'weight' => JACKET_WEIGHT,
            'shipped_from' => 'US',
        ],
        'Shoes' => [
            'name' => 'Pants',
            'price' => SHOES_PRICE,
            'weight' => SHOES_WEIGHT,
            'shipped_from' => 'CN',
        ]
    ];
}