<?php


namespace App\Repositories;


use App\Models\Article;
use App\Models\Product;
use App\Repositories\Interfaces\CrudInterfaces;

class ProductRepository implements CrudInterfaces
{


    public function saveItem($data)
    {

   if (isset($data['image'])){
        $imageName = time() . '.' . $data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('images'), $imageName);
   }
        $product = new Product() ;

        $product->title =  $data['title'] ;
        $product->price =  isset($data['price']) ? $data['price'] : 0;
        $product->tags =  isset($data['tags']) ? $data['tags'] : 0;
        $product->category_id =  $data['category_id'] ;
        $product->image =  isset($imageName) ? $imageName : null;


        $product->save();


    }

    public function getItemById($id)
    {
        return Product::find($id);
    }


    public function updateItem($data, $id)
    {
        if (isset($data['image'])){
            $imageName = time() . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->move(public_path('images'), $imageName);
        }else{
           $imageName = $data['old_image'];
        }
        $product = Product::find($id);

        $product->update([
            'title' => $data['title'],
            'image' =>  $imageName,
            'tags' =>  $data['tags'],
            'category_id' =>  $data['category_id'],
            'price' =>  isset($data['price']) ? $data['price'] : 0,
        ]);
    }

    public function deleteItem($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
