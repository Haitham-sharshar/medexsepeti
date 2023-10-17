<?php


namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CrudInterfaces;

class CategoryRepository implements CrudInterfaces
{


    public function saveItem($data)
    {
        $category = new Category() ;
        $category->title = $data['title_en'];

        $category->save();


    }

    public function getItemById($id)
    {
        return Category::find($id);
    }


    public function updateItem($data, $id)
    {

        $category = Category::find($id);
        $category->update([
            'title' => $data['title_en']
        ]);
    }

    public function deleteItem($id)
    {

        $category = Category::find($id);
        $category->delete();
    }
}
