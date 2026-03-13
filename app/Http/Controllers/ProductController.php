<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
         $data = Product::with('user:id,name,email')  // 👈 only get specific user fields
                        ->get(['id','user_id','pro_name','qty','price','image']); 
        return apiResponse($data,200,'get product successfully');
    }
    public function addProduct(Request $req){
        $data=$req->validate([
            'pro_name'=>'required',
            'qty'=>'integer|required',
            'price'=>'numeric|required',
        ]);
        $data['user_id']=$req->user()->id;
        if($req->hasFile('image')){
            $file=$req->file('image');
            $fileName=$file->getClientOriginalName();
            $file->move('image',$fileName);
            $data['image']=url('image/',$fileName);
        }
        Product::create($data); 
        return apiResponse($data,201,'created successfully');
    }
}
