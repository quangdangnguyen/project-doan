<?php 

namespace App\Http\Controllers\Admin;

use App\News;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\RedirectResponse;
use Session;

/**
 * 
 */
class NewsController extends Controller
{
	public function index ()
	{
		
		$news = News::orderBy('id','DESC')->get();
		return view('admin.news.index',[
			'news' => $news
		]);
	}

	public function edit($id)
	{
		$model = News::find($id);
		
		return view('admin.news.edit',[
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
		News::where(['id'=>$id])->update($request->all());
		return redirect()->route('news.index');
	}

	public function destroy($id){
		News::find($id)->delete();

		return redirect()->back(); //quay lại trang trước đó
	}

	public function create()
	{
		return view('admin.news.add');
	}

	public function store(Request $request)
	{
		$this -> validate($request,[
			'image' => 'required|unique:slide,name'
		],[
			'image.required' => 'Ảnh không được để trống',
			'image.unique' => 'Ảnh đã có trong CSDL'
		]);

		$news = new News;
		$news->title = $request->title;
		$news->content = $request->content;
		$news->image = $request->image;
		$news->action = $request->action;
		$news->save();
		return redirect()->route('news.index');
	}

	public function news_unactive($id){
		DB::table('news')->where('id',$id)->update(['action'=>0]);
		Session::put('message','Ẩn tin tức thành công');
		return redirect()->route('news.index');
	}

	public function news_active($id){
		DB::table('news')->where('id',$id)->update(['action'=>1]);
		Session::put('message','Kích hoạt tin tức thành công');
		return redirect()->route('news.index');
	}


}

?>