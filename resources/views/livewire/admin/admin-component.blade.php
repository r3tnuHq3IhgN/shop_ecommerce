@if (Auth::check() && Auth::user()->id==1)  
<div>
    <div class="container" style="padding: 30px 0px;">
        <div class="col-md-12">
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="row">
                            <th class="col-6">Tên</th>
                            <th class="col-6">Hành động</th>
                        </tr>
                    </thead>  
                    <tbody>  
                        <tr class="row">
                            <th class="col-6">Quản lý danh mục</th>
                            <th class="col-6"><a href="{{route('category.list')}}"><div class="btn btn-primary">Click</div></a></th>
                        </tr>
                        <tr class="row">
                            <th class="col-6">Quản lý sản phẩm</th>
                            <th class="col-6"><a href="{{route('product.list')}}"><div class="btn btn-primary">Click</div></a></th>
                        </tr>  
                        <tr class="row">
                            <th class="col-6">Quản lý Slider</th>
                            <th class="col-6"><a href="{{route('admin.homeslider')}}"><div class="btn btn-primary">Click</div></a></th>
                        </tr> 
                        <tr class="row">
                            <th class="col-6">Quản lý danh mục hiển thị trên trang chủ</th>
                            <th class="col-6"><a href="{{route('admin.homecategories')}}"><div class="btn btn-primary">Click</div></a></th>
                        </tr>
                        <tr class="row">
                            <th class="col-6">Quản lý Sale</th>
                            <th class="col-6"><a href="{{route('admin.sale')}}"><div class="btn btn-primary">Click</div></a></th>
                        </tr>
                        <tr class="row">
                            <th class="col-6">Quản lý Coupons</th>
                            <th class="col-6"><a href="{{route('admin.coupons')}}"><div class="btn btn-primary">Click</div></a></th>
                        </tr>          
                    </tbody>
                </table> 
            </div>
        </div>

    </div>
</div>
@else
<div class="alert alert-danger m-3">BẠN KHÔNG CÓ QUYỀN TRUY CẬP TRANG NÀY !</div>
@endif