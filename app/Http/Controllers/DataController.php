<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DataController extends Controller
{
    public function storeFromBrowser(Request $request)
    {
        $products = $request->input('array');

        foreach ($products as $item) {
            Product::create([
                'code' => $item['code']?? null,
                'name' => $item['name']?? null ,
                'qty' => $item['qty'] ?? 0,
                'warehouse' => $item['warehouse'] ?? null,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Products saved to MySQL'
        ]);
    }
}





