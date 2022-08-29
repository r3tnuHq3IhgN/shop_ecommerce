<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Quản lý danh mục hiển thị trên web
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif 
                        <form action="" class="form-horizontal" wire:submit.prevent="addToDb">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Lựa chọn danh mục</label>
                                <div class="col-md-4" wire:ignore>
                                    <select name="categories[]" id="" class="sel_categories form-control" multiple="multiple" wire:model="sel_cate">
                                        @foreach ($categories as $item)
                                       <option value="{{$item->id}}">{{$item->name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Số lượng sản phẩm</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="num">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Lựa chọn danh mục</label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Lưu lại
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
    $('.sel_categories').select2();
    $('.sel_categories').on('change', function(e){
        var data = $('.sel_categories').select2("val");
        @this.set('sel_cate' ,data);
    });
});
</script>
    
@endpush
