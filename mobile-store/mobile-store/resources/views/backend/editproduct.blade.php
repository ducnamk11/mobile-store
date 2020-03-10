@extends('backend.master')
@section('title','Cập nhật sản phẩm')
@section('main')
@stop

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Sửa sản phẩm</div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required type="text" name="name" class="form-control"
                                           value="{{$product->prod_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required type="number" value="{{$product->prod_price}}" name="price"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input id="img" type="file" name="img" class="form-control hidden"
                                           onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="300px"
                                         src="{{asset('storage/app/avatar/'.$product->prod_img)}}">
                                </div>
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input required type="text" value="{{$product->prod_accessories}}"
                                           name="accessories" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input required type="text" value="{{$product->prod_warranty}}" name="warranty"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input required type="text" value="{{$product->prod_promotion}}" name="promotion"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input required type="text" value="{{$product->prod_condition}}" name="condition"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select required name="status" class="form-control">
                                        <option value="1" @if($product->prod_status==1){ selected }@endif >Còn hàng
                                        </option>
                                        <option value="0" @if($product->prod_status==0){ selected }@endif >Hết hàng
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Miêu tả</label>
                                    <textarea class="ckeditor" required
                                              name="description">{{$product->prod_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>

                                    <select required name="cate" class="form-control">
                                        @foreach($listcate as $cate)
                                            <option @if($cate->cate_id==$product->cate_id) @endif{ selected }
                                                    value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label><br>
                                    Có: <input @if($product->prod_featured ==1) @endif{ checked } type="radio" name="featured" value="1">
                                    Không: <input   @if($product->prod_featured ==0) @endif{ checked }  type="radio"  name="featured" value="0">
                                </div>
                                <input type="submit" name="submit" value="Cập Nhật" class="btn btn-primary">
                                <a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>    <!--/.main-->

