<?php 

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


/**
 * 
 */
class UserController extends Controller
{
	
	public function index ()
	{
		
		$cats = User::paginate(10);
		return view('admin.user.index',[
			'cats' => $cats
		]);
	}

    public function edit($id)
    {
        $model = User::find($id);
        
        return view('admin.user.edit',[
            'model'=>$model
        ]);
    }


    public function update($id, Request $req)
    {
       $this->validate($req,
            [
                'full_name'=>'required'
            ],
            [
                'full_name.required'=>'Tên người dùng không được để trống'
            ]);
        $user = User::find($id);
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->quyen = 1;
        $user->phone = $req->phone;
        $user->address = $req->address;

        if($req->changePassword == "on")
        {
            $this->validate($req,
            [      
                'password'=>'required|min:6|max:20',
                're_password'=>'required|same:password'
            ],
            [
                'password.required'=>'Vui lòng nhập password',
                'password.min'=>'Mật khẩu quá ngắn, vui lòng nhập lại',
                'password.max'=>'Mật khẩu quá dài, vui lòng nhập mật khẩu ngắn hơn',
                're_password.same'=>'Mật khẩu không trùng khớp',
                're_password.required'=>'Vui lòng nhập lại mật khẩu'
            ]);
            $user->password = bcrypt($req->password);
        }

        $user->save();
        return redirect()->route('account.index');
    }




	public function create()
	{
		return view('admin.user.add');
	}

	public function store(Request $req)
	{
		 $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'full_name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập password',
                'password.min'=>'Mật khẩu quá ngắn, vui lòng nhập lại',
                'password.max'=>'Mật khẩu quá dài, vui lòng nhập mật khẩu ngắn hơn',
                're_password.same'=>'Mật khẩu không trùng khớp',
                're_password.required'=>'Vui lòng nhập lại mật khẩu'
            ]);
		$password = bcrypt($req->password);
		$req ->merge(['password'=> $password]);
        $user = new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->quyen = 1;
        $user->password = $req->password;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->route('account.index');
	}

    public function destroy($id){
        User::find($id)->delete();

        return redirect()->back(); //quay lại trang trước đó
    }


}

?>