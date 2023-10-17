<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends CustomController
{
    private $productRepository;
    private $lang_code;
    private $viewPath = 'admin.products.';

    /**
     * Display a listing of the resource.
     *
     * @param ProductRepository $productRepository
     */

    public function __construct(ProductRepository $productRepository )
    {
        $this->productRepository = $productRepository;

    }
    public function index()
    {
        return $this->getView($this->viewPath . 'index',['']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.products.add-products',compact('categories'));
    }

    public function loadajax(Product $data , Request $request)
    {

       $products = Product::orderBy('id', 'DESC')->get();
        return Datatables::of($products)
            ->rawColumns(['action', 'select', 'status'])
            ->editColumn('select', function ($model) {
                return '<input type="checkbox" class="checkSingle inline" name="del[]" value="'. $model->id .'">';
            })
            ->editColumn('title', function ($model) {
                return $model->title;

            })
            ->editColumn('image', function ($model) {

                return '<img src="'.asset('images/'.$model->image.'').'" width="100px" height="200px">' ;
            })
            ->editColumn('price', function ($model) {
                return $model->price;

            })


            ->addColumn('action', function($model){

                $btn = '<a href="/admin/products/edit/'.$model->id.'" class="edit btn btn-primary btn-lg">edit</a>';
//
                $btn = $btn.'
                  <button class="error btn btn-danger btn-lg" data-toggle="modal" data-target="#deleteApplyLeaveModal'.$model->id.'">delete</button>'.

                    '<div class="modal bg-dark fade" data-backdrop="false" id="deleteApplyLeaveModal'. $model->id .'">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                           <h4>are you sure to delete</h4>
                                                        </div>

                        <form action="'. route('admin.products.destroy', $model->id) .'" method="post">
                                                                     <input type="hidden" name="_method" value="delete" />
                                                                         <input type="hidden" name="_token" value="'. csrf_token() .'">
                                                                        <input type="hidden" name="id" value="'. $model->id .'">
                                                                        <button class="edit btn btn-primary btn-lg" type="submit">delete</button>
                                                                     </form>
                                                                     </div>
                                                                     </div>
                                                                    ';

                return $btn;

            })

            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $this->productRepository->saveItem($data);

        return redirect()->route('admin.products.index')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::find($id);

        return $this->getView($this->viewPath . 'add-products',['product'=>$product,'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->productRepository->updateItem($request->all(), $id);
        return redirect()->route('admin.products.index')->with('success','Updated Successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->deleteItem($id);

        return redirect()->route('admin.products.index')->with('success','Product Deleted Successfully');
    }


}
