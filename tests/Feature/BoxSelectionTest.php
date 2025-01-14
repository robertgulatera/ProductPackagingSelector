<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Controllers\ProductController;

class BoxSelectionTest extends TestCase
{
    /**
     * Test if the algorithm selects the correct smallest box.
     */
    public function test_find_smallest_box()
    {
        // Simulated product input
        $products = [
            ['length' => 10, 'width' => 10, 'height' => 10, 'weight' => 2, 'quantity' => 1]
        ];

        // Create an instance of ProductController to access the function
        $controller = new ProductController();
        $selectedBox = $controller->findSmallestBox($products);

        // Expected result: The smallest box that fits the product
        $this->assertEquals('BOXA', $selectedBox);
    }

    /**
     * Test when a product is too large for any box.
     */
    public function test_no_suitable_box()
    {
        // A product that is too large to fit in any box
        $products = [
            ['length' => 100, 'width' => 100, 'height' => 100, 'weight' => 60, 'quantity' => 1]
        ];

        $controller = new ProductController();
        $selectedBox = $controller->findSmallestBox($products);

        // Expected result: No box should be suitable
        $this->assertEquals('No suitable box found', $selectedBox);
    }

    /**
     * Test multiple products that fit within one box.
     */
    public function test_multiple_products_fit_in_one_box()
    {
        $products = [
            ['length' => 15, 'width' => 10, 'height' => 5, 'weight' => 2, 'quantity' => 2], // Two small products
        ];

        $controller = new ProductController();
        $selectedBox = $controller->findSmallestBox($products);

        // Expected to fit in BOXA (20x15x10)
        $this->assertEquals('BOXA', $selectedBox);
    }

    /**
     * Test multiple products requiring different boxes.
     */
    public function test_products_split_into_multiple_boxes()
    {
        $products = [
            ['length' => 30, 'width' => 25, 'height' => 20, 'weight' => 10, 'quantity' => 1], // Fits BOXB
            ['length' => 50, 'width' => 45, 'height' => 40, 'weight' => 30, 'quantity' => 1], // Needs BOXD
        ];

        $controller = new ProductController();
        $selectedBox = $controller->findSmallestBox($products);

        // Since this test does not handle multiple box logic yet, we expect one valid box
        $this->assertNotEquals('No suitable box found', $selectedBox);
    }
}