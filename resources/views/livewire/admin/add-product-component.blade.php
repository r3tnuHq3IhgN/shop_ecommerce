<main>
    <div class="container">
        <h2>Thêm sản phẩm</h2>
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form enctype="multipart/form-data" wire:submit.prevent="addProduct">
            <h3>Chọn ảnh</h3>
            <input class="form-control" type="file" class="input-file" wire:model="image">
            @if ($image)
            <img src="{{$image->temporaryUrl()}}" width="100px"/>
                
            @endif
            <h3>Tên</h3> 
            <input class="form-control" type="text" wire:model="name">
            <h3>Giá</h3>
            <input class="form-control" type="text" wire:model="price">
            <h3>Status</h3>
            <select class="form-select" wire:model="status">
                <option value="Empty" selected>Status</option>
                <option value="Còn hàng">Còn Hàng</option>
                <option value="Hết hàng">Hết hàng</option> 
            </select>
            <h3>Danh mục</h3>
            <select class="form-select" aria-label="Default select example" wire:model="category">
                <option value="0" selected>Select category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
            <a href="{{ route('product.list') }}" class="btn btn-primary">Trở về</a>
        </form>
    </div>
</main>
