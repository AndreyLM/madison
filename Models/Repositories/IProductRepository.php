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
     * @throws ModelRuntimeException
     */
    public function create() : Product;

    /* @return Product
     * @throws ModelRuntimeException
     */
    public function edit() : Product;

    /* @return bool
     * @throws ModelRuntimeException
     */
    public function delete() : bool;


}