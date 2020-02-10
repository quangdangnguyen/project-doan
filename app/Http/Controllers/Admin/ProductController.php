<?php 

namespace App\Http\Controllers\Admin;

use App\ProductType;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\RedirectResponse;
use Session;
/**
 * 
 */
class ProductController extends Controller
{
	
	public function index ()
	{
		
		$products = Product::paginate(15);
		return view('admin.product.index',[
			'products' => $products
		]);
	}


	public function edit($id)
	{
		$cats = ProductType::all();
		$model = Product::find($id);
		
		return view('admin.product.edit',[
			'model'=>$model,
			'cats'=>$cats
		]);
	}


	public function update($id, Request $request)
	{
		$this -> validate($request,[
			'name' => 'required',
            'id_type' => 'required',
            'slug' => 'required|unique:products,slug,'.$id,
            'unit_price' => 'required|numeric|min:0|not_in:0',
            'promotion_price' => 'required|numeric|min:0|lt:unit_price'
        ],[
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã có trong CSDl',
            'slug.required' => 'Slug sản phẩm không được để trống',
            'slug.unique' => 'Slug sản phẩm đã có trong CSDl',
            'promotion_price.lt' => 'Giá khuyến mãi phải < giá gốc',
            'unit_price.min' => 'Giá phải > 0',
            'unit_price.not_in' => 'Giá phải > 0'
		]);

		$request->offsetUnset('_token'); //Loại bỏ 1 trường token
		$request->offsetUnset('_method');
		//dd($request->only('name','status'));   //Lấy 2 trường cần lấy
		Product::where(['id'=>$id])->update($request->all());
		return redirect()->route('product.index');
	}

	public function destroy($id){
		Product::find($id)->delete();

		return redirect()->back(); //quay lại trang trước đó
	}

	public function create()
	{
		$cats = ProductType::all();
		return view('admin.product.add',compact('cats'));
	}

	public function store(Request $request)
	{
		$this -> validate($request,[
			'name' => 'required',
            'id_type' => 'required',
            'slug' => 'required|unique:products,slug',
            'unit_price' => 'required|numeric|min:0|not_in:0',
            'promotion_price' => 'required|numeric|min:0|lt:unit_price'
        ],[
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã có trong CSDl',
            'slug.required' => 'Slug sản phẩm không được để trống',
            'slug.unique' => 'Slug sản phẩm đã có trong CSDl',
            'promotion_price.lt' => 'Giá khuyến mãi phải < giá gốc',
            'unit_price.min' => 'Giá phải > 0',
            'unit_price.not_in' => 'Giá phải > 0'
		]);

		// $img = str_replace(url('uploads').'/', '',  $request->image);
		// $request->merge(['image'=>$img]);
		Product::create($request->all());
		return redirect()->route('product.index');
	}


	public function product_unactive($id){
		DB::table('products')->where('id',$id)->update(['action'=>0]);
		Session::put('message','Ẩn sản phẩm thành công');
		return redirect()->route('product.index');
	}

	public function product_active($id){
		DB::table('products')->where('id',$id)->update(['action'=>1]);
		Session::put('message','Kích hoạt sản phẩm thành công');
		return redirect()->route('product.index');
	}

}

?>