<?php

//VAT percentage of selected product in invoice
defined('PERCENTAGE_OF_VAT')||define('PERCENTAGE_OF_VAT',0.14);

//currency of invoice
defined('USD')||define('USD','$');

//Measuring Unit Of Product Weight
defined('MEASURING_UNIT')||define('MEASURING_UNIT','kg');

//shipping cost rate for countries by USD
defined('UK_SHIPPING_RATE')||define('UK_SHIPPING_RATE',3);
defined('US_SHIPPING_RATE')||define('US_SHIPPING_RATE',2);
defined('CN_SHIPPING_RATE')||define('CN_SHIPPING_RATE',2);

//weigh of product related with shipping cost (in kg)
defined('SHIPPING_RELATED_WEIGHT')||define('SHIPPING_RELATED_WEIGHT',0.1); //100 gm

//Price of available Products
defined('T_SHIRT_PRICE')||define('T_SHIRT_PRICE',30.99);
defined('BLOUSE_PRICE')||define('BLOUSE_PRICE',10.99);
defined('PANTS_PRICE')||define('PANTS_PRICE',64.99);
defined('SWEATPANTS_PRICE')||define('SWEATPANTS_PRICE',84.99);
defined('JACKET_PRICE')||define('JACKET_PRICE',199.99);
defined('SHOES_PRICE')||define('SHOES_PRICE',79.99);

//weight of available Products in kg
defined('T_SHIRT_WEIGHT')||define('T_SHIRT_WEIGHT',0.2);
defined('BLOUSE_WEIGHT')||define('BLOUSE_WEIGHT',0.3);
defined('PANTS_WEIGHT')||define('PANTS_WEIGHT',0.9);
defined('SWEATPANTS_WEIGHT')||define('SWEATPANTS_WEIGHT',1.1);
defined('JACKET_WEIGHT')||define('JACKET_WEIGHT',2.2);
defined('SHOES_WEIGHT')||define('SHOES_WEIGHT',1.3);

//product with offer
defined('SHOES_PRODUCT_NAME')||define('SHOES_PRODUCT_NAME','Shoes');
defined('T_SHIRT_PRODUCT_NAME')||define('T_SHIRT_PRODUCT_NAME','T-shirt');
defined('BLOUSE_PRODUCT_NAME')||define('BLOUSE_PRODUCT_NAME','Blouse');
defined('JACKET_PRODUCT_NAME')||define('JACKET_PRODUCT_NAME','Jacket');

//available offer
//there is a %10 discount on shoes
defined('SHOES_OFFER_PERCENT')||define('SHOES_OFFER_PERCENT',0.1);
//there is a %50 discount on jacket per two tops items
defined('JACKET_OFFER_PERCENT')||define('JACKET_OFFER_PERCENT',0.5);
//there is a $10 discount of shipping fees
defined('SHIPPING_DISCOUNT_VALUE')||define('SHIPPING_DISCOUNT_VALUE',10);
