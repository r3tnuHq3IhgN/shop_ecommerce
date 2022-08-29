<main>
    <div class="container">
        
        @if (Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>  
        @endif
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
            
        @enderror
        <form wire:submit.prevent="editCategory()">
            <div>
                <h3>Tên danh mục cũ</h3>
                <input type="text" class="form-control" placeholder="{{$old_name}}" readonly>

            </div>
            <div class="form-group">
                <h3>Nhập tên mới</h3>
                <input type="text" wire:model="name" class="form-control" placeholder="Nhập tên danh mục...">
            </div>
            <button class="btn btn-primary">Sửa</button>
            <a href="{{route('category.list')}}" class="btn btn-primary">Trở về</a>
        </form>
    </div>
</main> 

