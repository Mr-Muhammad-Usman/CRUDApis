<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductImageModel;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
    public function index()
    {
        $product=ProductModel::with('productImage')->get();
        // dd($product[0]->productImage->image_url);
        return view('index',compact('product'));
    }
    public function addProduct()
    {
        return view('product');
    }
    public function createProduct(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);
        $product=new ProductModel;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->save();

        $proImage=new ProductImageModel;
        $proImage->product_id=$product->id;
        if($request->file('image'))
        {
        foreach($request->file('image') as $image)
        {
            $file = $image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().rand(9999,9999).'.'.$extension;
            $file->move('product_images',$filename);
            $proImage->image_url=$filename;
            
        }
        }
        $proImage->save();
        // return back()->with('success','Data Save Successfully');
        return response()->json(['Data Save Successfully'], 200);

    }


    public function updateProduct(Request $request,$id)
    {
        $product=ProductModel::where('id',$id)->first();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->save();


        if($request->file('image'))
        {
        foreach($request->file('image') as $image)
        {
            $proImage=new ProductImageModel;
            $proImage->product_id=$product->id;

            $file = $image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().rand(9999,9999).'.'.$extension;
            $file->move('product_images',$filename);
            $proImage->image_url=$filename;
            $proImage->save();
        }
        }
        // return redirect()->route('index')->with('success','Data Updateed Successfully');
        return response()->json(['Data Updateed Successfully'], 200);

    }

    public function editProduct($id)
    {
        // dd($id);
        $product=ProductModel::with('productImage')->where('id',$id)->first();
        // dd($product);
        return view('updateProduct',compact('product'));

    }

    public function deleteProduct($id)
    {
        // dd($id);
        $product=ProductModel::where('id',$id)->first();
        $proImage=ProductImageModel::where('product_id',$id)->first();
        if(File::exists($proImage->image_url)) 
        {
            File::delete($proImage->image_url);
        }
        $proImage->delete();
        $product->delete();
                // return redirect()->route('index')->with('success','Product deleted Successfully');
                return response()->json(['Product deleted Successfully'], 200);
    }

    public function filterPrice(Request $request)
    {
        $product=ProductModel::where('price','>=', $request->startDate)
        ->Where('price','<=', $request->endDate)->get();
        // return view('index_filter',compact('product'));
        return response()->json($product,200);
    }
}
