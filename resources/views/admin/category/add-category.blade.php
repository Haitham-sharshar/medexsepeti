@extends('admin.layouts.master')
@section('content')

    <div class="dashboard-content-one">

                <div class="breadcrumbs-area">
                    <h3>Categories</h3>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>Category</li>
                    </ul>
                </div>


                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add</h3>
                            </div>
                        </div>
                        @if(isset($category))
                            <form class="new-added-form" action="{{route('admin.category.update',$category->id)}}" method="post">
                                @csrf
                                @method('put')
                                @else
                                    <form class="new-added-form" action="{{route('admin.category.store')}}" method="post">
                                        @csrf
                                        @endif
                            <div class="row">

                                    <div class="col-10">
                                        <div class="form-group row">
                                            <div class=" col-sm-10 tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <label for="title_en">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control " name="title_en"  value="{{isset($category) ? $category->title : ''}}"  placeholder="{{ __('Title') }}" required>
                                                @if ($errors->has('title'))
                                                    <p class="text-danger"> {{ $errors->first('title') }} </p>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                            </div>
                       <br> <button type="submit" style="width: 200px;" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>

                        </form>
@endsection
