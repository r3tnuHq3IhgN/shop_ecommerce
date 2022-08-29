<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sale Setting
                    </div>
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>      
                    @endif
                    <div class="panel-body">
                        <form action="" class="form-horizontal" wire:submit.prevent="updateSale">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Status</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Sale Date</label>
                            <div class="col-md-4">
                               <input id="sale_date" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button class="btn btn-primary" type="submit">Update</button>
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
    $(function () {
             $('#sale_date').datetimepicker({
                 format : 'YYYY-MM-DD hh:mm:ss'
             })
             .on('dp.change', function(e){
                 var data = $('#sale_date').val();
                 @this.set('sale_date', data);
             });
         });

</script>
    
@endpush
