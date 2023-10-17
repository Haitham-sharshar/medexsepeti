<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends CustomController
{
    private $categoryRepository;
    private $lang_code;
    private $viewPath = 'admin.category.';

    /**
     * Display a listing of the resource.
     *
     * @param CategoryRepository $categoryRepository
     */

    public function __construct(CategoryRepository $categoryRepository )
    {
        $this->categoryRepository = $categoryRepository;

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

        return view('admin.category.add-category');
    }

    public function loadajax(Category $data , Request $request)
    {


        $categories = Category::orderBy('created_at', 'DESC')->get();

        return Datatables::of($categories)
            ->rawColumns(['action', 'select', 'status'])
            ->editColumn('select', function ($model) {
                return '<input type="checkbox" class="checkSingle inline" name="del[]" value="'. $model->id .'">';
            })

            ->editColumn('title', function ($model) {

                    return $model->title;


            })

            ->addColumn('action', function($model){

                $btn = '<a href="/admin/category/edit/'.$model->id.'" class="edit btn btn-primary btn-lg">edit</a>';

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

                        <form action="'. route('admin.category.destroy', $model->id) .'" method="post">
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
            ->addIndexColumn()
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

        $this->categoryRepository->saveItem($data);

        return redirect()->route('admin.category.index')->with('success','Created Successfully');
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
        $category = Category::find($id);

        return $this->getView($this->viewPath . 'add-category',['category'=>$category]);

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
        $this->categoryRepository->updateItem($request->all(), $id);
        return redirect()->route('admin.category.index')->with('success','Updated Successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $category = Category::find($id);
            $category->delete();
        return redirect()->route('admin.category.index')->with('success','Deleted Successfully');
    }
}
