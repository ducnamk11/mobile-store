@extends('frontend.master')
@section('title','Danh muc')
@section('main')
    <script type="text/javascript">
        function updateCart(quantity, id) {
            $.get(
                '{{asset('cart/update')}}',
                {quantity: quantity, id: id},
                function () {
                    location.reload();
                }
            )

        }
    </script>
    <link rel="stylesheet" href="css/cart.css">
    <div id="wrap-inner">
        <div id="list-cart">
            <h3>Giỏ hàng</h3>
            @if(Cart::getTotalQuantity()>0)
                <form >
                    <table class="table table-bordered .table-responsive text-center">
                        <tr class="active">
                            <td width="11.111%">Ảnh mô tả</td>
                            <td width="22.222%">Tên sản phẩm</td>
                            <td width="22.222%">Số lượng</td>
                            <td width="16.6665%">Đơn giá</td>
                            <td width="16.6665%">Thành tiền</td>
                            <td width="11.112%">Xóa</td>
                        </tr>
                        @foreach($items as $item)
                            <tr>
                                <td><img height="200px" class="img-responsive"
                                         src="{{asset('storage/app/avatar/'.$item->attributes->img)}}"></td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <div class="form-group">
                                        <input onchange="updateCart(this.value,'{{$item->id}}')" class="form-control"
                                               type="number" value="{{$item->quantity}}">
                                    </div>
                                </td>
                                <td><span class="price">{{number_format($item->price)}} VNĐ</span></td>
                                <td><span class="price">{{number_format($item->price*$item->quantity)}} đ</span></td>
                                <td><a onclick="return confirm('Bạn có chắc xoá sản phẩm này không?')" href="{{asset('cart/delete/'.$item->id)}}">Xóa</a></td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="row" id="total-price">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            Tổng thanh toán: <span class="total-price">{{number_format($total)}} VNĐ</span>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <a href="{{asset('/')}}" class="my-btn btn">Mua tiếp</a>
                            <a href="#" class="my-btn btn">Cập nhật</a>
                            <a onclick="return confirm('Bạn có chắc xoá sản phẩm này không?')" href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
                        </div>
                    </div>
                </form>
                <div id="xac-nhan">
                    <h3>Xác nhận mua hàng</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input required type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input required type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input required type="number" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="add">Địa chỉ:</label>
                            <input required type="text" class="form-control" id="add" name="add">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            @else
                <h5>Không có sản phẩm nào trong giỏ hàng!</h5>
            @endif
        </div>


    </div>

@stop
