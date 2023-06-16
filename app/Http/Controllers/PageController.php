<?php

namespace App\Http\Controllers;

use App\Models\bill_detail;
use App\Models\products;
use App\Models\slide;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\comments;
use App\Models\type_products;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = slide::all();
        $newProduct = products::where('new', 1)->paginate(8);
        // sản phẩm khuyến mãi
        $topProduct = products::where('promotion_price', '<>', 0)->paginate(4);
        return view('page.trangchu', compact('slide', 'newProduct', 'topProduct'));
    }

    public function getDetail(Request $request)
    {
        $sanpham = products::where('id', $request->id)->first();
        $splienquan = products::where('id', '<>', $sanpham->id, 'and', 'id_type', '=', $sanpham->id_type, )->paginate(3);
        $comments = comments::where('id_product', $request->id)->get();
        return view('page.chitiet_sanpham', compact('sanpham', 'splienquan', 'comments'));
    }

    public function getLoaiSp($type)
    {

        $type_product = type_products::all(); // show ra tên loại sp

        // lấy sp theo loại
        $sp_theoloai = products::where('id_type', $type)->limit(3)->get();

        // Lay san pham hien thi Khac <> loai			
        $sp_khac = products::where('id_type', '<>', $type)->paginate(3);

        // Lay san pham hien thi theoloai typeproduct  cho menu ben trai	
        // $loai = type_products::all();	

        // Lay ten Loai san pham moi khi chung ta chon danh muc loai san pham(phan menu ben trai)							
        $loai_sp = type_products::where('id', $type)->first();

        return view('page.loai_sanpham', compact('type_product', 'sp_theoloai', 'sp_khac', 'loai_sp'));
    }

    //Tạo Controller 	
    public function getIndexAdmin()
    {
        $product = products::all();
        return view('pageadmin.admin')->with(['product' => $product, 'sumSold' => count(bill_detail::all())]);
    }
    public function getAdminAdd()
    {
        return view('pageadmin.formAdd');
    }

    public function postAdminAdd(Request $request)
    {
        $product = new products();

        if ($request->hasFile('inputImage')) {
            $file = $request->file('inputImage');
            $fileName = $file->getClientOriginalName();
            $file->move('source/image/product', $fileName);
            $product->image = $fileName;
        }

        $product->name = $request->inputName;
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
        $product = products::find($id);
        return view('pageadmin.formEdit')->with('product', $product);
    }

    public function postAdminEdit(Request $request)
    {
        $id = $request->editId;
        $product = products::find($id);

        if ($request->hasFile('editImage')) {
            $file = $request->file('editImage');
            $fileName = $file->getClientOriginalName();
            $file->move('source/image/product', $fileName);
            $product->image = $fileName;
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
        $product = products::find($id);
        $product->delete();
        return $this->getIndexAdmin();
    }


    // public function getAddToCart(Request $req, $id){					
//     $product = products::find($id);					
//     $oldCart = Session('cart')?Session::get('cart'):null;					
//     $cart = new Cart($oldCart);					
//     $cart->add($product,$id);					
//     $req->session()->put('cart', $cart);					
//     return redirect()->back();					
// }			


    // --------------- CART -----------		
//------------- bắt buộc phải đăng nhập mới được thêm sản phẩm-----------																		
    public function getAddToCart(Request $req, $id)
    {
        if (Session::has('users')) {   //Dùng Session để làm giỏ hàng $oldcart : là giỏ hàng hiện tạiNếu tồn tại giỏ hàng thi chúng ta gắm cho nó  , khong thì cho nó rỗng 
            if (products::find($id)) {  //lấy sản phẩm ra theo id
                $product = products::find($id);
                $oldCart = Session('cart') ? Session::get('cart') : null;  //$oldcart:là tình trạng giỏ hàng hiện tại
                $cart = new Cart($oldCart);  //$cart: là tình trạng giỏ hàng sau khi thêm mới sản phẩm 
                $cart->add($product, $id); //Đây là tên class mà chúng ta thực  hiện tạo ở model Cart với phuong thúc add()
                $req->session()->put('cart', $cart);
                return redirect()->back();
            } else {
                return '<script>alert("Không tìm thấy sản phẩm này.");window.location.assign("/");</script>';
            }
        } else {
            return '<script>alert("Vui lòng đăng nhập để sử dụng chức năng này.");window.location.assign("/login");</script>';
        }
    }



    public function detChitiet(){
        return view('page.chitiet_sanpham');
    }

    // public function getLienhe(){
    //     return view('page.lienhe');
    // }


    // public function getAbout(){
    //     return view('page.chitiet_sanpham');
    // }






}