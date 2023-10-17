<?php


namespace App\Repositories\Interfaces;


interface CrudInterfaces
{

    public function getItemById($data);


    public function saveItem($data);

    public function updateItem($data,$id);

    public function deleteItem($data);
}
