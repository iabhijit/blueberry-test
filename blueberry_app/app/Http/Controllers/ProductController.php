<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
       $result['products']=Product::all();
       return view('products',$result);
    }


    public function create(Request $request,$id='')
    {
        if($id>0){
            $product_arr=Product::where(['id'=>$id])->get();
            $result['title']=$product_arr[0]->title;
            $result['price']=$product_arr[0]->price;
            $result['stock']=$product_arr[0]->stock;
            $result['image']=$product_arr[0]->image;
            $result['id']=$product_arr[0]->id;

        }else{
            $result['title']='';
            $result['image']='';
            $result['price']='';
            $result['stock']='';
            $result['id']=0;
        }

        return view('manage_product',$result);
    }

    public function manage_product_process(Request $request)
    {
        //return $request->post();
        if($request->post('id')>0){
            $img_validation='mimes:jpeg,jpg,png,'.$request->post('id');

        }else{
            $img_validation='required|mimes:jpeg,jpg,png,'.$request->post('id');

        }

        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'image'=>$img_validation,

        ]);

        if($request->post('id')>0){
            $model=Product::find($request->post('id'));
            $msg="You have successfully updated product!";
        }else{
            $model=new Product();
            $msg="You have successfully created product!";
        }

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            Storage::disk('public_uploads')->putFileAs($image, $image_name);
            $model->image=$image_name;
        }



        $model->title=$request->post('title');
        $model->price=$request->post('price');
        $model->stock=$request->post('stock');

        $model->save();
        session()->flash('success',$msg);
        return redirect('products/manage-product');
    }
    public function delete(Request $request,$id)
    {
       $model=Product::find($id);
       $model->delete();
       session()->flash('success','Product moved to trash successfully!');
       return redirect('products');
    }
    public function restore(Request $request,$id)
    {
       $model=Product::withTrashed()->find($id);
       $model->restore();
       session()->flash('success','Product restored successfully!');
       return redirect('products');
    }

    public function forcedelete(Request $request,$id)
    {
       $model=Product::withTrashed()->find($id);
       $model->forceDelete();
       session()->flash('success','Product permanently deleted successfully!');
       return redirect('products');
    }


    public function trash()
    {
       $result['products']=Product::onlyTrashed()->get();
       return view('trashproducts',$result);
    }

    public function frontendlist()
    {
       $result['products']=Product::all();
       return view('welcome',$result);
    }

}
