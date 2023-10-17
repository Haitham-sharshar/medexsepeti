@extends('admin.layouts.master')
@section('content')

            <div class="dashboard-content-one">

                <div class="breadcrumbs-area">
                    <h3>All Products</h3>
                    <ul>
                        <li>
                            <a href="/admin">Home</a>
                        </li>
                        <li>Products</li>
                    </ul>
                </div>

                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Products</h3>
                            </div>
                        </div>
                        <form class="mg-b-20" action="{{route('admin.products.index')}}" method="get">

                            <a href="{{route('admin.products.create')}}"  style="float: {{app()->getLocale() == 'en' ? 'right' : 'left'}};width: 70px" class="btn btn-success fw-btn-fill" ><i class="fa fa-plus"></i>add</a>

                            <div class="row gutters-8">

                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">

                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                         <br>
                            <table class="table display data-table text-nowrap" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Title</th>
                                        <th> Price</th>
                                        <th> image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- Student Table Area End Here -->
@endsection

                @section('script')
                    <script>
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                        toastr.success("{{ \Illuminate\Support\Facades\Session::get('success')}}")
                        @elseif(\Illuminate\Support\Facades\Session::has('error'))
                        toastr.error("{{ \Illuminate\Support\Facades\Session::get('error')}}")
                        @endif
                    </script>
                    <script>
                        $(document).ready(function() {
                            // DataTable

                            let t = $('#table').DataTable({
                                processing: true,
                                serverSide: true,
                                pagingType: "full_numbers",
                                order: [[1, 'asc']],

                                bDestroy: true,
                                iDisplayLength: 10,
                                ajax: {
                                    "url": "{{route('admin.products.ajax')}}",
                                    "type": "GET",
                                },

                                columns: [
                                    {data: 'select', search: false},
                                    {data: 'title'},
                                    {data: 'image', search: false},
                                    {data: 'price'},
                                    {data: 'action', search: false},

                                ],


                            });

                        });
                    </script>
@endsection
