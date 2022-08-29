<div>
    <div class="container" style="padding: 30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add new coupon
                            </div>
                            <div class="col-md-6"> 
                                <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">All coupon</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message')}}</div>    
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="addCoupon">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label" >Coupon code</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="code">
                                </div>
                            </div> 
                            <div class="form-group"> 
                                <label for="" class="col-md-4 control-label">Coupon type</label>
                                <div class="col-md-4">
                                   <select class="form-control" wire:model="type">
                                       <option value="fixed">Fixed</option>
                                       <option value="percent">Percent</option>
                                   </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label" >Coupon value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="value">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Cart value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="cart_value">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Submit</label>
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>

