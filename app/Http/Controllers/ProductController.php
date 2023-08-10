<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{

        function product(){

            $products = Product::latest()->paginate(5);

            return view('product', [
                'products'=>$products,
            ]);
        }

        function add_product(Request $request){
            $request->validate([
                'name' => 'required|unique:products',
                'price' => 'required',
            ],
            [
                'name.required' => 'Please fill up Name field',
                'name.unique' => 'Name already taken',
                'price.required' => 'Please Fill up price Filed',
            ]);

            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->created_at = Carbon::now();
            $product->save();

            return response()->json([
                'status'=>'success',
            ]);
        }


        function update_product(Request $request){

            $request->validate([
                'up_name' => 'required',
                'up_price' => 'required',
            ],
            [
                'up_name.required' => 'Please fill up Name field',
                'up_price.required' => 'Please Fill up price Filed',
            ]);

           Product::where('id',$request->up_id)->update([
                'name'=>$request->up_name,
                'price'=>$request->up_price,
                'updated_at'=>Carbon::now(),
           ]);

            return response()->json([
                'status'=>'success',
            ]);
        }

        function delete_product(Request $request){
                Product::findorFail($request->id)->delete();

                return response()->json([
                    'status'=>'success',
                ]);
        }







}
