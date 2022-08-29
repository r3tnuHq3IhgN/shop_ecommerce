<div>
    <div class="container" style="padding: 30px 0px;">
        <div class="col-md-12">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        All coupons

                    </div> 
                    <div class="col-md-6"> 

                        <a href="{{route('admin.addcoupons')}}" class="btn btn-success pull-right">Add new coupons</a>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>    
            @endif
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Coupon code</th>
                            <th>Coupon type</th>
                            <th>Coupon value</th>
                            <th>Cart value</th>
                           
                        </tr>
                    </thead>  
                    <tbody>  
                        @foreach ($coupons as $item) 
                        <tr>
                            <th>{{$item->id}}</th>
                            <th>{{$item->code}}</th>
                            <th>{{$item->type}}</th>
                            <th>{{$item->value}}</th>
                            <th>{{$item->cart_value}}</th>
                            <th>{{$item->action}}</th>   
                            <td> 
                                <a href="{{route('admin.editcoupons', ['slug' => $item->id])}}" class="text-success" style="font-size: 20px">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                </a>
                                <a wire:click.prevent="deleteCoupon({{$item->id}})" class="text-danger" style="font-size: 20px; margin-left: 20px">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>  
                            </td>
                        </tr>           
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>