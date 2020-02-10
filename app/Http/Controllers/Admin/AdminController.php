<?php  

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Auth;
use App\ProductType;
use App\Product;
use App\User;
use App\Bill;
use App\BillDetail;
use App\Customer;
/**
 * 
 */
class AdminController extends Controller
{
	
	public function index(){
		$type_count = ProductType::count();
		$product_count = Product::count();
		$new_pro_count = Product::where('new','=',1)->count();
		$user_count = User::where('quyen','=',0)->count();
		$customers = Customer::where('action',1)->orderBy('created_at','DESC')->paginate(5);
		return view('admin.index',compact('type_count','product_count','user_count','new_pro_count','customers'));
	}

	public function login(){
		return view('admin.login');
	}

	public function post_login(Request $req){
		$this->validate($req,[
			'email'=>'required|email',
			'password'=>'required'
		],
		[
			'email.email'=>'Email không đúng định dạng',
			'email.required'=>'Email không được để trống',
			//'email.same'=>'Email chưa đăng ký',
			'password.required'=>'Password không được để trống'
		]);
		if(Auth::attempt($req->only('email','password'),$req->has('rmb'))) {
			return redirect()->route('admin');
		}else{
			return redirect()->back()->with('thongbao','Đăng nhập không thành công');
		}
	}

	public function logout(){
		Auth::logout();
		return redirect()->route('login');
	}

	public function file(){
        return view('admin.file');
    }

    public function upload(HttpRequest $req){
        if ($req->hasFile('file')) {
            $name = $req->file->getClientOriginalname();
            $req->file->move('uploads/',$name);
        }
        
        return redirect()->back();
    }

    
	
}





?>