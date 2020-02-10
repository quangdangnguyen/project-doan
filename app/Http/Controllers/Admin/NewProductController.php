<?php 

namespace App\Http\Controllers\Admin;

use App\ProductType;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * 
 */
class NewProductController extends Controller
{
	
		public function index ()
	{
		$pro = Product::where('new','=',1)->paginate(10);
		return view('admin.product.new',[
			'pro' => $pro
		]);
	}

}

?>