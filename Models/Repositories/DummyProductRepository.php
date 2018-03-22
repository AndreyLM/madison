<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/22/18
 * Time: 10:20 AM
 */

namespace Models\Repositories;


use Models\Entities\Price;
use Models\Entities\Product;
use Models\Exceptions\ModelNotFoundException;
use Models\Exceptions\ModelRuntimeException;

class DummyProductRepository implements IProductRepository
{

    /**
     * @return mixed
     */
    public function getAll()
    {
        $products = [];
        $product1 = new Product(1, 'Uniform 1', 30, 1000);
        $product1->addPrice(new Price(1, 1200, time()-365*2*24*3600, time()-365*24*3600));
        $product1->addPrice(new Price(2, 1400, time()-365*3*24*3600, time()-365*2*3600));
        $product1->addPrice(new Price(3, 800, time()-365*24*3600, time()));
        $product1->addPrice(new Price(4, 600, time(), time()+24*3600));
        $product1->addPrice(new Price(5, 1500, time(), time()+2*24*3600));
        $products[] = $product1;


        $product2 = new Product(2, 'Uniform 1', 30, 1000);
        $product2->addPrice(new Price(6, 1200, time()-365*2*24*3600, time()-365*24*3600));
        $product2->addPrice(new Price(7, 1400, time()-365*3*24*3600, time()-365*2*3600));
        $product2->addPrice(new Price(8, 800, time()-365*24*3600, time()));
        $product2->addPrice(new Price(9, 600, time(), time()+24*3600));
        $product2->addPrice(new Price(10, 1500, time(), time()+2*24*3600));
        $products[] = $product2;

        $product3 = new Product(3, 'Uniform 1', 30, 1000);
        $product3->addPrice(new Price(11, 1200, time()-365*2*24*3600, time()-365*24*3600));
        $product3->addPrice(new Price(12, 1400, time()-365*3*24*3600, time()-365*2*3600));
        $product3->addPrice(new Price(13, 800, time()-365*24*3600, time()));
        $product3->addPrice(new Price(14, 600, time(), time()+24*3600));
        $product3->addPrice(new Price(15, 1500, time(), time()+2*24*3600));
        $products[] = $product3;

        return $products;
    }




    /**
     * @return Product
     */
    public function create(): Product
    {
        // TODO: Implement create() method.
    }

    /**
     * @return Product
     */
    public function edit(): Product
    {
        // TODO: Implement edit() method.
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param int $id
     * @return Product
     * @throws ModelNotFoundException
     */
    public function getById($id): Product
    {
        if($id != 5)
            throw new ModelNotFoundException('Can not product with id='.$id);

        $product1 = new Product(5, 'Uniform 1', 30, 1000);
        $product1->addPrice(new Price(1, 1200, time()-365*2*24*3600, time()-365*24*3600));
        $product1->addPrice(new Price(2, 1400, time()-365*3*24*3600, time()-365*2*3600));
        $product1->addPrice(new Price(3, 800, time()-365*24*3600, time()));
        $product1->addPrice(new Price(4, 600, time(), time()+24*3600));
        $product1->addPrice(new Price(5, 1500, time(), time()+2*24*3600));

        return $product1;
    }
}