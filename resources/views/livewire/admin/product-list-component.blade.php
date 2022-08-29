<main>
    <div class="container">
        <h2>Danh sách sản phẩm</h2>
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <table class="table table-dark" border="1px">
            <thead>
                <tr>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Status</th>
                    <th scope="col">Danh mục</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $item)
                    <tr>
                        <td><img src="../assets/images/products/<?php echo $item->image?>" width="100px" alt="image"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->regular_price }}</td>
                        <td>{{ $item->stock_status }}</td>
                        <td>{{ $item->category->name }}</td> 
                        
                        {{-- <td>
                            <a href="{{route('product.edit', ['slug' => $item->slug])}}" class="text-success" style="font-size: 20px">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </a>
                            <a wire:click.prevent="destroy({{$item->id}})" class="text-danger" style="font-size: 20px; margin-left: 20px">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td> --}}
                        <td>
                            <a href="{{route('product.edit', ['slug' => $item->slug])}}" class="text-success" style="font-size: 20px">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </a>
                            <a wire:click.prevent="deleteProduct({{$item->id}})" class="text-danger" style="font-size: 20px; margin-left: 20px">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a> 

                        </td>
                    </tr>
                @endforeach  
            </tbody>
        </table>
        {{ $products->links()}}
        <br>
        <a href="{{route('product.add')}}" class="btn btn-primary">Thêm sản phẩm</a>
    </div>


</main>  
