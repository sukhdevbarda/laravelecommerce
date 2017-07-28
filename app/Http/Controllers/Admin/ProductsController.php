<?php

namespace App\Http\Controllers\Admin;
use App\Models\categories;
use App\Models\subCategories;
use App\Models\Products;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Validator;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class ProductsController extends Controller
{
    public function allProducts(){
        $products=Products::with('productsImages')->get();
/*echo"<pre>";print_r($products);echo"</pre>";
die();  
*/
        
        return view('admin.products.products',compact('products'));

    }

    public function index(){
    	$categories=categories::select('*')->get();
    	return view('admin.products.create',['categories'=>$categories]);
    }
    public function subcategories(Request $request){
        $cat_id=$request->get('cat_id');
    	$subcategories=SubCategories::select('*')->where('cat_id',$cat_id)->get();
    	if($subcategories){
    	return ['result'=>true,'message'=>'success','subcategories'=>$subcategories];
    	}
    	return ['result'=>false,'message'=>'No Data Available!'];

    }

    public function edit(Request $request){
        $categories=categories::select('*')->get();
        $product=Products::with('productsImages')->where('Products.id',$request->id)->get();
   
        return view('admin.products.edit',compact('categories','product'));
    }


    public function create(Request $request){
        $data=$request->all();

         $validator = Validator::make($request->all(),[
            'category' => 'required',            
            'product_name' => 'required',
            'images' => 'required|max:2000'
        ]);

         if ($validator->fails()) {
            return redirect('admin/products/create')
                ->withErrors($validator)
                ->withInput();
        }
        $product=Products::create([
            'cat_id'=>$data['category'],
            'sub_cat_id'=>$data['subcategory'],
            'name'=>$data['product_name']
            ]);

         foreach ($request->images as $photo) {
            $file=$photo->getClientOriginalName();
            $filename = $photo->storeAs('public/images',$file);
            ProductImages::create([
                'product_id' => $product->id,
                'image' => $filename
            ]);
                    $this->attachmentThumb(file_get_contents($photo), $product->id, $file, 100, 100);
        }
            if($product){

                return redirect('admin/products/create');
            }



    }

    public function attachmentThumb($input, $id, $name, $width, $height)
{
   

           // create new image with transparent background color
    $background = Image::canvas($width, $height);
    // read image file and resize it
    // but keep aspect-ratio and do not size up,
    // so smaller sizes don't stretch
    $image = Image::make($input)->resize($width, $height, function ($c) {
        $c->aspectRatio();
        $c->upsize();
    });
    // insert resized image centered into background
    $background->insert($image, 'center');   // create new image with transparent background color
    $background = Image::canvas($width, $height);
    // read image file and resize it
    // but keep aspect-ratio and do not size up,
    // so smaller sizes don't stretch
    $image = Image::make($input)->resize($width, $height, function ($c) {
        $c->aspectRatio();
        $c->upsize();
    });
    // insert resized image centered into background
    $background->insert($image, 'center');
        $background->save(storage_path().'/app/public/images/'.'thumb_'. $name);


    
    // I also tried: $background->save('storage/app/project/'. $id .'/thumb_'. $name);
}

    public function update(Request $request){
        $data=$request->all();

         $validator = Validator::make($request->all(),[
            'category' => 'required',            
            'product_name' => 'required',
            'images' => 'required|max:2000'
        ]);

         if ($validator->fails()) {
            return redirect('admin/products/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }
        $product=Products::create([
            'cat_id'=>$data['category'],
            'sub_cat_id'=>$data['subcategory'],
            'name'=>$data['product_name']
            ]);
        
         foreach ($request->images as $photo) {
            $file=$photo->getClientOriginalName();
            $filename = $photo->storeAs('public/images',$file);
            ProductImages::create([
                'product_id' => $product->id,
                'image' => $filename
            ]);
        }
            if($product){

                return redirect('admin/products/create');
            }



    }


}
