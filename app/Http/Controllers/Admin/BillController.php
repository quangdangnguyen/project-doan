<?php 


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Bill;
use App\Customer;
use App\BillDetail;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = 'Quản lý hóa đơn';
        $customers = DB::table('customer')
                    ->orderBy('id', 'desc')
                    ->paginate(20);
        $this->data['customers'] = $customers;
        return view('admin.bill.index', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customerInfo = DB::table('customer')
                        ->join('bill', 'customer.id', '=', 'bill.id_customer')
                        ->select('customer.*', 'bill.id as bill_id', 'bill.total as bill_total', 'bill.note as bill_note', 'bill.status as bill_status')
                        ->where('customer.id', '=', $id)
                        ->first();

        $billInfo = DB::table('bill')
                    ->join('bill_detail', 'bill.id', '=', 'bill_detail.id_bill')
                    ->leftjoin('products', 'bill_detail.id_product', '=', 'products.id')
                    ->where('bill.id_customer', '=', $id)
                    ->select('bill.*', 'bill_detail.*', 'products.name as product_name')
                    ->get();
                    
        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;

        return view('admin.bill.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->status = $request->input('status');
        $bill->save();
        Session::flash('message', "Successfully updated");

        return Redirect::to('admin/bill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //BillDetail::find($id)->delete();
        //$bill = Bill::find($id);
        //$bill->delete();

        // $cus = Customer::find($id)->get();
        // $bill = DB::table('bill')->where('id_customer',$id)->get();
        
        // dd($bill);
        // $billdetail = DB::table('bill_detail')->where('id_bill','$bill->id')->get();
        // dd($billdetail);
        
        
        // Session::flash('message', "Successfully deleted");

        // return Redirect::to('admin/bill');

        // $customerDel = DB::table('customer')
        //                 ->join('bill', 'customer.id', '=', 'bill.id_customer')
        //                 ->select('customer.*', 'bill.id as bill_id', 'bill.total as bill_total', 'bill.note as bill_note', 'bill.status as bill_status')
        //                 ->where('customer.id', '=', $id)
        //                 ->first();
        $billDel = DB::table('bill')
                    ->join('bill_detail', 'bill.id', '=', 'bill_detail.id_bill')
                    ->leftjoin('products', 'bill_detail.id_product', '=', 'products.id')
                    ->where('bill.id_customer', '=', $id)
                    ->select('bill.*', 'bill_detail.*', 'products.name as product_name')
                    ->get();
        // $customerDel = DB::table('customer')
        //                 ->join('bill', 'customer.id', '=', 'bill.id_customer')
        //                 ->select('customer.*', 'bill.id as bill_id', 'bill.total as bill_total', 'bill.note as bill_note', 'bill.status as bill_status')
        //                 ->where('customer.id', '=', $id)
        //                 ->first();
        dd($billDel);
    }


    public function bill_unactive($id){
        DB::table('customer')->where('id',$id)->update(['action'=>0]);
        Session::put('message','Ẩn người mua hàng thành công');
        return redirect()->route('bill.index');
    }

    public function bill_active($id){
        DB::table('customer')->where('id',$id)->update(['action'=>1]);
        Session::put('message','Kích hoạt người mua hàng thành công');
        return redirect()->route('bill.index');
    }
}

?>