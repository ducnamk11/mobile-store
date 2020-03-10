<link rel="stylesheet" href="css/details.css">
@extends('frontend.master')
@section('title','Chi Tiết sản phẩm')
@section('main')
    <div id="wrap-inner">
        <div id="product-info">
            <div class="clearfix"></div>
            <h3>{{$item->prod_name}}</h3>
            <div class="row">
                <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                    <img height="200px" src="{{asset('storage/app/avatar/'.$item->prod_img)}}">
                </div>
                <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                    <p>Giá: <span class="price">{{number_format($item->prod_price).' VNĐ'}}</span></p>
                    <p>Bảo hành: {{$item->prod_warranty}}</p>
                    <p>Phụ kiện: {{$item->prod_accessories}}</p>
                    <p>Tình trạng: {{$item->prod_condition}}</p>
                    <p>Khuyến mại: {{$item->prod_promotion}}</p>
                    <p>  @if($item->prod_status==1)  Còn hàng @else Tạm hết hàng @endif </p>
                    <p class="add-cart text-center"><a href="{{asset('cart/add/'.$item->prod_id)}}">Đặt hàng online</a></p>
                </div>
            </div>
        </div>
        <div id="product-detail">
            <h3>Chi tiết sản phẩm</h3>
            <p class="text-justify">{!! $item->prod_description !!}</p>
        </div>
        <div id="comment">
            <h3>Bình luận</h3>
            <div class="col-md-9 comment">
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input required type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="cm">Bình luận:</label>
                        <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
        <div class=" row list-product">
            <div class="col-md-12 comment-list">
                <div class="col-md-9 comment">
                    @foreach($comments as $comment)
                        <ul style="list-style: none;">
                            <li class="com-title">
                                <b>{{$comment->com_name}}</b>
                                <br>
                                <span
                                    style="color: #b0b0b0">   {{date('d/m/H H:i', strtotime($comment->created_at))}}</span>
                            </li>
                            <li class="com-details">
                                {{$comment->com_content}}
                            </li>
                        </ul>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
