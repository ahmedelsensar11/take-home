<?php

namespace Tests\Unit\TestShipping;

use App\Http\Controllers\Shipping\ShippingController;
use PHPUnit\Framework\TestCase;

class ShippingTest extends TestCase
{
    /**
     * @test
     */

    public function it_can_find_product_shipping_fees()
    {
        $product_shipping_fees = (new ShippingController())->getProductShippingFees('shoes');
        $this->assertEquals(26,$product_shipping_fees);
    }
}
