<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::all();
        return view('admin.catagory', compact('data'));
    }
    public function add_catagory(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        $data = new Catagory;
        $data->catagory_name = $request['catagory'];
        $data->save();

        return redirect()->back()->with('message', 'Catagory Added Successfully');
    }
    public function delete_catagory($id)
    {
        Catagory::find($id)->delete();
        return redirect()->back()->with('message', 'Catagory Deleted Successfully');
    }
    public function view_product()
    {
        $catagory = Catagory::all();
        return view('admin.product', compact('catagory'));
    }
    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;        
        $product->catagory = $request->catagory;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $image = $request->image;
        $imagename = time().".".$request->image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }
}
