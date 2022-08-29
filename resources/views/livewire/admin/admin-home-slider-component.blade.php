<div>
    <div class="container" style="padding: 30px 0px;">
        <div class="col-md-12">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        All sliders

                    </div> 
                    <div class="col-md-6">

                        <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Add new slider</a>
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Price</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach ($slider as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <td><img src="../assets/images/sliders/<?php echo $item->image?>" width="100px" alt="image"></td>
                            <th>{{$item->title}}</th>
                            <th>{{$item->subtitle}}</th>
                            <th>{{$item->price}}</th>
                            <th>{{$item->link}}</th>
                            <th>{{$item->status}}</th>
                            <th>{{$item->created_at}}</th>   
                            <td> 
                                <a href="{{route('admin.edithomeslider', ['slug' => $item->id])}}" class="text-success" style="font-size: 20px">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                </a>
                                <a wire:click.prevent="deleteSlider({{$item->id}})" class="text-danger" style="font-size: 20px; margin-left: 20px">
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