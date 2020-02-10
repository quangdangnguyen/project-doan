<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\News;
use Hash;
use Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::where('action',1)->get();
        //return view('page.trangchu',['slide'=>$slide]);
        $new_product = Product::where([['new','=','1'],['action','=','1']])->paginate(4);
        $sanpham_khuyenmai = Product::where([['promotion_price','<>','0'],['action','=','1']])->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where([['id_type','=',$type],['action','=','1']])->paginate(6);
        $sp_khac = Product::where([['id_type','<>',$type],['action','=','1']])->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    public function getChitiet(Request $req){
        $sanpham = Product::where([['id',$req->id],['action','=','1']])->first();
        $sp_tuongtu = Product::where([['id_type',$sanpham->id_type],['action','=','1']])->paginate(6);
        $sp_moi = Product::where([['new',1],['action','=','1']])->paginate(4);
        $sp_khac = Product::where([['new',0],['action','=','1']])->paginate(4);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','sp_moi','sp_khac'));
    }

    public function getTintuc(){
        $news = News::where('action',1)->orderBy('id','DESC')->paginate(3);
        return view('page.tintuc',compact('news'));
    }

    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getGioiThieu(){
        return view('page.gioithieu');
    }

    public function getUser(){
        $tt_user = Auth::user();
        return view('page.thongtinnguoidung',compact('tt_user'));
    }

    public function getNguoidung(){
        $edituser = Auth::user();
        return view('page.nguoidung',compact('edituser'));
    }

    public function postNguoidung(Request $req){
        // $this->validate($req,[
        //         'name'=>'required',

        //     ],
        //     [
        //         'name.required'=>'Bạn chưa nhập tên người dùng',
        //     ]);
        $edituser = Auth::user();
        
        $edituser->full_name = $req->fullname;
        $edituser->address = $req->address;
        $edituser->phone = $req->phone;

        if($req->changePassword == "on"){
            $this->validate($req,[
                'password'=>'required|min:6|max:16',
                're_password'=>'required|same:password'
            ],[
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự',
                're_password.same'=>'Mật khẩu không trùng khớp',
                're_password.required'=>'Vui lòng nhập mật khẩu'
            ]);
            $edituser->password = bcrypt($req->password);
        }
        // print_r($user);
        // die;
        $edituser->save();
        return redirect()->back()->with('thanhcong','Sửa thành công');
    }

    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->action = 1;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        
        $data = array(
            'hoten'=> $req->name,
            'tinnhan'=> $req->notes,
            'email'=>$req->email
            );
        
        
        Mail::send('mails.blanks', $data, function($message) use ($data){
            $message->from('quangdang15819@gmail.com','Quang Đăng');
            $message->to($data['email']);
            $message->subject('Đơn hàng của bạn');
        });
       
        Session::forget('cart');
        echo "<script>
            alert('Cám ơn bạn đã mua hàng');
            window.location = '".url('/index')."'
        </script>";
    
        //return redirect()->back()->with('thongbao','Đặt hàng thành công');

    }

    public function getLogin(){
        return view('page.dangnhap');
    }

    public function postLogin(Request $req){
        $this->validate($req,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự'
        ]);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }


    public function getSignin(){
        return view('page.dangki');
    }



    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
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
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->quyen = 0;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang_chu');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price',$req->key)->get();
        return view('page.search',compact('product'));  
    }

    public function get_sendmail(){
        return view('page.sendmail');
    }

    public function post_sendmail(Request $request){
        $data = ['hoten'=> $request->input('name'),'tinnhan'=> $request->input('message'),'email'=>$request->input('email')];
        //dd($data['email']);
        Mail::send('mails.blanks',$data,function($message) use ($data){ 
            $message->from('quangdang15819@gmail.com','Quang Đăng');
            $message->to($data['email'])->subject('Đây là mail test');
        });
        echo "<script>
            alert('Cám ơn bạn đã mua hàng');
            window.location = '".url('/index')."'
        </script>";
    }


}
