<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null; //Khởi tạo một  đối tượng là một danh sách sản phẩm ban đầu và cho bàng null
    public $totalQty = 0; //Tổng giá và số lượng có trong  giỏ hàng ban đầu cho bảng = 0

    public $totalPrice = 0;
    public function __construct($oldCart)  //Xây dựng 1 hàm dựng, để thực hiện Gán giá trị  cho các dữ liệu thành viên
                                             //Hàm này có 1 tham giảo h số là $oldCart: nghĩa là khi chúng ta tạo giỏ hàng thì
                                             // chúng ta truyền giá trị vào giỏ hàng hiện tai
    {
        if ($oldCart) {
            $this->items = $oldCart->items;      //Nếu giỏ hàng này tồn tại, thì đối tượng $this-> items  = $oldcart->items
                                                //$this->totalQty = $oldCart->totalQty;
                                                // $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    //Them phan tu vao gio hang                                 
    public function add($item, $id, $qty = 1)  //Tao 1 hàm Add để thêm các sản phẩm vào giỏ hàng
    {
        if ($item->promotion_price == 0) {
            $giohang = ['qty' => 0, 'price' => $item->unit_price, 'item' => $item]; // Tạo 1 mảng $giohang = [ soluong,dơn gia,tên sản phẩm item    ] để chứa các sản phẩm đưa vào giỏ hàng                
                                                                                    // Nó là 1 mảng kết hợp kiểu key -> value
            if ($this->items) {
                if (array_key_exists($id, $this->items)) {  //Nếu tồn tại  danh sách chứa các sản phẩm rùi, thì chúng ta gán danh sách sản phẩm mua đó vào giỏ hàng 
                    $giohang = $this->items[$id];
                }
            }

            $giohang['qty'] = $giohang['qty'] + $qty;  //Thục hiện thay đổi cập nhật giỏ hàg về số lượng thêm vào 
            $giohang['price'] = $item->unit_price * $giohang['qty']; //và tính giá cho cho sự tang số lương
            $this->items[$id] = $giohang;    //Sau khi thực hiện tính xong, ta thuc hiện gán  giỏ hàng cho danh sách items [$id]
            $this->totalQty = $this->totalQty + $qty; //ta thục hiện tính tổng số luongj mua và tổng tiền sản phẩm
            $this->totalPrice += $item->unit_price * $giohang['qty'];
        } else {
            $giohang = ['qty' => 0, 'price' => $item->promotion_price, 'item' => $item];
            if ($this->items) {
                if (array_key_exists($id, $this->items)) {
                    $giohang = $this->items[$id];
                }
            }
            $giohang['qty'] = $giohang['qty'] + $qty;
            $giohang['price'] = $item->promotion_price * $giohang['qty'];
            $this->items[$id] = $giohang;
            $this->totalQty = $this->totalQty + $qty;
            $this->totalPrice += $item->promotion_price * $giohang['qty'];
        }
    }
    //xóa 1                                 
    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }
    //xóa nhiều                                     
    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}