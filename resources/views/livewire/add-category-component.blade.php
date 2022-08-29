<main>
    <div class="container">
        
        <h2>Thêm danh mục sản phẩm</h2>
        @if (Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>  
        @endif
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>       
        @enderror
        <form wire:submit.prevent="addCategory()">
            <div class="form-group">
                <input type="text" wire:model="name" class="form-control" placeholder="Nhập tên danh mục...">
            </div>
            <button class="btn btn-primary">Thêm</button>
            <a href="{{route('category.list')}}" class="btn btn-primary">Trở về</a>
        </form> 
    </div>
</main> 
