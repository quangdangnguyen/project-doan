<?php 

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * 
 */
class CategoryController extends Controller
{
	
	public function index ()
	{
		//$cats = Category::all();
		$cats = Category::paginate(5);
		return view('admin.category.index',[
			'cats' => $cats
		]);
	}

	public function edit($id)
	{
		$model = Category::find($id);
		
		return view('admin.category.edit',[
			'model'=>$model
		]);
	}


	public function update($id, Request $request)
	{
		$this -> validate($request,[
			'name' => 'required|unique:type_products,name'
		],[
			'name.required' => 'Tên danh mục không được để trống',
			'name.unique' => 'Tên danh mục đã có trong CSDL'
		]);

		$request->offsetUnset('_token'); //Loại bỏ 1 trường token
		$request->offsetUnset('_method');
		//dd($request->only('name','status'));   //Lấy 2 trường cần lấy
		Category::where(['id'=>$id])->update($request->all());
		return redirect()->route('category.index');
	}

	public function destroy($id){
		Category::find($id)->delete();

		return redirect()->back(); //quay lại trang trước đó
	}

	public function create()
	{
		return view('admin.category.add');
	}

	public function store(Request $request)
	{
		$this -> validate($request,[
			'name' => 'required|unique:type_products,name'
		],[
			'name.required' => 'Tên danh mục không được để trống',
			'name.unique' => 'Tên danh mục đã có trong CSDL'
		]);

		Category::create($request->all());
		return redirect()->route('category.index');
	}




}

?>