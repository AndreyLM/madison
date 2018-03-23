<?php
namespace Models\Repositories;

use Models\Entities\Product;
use Models\Exceptions\ModelNotFoundException;
use Models\Exceptions\ModelRuntimeException;

interface IProductRepository
{
    /* @return Product[] */
    public function getAll();


    /* @param $id int
     * @return Product
    * @throws ModelNotFoundException*/
    public function getById($id) : Product;

    /* @return Product
     * @param $product Product
     * @throws ModelRuntimeException
     */
    public function save(Product $product) : Product;


    /* @return bool
     * @param $id int
     * @throws ModelRuntimeException
     */
    public function delete($id) : bool;


}