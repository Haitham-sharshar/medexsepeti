@extends('admin.layouts.master')
@section('style')
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #0d6efd;
            padding: 0.2rem;
        }
    </style>
@endsection
@section('content')

    <div class="dashboard-content-one">

                <div class="breadcrumbs-area">
                    <h3>Products</h3>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>Add Products</li>
                    </ul>
                </div>


                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add</h3>
                            </div>
                        </div>
                        @if(isset($product))
                            <form class="new-added-form" action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @else
                                    <form class="new-added-form" action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" name="title"  value="{{isset($product) ? $product->title : ''}}" required>
                                            </div>
                                            <div class="form-group row">
                                                <label for="image">image </label>
                                                <input type="file" class="" name="image" value="{{isset($product) ? $product->image : ''}}" >
                                                <input type="hidden" name="old_image" value="{{isset($product) ? $product->image : ''}}">

                                            </div>
                                            <div class="form-group row">
                                                <label for="title_en">Category <span class="text-danger"></span></label>
                                                <select class="form-control border" name="category_id"  required>
                                                    <option selected disabled style="display: none" value=""  >{{trans('Select Category')}}</option>
                                                    @isset($categories)
                                                   @foreach($categories as $category)
                                                    <option value="{{$category->id}}"  {{isset($product) && $category->id == $product->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" name="price"  value="{{isset($product) ? $product->price : ''}}" >
                                            </div>
                                            <div class="form-group row">
                                                <label for="meta_keywords">Tags</label>
                                                <label for="meta_keywords">Click Enter to add more Tags</label>
                                                <input type="text"  class="form-control p-4"   data-role="tagsinput"  name="tags" value="{{isset($product) && $product->tags != null ? $product->tags : ''}}" />

                                            </div>

                                    </div>
                                </div>
                            </div>
                            </div>

                       <br> <button type="submit" style="width: 200px;" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>


                        </form>


@endsection
@section('script')
                                    <link
                                        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
                                        rel="stylesheet"
                                    />
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
                                    <script>
                                        var $input = $('textarea[name=tags]').tagify({
                                            whitelist : [
                                                {"id":1, "value":"some string"}
                                            ]
                                        })

                                        var jqTagify = $input.data('tagify');

                                        // bind the "click" event on the "remove all tags" button
                                        $('.tags-jquery--removeAllBtn').on('click', jqTagify.removeAllTags.bind(jqTagify))


                                        $("#inputTag").tagsinput('items');
                                    </script>

@endsection

