<?php			
			
namespace App\Http\Controllers;			
use App\Models\Slide;
use App\Models\Products;
use App\Models\Type_products;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Bill_detail;				
			
class PageController extends Controller			
{			
    public function getIndex(){	
        $slide = Slide::all();		
        $new_product=Products::where('new', 1)->get();
        $sanpham_khuyenmai=Products::where('promotion_price','<>',0)->get();
        return view('page.trangchu', compact('slide', 'new_product','sanpham_khuyenmai'));	
    }		
    public function getLoaiSp($type){
        $type_product = Type_products::all(); // show ra tên loại san phẩm
        $sp_theoloai = Products::where('id_type', $type)->get();
        $sp_khac = Products::where('id_type', '<>',$type)->paginate(3);
        return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }	
    public function getChitiet( Request $request){
        $sanpham= Products:: where ('id', $request-> id)->first();
        $splienquan=Products::where('id','<>', $sanpham->id, 'and', 'id_type', '=', $sanpham->id_type,)->paginate(3);
        $comments=Comments::where ('id_product', $request->id)->get();
        return view('page.chitiet_sanpham', compact('sanpham','splienquan', 'comments'));
    }
    public function getLienhe(){
        return view('page.lienhe');
    }
    public function getAboutus(){
        return view('page.about_sanpham');
    }

    public function getIndexAdmin()														
    {														
        $products = Products::all();														
        return view('pageadmin.admin')->with(['products' => $products, 'sumSold' => count(Bill_detail::all())]);														
    }														
	public function getAdminAdd()				
    {				
        return view('pageadmin.formAdd');				
    }				
    public function postAdminAdd(Request $request)							
    {							
        $product = new Products();							
        if ($request->hasFile('inputImage')) {							
            $file = $request->file('inputImage');							
            $fileName = $file->getClientOriginalName();							
            $file->move('source/image/product', $fileName);							
        }							
        $file_name = null;							
        if ($request->file('inputImage') != null) {							
            $file_name = $request->file('inputImage')->getClientOriginalName();							
        }							
							
        $product->name = $request->inputName;							
        $product->image = $file_name;							
        $product->description = $request->inputDescription;							
        $product->unit_price = $request->inputPrice;							
        $product->promotion_price = $request->inputPromotionPrice;							
        $product->unit = $request->inputUnit;							
        $product->new = $request->inputNew;							
        $product->id_type = $request->inputType;							
        $product->save();							
        return $this->getIndexAdmin();							
    }		
    
    public function getAdminEdit($id)										
    {										
        $product = Products::find($id);										
        return view('pageadmin.formEdit')->with('product', $product);										
    }	
    public function postAdminEdit(Request $request)							
    {							
        $id = $request -> editId;

        $product = new Products();							
        if ($request->hasFile('editImage')) {							
            $file = $request->file('editImage');							
            $fileName = $file->getClientOriginalName();							
            $file->move('source/image/product', $fileName);							
        }							
        							
        if ($request->file('editImage') != null) {							
            $product->image = $fileName;							
        }							
							
        $product->name = $request->editName;														
        $product->description = $request->editDescription;							
        $product->unit_price = $request->editPrice;							
        $product->promotion_price = $request->editPromotionPrice;							
        $product->unit = $request->editUnit;							
        $product->new = $request->editNew;							
        $product->id_type = $request->editType;							
        $product->save();							
        return $this->getIndexAdmin();							
    }											
    public function postAdminDelete($id)
    {
        $product = Products::find($id);
        $product->delete();
        return $this->getIndexAdmin();
    }
}			
			
