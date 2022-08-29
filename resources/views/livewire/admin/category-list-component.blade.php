<main>
    <div class="container">
        <h2>Danh mục sản phẩm</h2>
        <table class="table table-dark" border="1px">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Đường dẫn</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $item)
                    <tr>
                        <td>{{ $key++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td> 
                        <td>
                            <a href="{{route('category.edit', ['slug' => $item->slug])}}" class="text-success" style="font-size: 20px">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </a>
                            <a onclick="confirm('Bạn chắc chắn muốn xóa ?') || event.stopImmediatePropagation();" wire:click.prevent="destroy({{$item->id}})" class="text-danger" style="font-size: 20px; margin-left: 20px">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route('category.add')}}" class="btn btn-primary">Thêm danh mục sản phẩm</a>
    </div>


</main>
