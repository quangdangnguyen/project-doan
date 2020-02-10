<?php 

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\RedirectResponse;
use Session;

/**
 * 
 */
class BannerController extends Controller
{
	public function index ()
	{
		
		$slides = Slide::all();
		return view('admin.banner.index',[
			'slides' => $slides
		]);
	}

	public function edit($id)
	{
		$model = Slide::find($id);
		
		return view('admin.banner.edit',[
			'model'=>$model
		]);
	}


	public function update($id, Request $request)
	{
		$this -> validate($request,[
			'image' => 'required|unique:slide,name'
		],[
			'image.required' => 'Ảnh không được để trống',
			'image.unique' => 'Ảnh đã có trong CSDL'
		]);

		$request->offsetUnset('_token'); //Loại bỏ 1 trường token
		$request->offsetUnset('_method');
		//dd($request->only('name','status'));   //Lấy 2 trường cần lấy
		Slide::where(['id'=>$id])->update($request->all());
		return redirect()->route('banner.index');
	}

	public function destroy($id){
		Slide::find($id)->delete();

		return redirect()->back(); //quay lại trang trước đó
	}

	public function create()
	{
		return view('admin.banner.add');
	}

	public function store(Request $request)
	{
		$this -> validate($request,[
			'image' => 'required|unique:slide,name'
		],[
			'image.required' => 'Ảnh không được để trống',
			'image.unique' => 'Ảnh đã có trong CSDL'
		]);

		$slide = new Slide;
		$slide->name = $request->name;
		if($request->has('link'))
			$slide->link = $request->link;
		$slide->description = $request->description;
		$slide->image = $request->image;
		$slide->action = $request->action;
		$slide->save();
		return redirect()->route('banner.index');
	}

	public function banner_unactive($id){
		DB::table('slide')->where('id',$id)->update(['action'=>0]);
		Session::put('message','Ẩn banner thành công');
		return redirect()->route('banner.index');
	}

	public function banner_active($id){
		DB::table('slide')->where('id',$id)->update(['action'=>1]);
		Session::put('message','Kích hoạt banner thành công');
		return redirect()->route('banner.index');
	}


}

?>