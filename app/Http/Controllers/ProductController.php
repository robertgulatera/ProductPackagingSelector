<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Get product details
        $productData = $request->only(['name', 'length', 'width', 'height', 'weight', 'quantity']);
    
        // Check if the product can fit in any box
        if (!$this->canFitInAnyBox($productData)) {
            return redirect()->back()->withErrors(['error' => 'The product is too large to fit in any available box.']);
        }
    
        // Save the product if it fits
        Product::create($productData);
    
        return redirect()->back()->with('success', 'Product added successfully!');
    }
        public function findSmallestBox($products)
    {
        // Corrected predefined boxes
        $boxes = [
            ["name" => "BOXA", "length" => 20, "width" => 15, "height" => 10, "weight_limit" => 5],
            ["name" => "BOXB", "length" => 30, "width" => 25, "height" => 20, "weight_limit" => 10],
            ["name" => "BOXC", "length" => 60, "width" => 55, "height" => 50, "weight_limit" => 50],
            ["name" => "BOXD", "length" => 50, "width" => 45, "height" => 40, "weight_limit" => 30],
            ["name" => "BOXE", "length" => 40, "width" => 35, "height" => 30, "weight_limit" => 20]
        ];
    
        // Sort boxes by volume (smallest to largest)
        usort($boxes, function ($a, $b) {
            return ($a['length'] * $a['width'] * $a['height']) - ($b['length'] * $b['width'] * $b['height']);
        });
    
        foreach ($boxes as $box) {
            if ($this->canFit($products, $box)) {
                return $box['name'];
            }
        }
    
        return 'No suitable box found';
    }

    private function canFit($products, $box)
{
    $totalVolume = 0;
    $totalWeight = 0;

    foreach ($products as $product) {
        $productVolume = $product['length'] * $product['width'] * $product['height'] * $product['quantity'];
        $totalVolume += $productVolume;
        $totalWeight += $product['weight'] * $product['quantity'];

        // Check if the product dimensions fit within the box
        if ($product['length'] > $box['length'] || 
            $product['width'] > $box['width'] || 
            $product['height'] > $box['height']) {
            return false;
        }
    }

    return ($totalVolume <= ($box['length'] * $box['width'] * $box['height'])) &&
           ($totalWeight <= $box['weight_limit']);
}
private function canFitInAnyBox($product)
{
    // Predefined boxes
    $boxes = [
        ["name" => "BOXA", "length" => 20, "width" => 15, "height" => 10, "weight_limit" => 5],
        ["name" => "BOXB", "length" => 30, "width" => 25, "height" => 20, "weight_limit" => 10],
        ["name" => "BOXC", "length" => 60, "width" => 55, "height" => 50, "weight_limit" => 50],
        ["name" => "BOXD", "length" => 50, "width" => 45, "height" => 40, "weight_limit" => 30],
        ["name" => "BOXE", "length" => 40, "width" => 35, "height" => 30, "weight_limit" => 20]
    ];

    foreach ($boxes as $box) {
        if ($product['length'] <= $box['length'] &&
            $product['width'] <= $box['width'] &&
            $product['height'] <= $box['height'] &&
            $product['weight'] <= $box['weight_limit']) {
            return true; // Product fits in at least one box
        }
    }

    return false; // Product does not fit in any box
}

}


