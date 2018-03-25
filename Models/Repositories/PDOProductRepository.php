<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/24/18
 * Time: 2:03 PM
 */

namespace Models\Repositories;


use Models\Entities\Price;
use Models\Entities\Product;
use Models\Exceptions\ModelNotFoundException;
use Models\Exceptions\ModelRuntimeException;
use PDO;
use PDOException;

class PDOProductRepository implements IProductRepository
{
    /**
     * @var PDO
     */
    private $pdo;
    /**
     * @var array
     */
    private $configs;

    public function __construct(array $configs)
    {
        $this->configs = $configs;
        $this->init();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT products.id AS product_id, 
      products.name, products.discount,
    products.default_price, prices.id AS prices_id, prices.value, prices.start_date, prices.expiration_date    
          FROM products LEFT JOIN prices on products.id = prices.product_id');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $this->toEntity($result);
    }

    /**
     * @param int $id
     * @return Product
     */
    public function getById($id): Product
    {
        $stmt = $this->pdo->prepare("SELECT products.id AS product_id, 
      products.name, products.discount,
    products.default_price, prices.id AS prices_id, prices.value, prices.start_date, prices.expiration_date    
          FROM products LEFT JOIN prices on products.id = prices.product_id WHERE products.id=:id");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        echo var_dump($this->toEntity($result)); die;
    }

    /**
     * @param Product $product
     * @return int
     */
    public function save(Product $product): int
    {
        if($product->id)
            return $this->update($product);

        return $this->create($product);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {

            $stmt = $this->pdo->prepare("DELETE FROM MyGuests WHERE id=:id");

            $res = $stmt->execute([$id]);

            echo var_dump($res); die;

        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }


    private function update(Product $product) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO products (name, discount, default_price)
    VALUES (:name, :discount, :default_price)");
            $stmt->execute([$product->name, $product->discount, $product->defaultPrice]);
        }catch (PDOException $e)
        {
            throw $e;
        }
    }

    private function create(Product $product) {
        try {

            $stmt = $this->pdo->prepare("INSERT INTO products (name, discount, default_price)
    VALUES (:name, :discount, :default_price)");
            $stmt->execute([$product->name, $product->discount, $product->defaultPrice]);
            $prod_id = $this->pdo->lastInsertId();

            $this->createPrices($product, $prod_id);

            return $prod_id;
        }catch (PDOException $e)
        {
//            throw $e;
            throw new ModelRuntimeException($e->getCode().' Error occur while inserting data');
        }
    }


    public function createPrices(Product $product, $prod_id) {
        $params = [];

        foreach ($product->getAdditionalPrices() as $price) {
            $params[] = [$price->value, $price->startDate, $price->expirationDate, $prod_id];
        }


        $stmt = $this->multiPrepare("INSERT INTO prices (value, start_date, expiration_date, product_id)", $params);

        $this->multiExecute($stmt, $params);
    }

    private function init()
    {
        $host = $this->configs['host'];
        $username = $this->configs['user'];
        $password = $this->configs['pass'];
        $db = $this->configs['db'];
        $charset = $this->configs['charset'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $username, $password, $opt);
    }

    private function multiPrepare($sql, $data)
    {
        $rows = count($data);
        $cols = count($data[0]);
        $rowString = '(' . rtrim(str_repeat('?,', $cols), ',') . '),';
        $valString = rtrim(str_repeat($rowString, $rows), ',');

        return $this->pdo->prepare($sql . ' VALUES ' . $valString);
    }

    private function multiExecute(\PDOStatement $stmt, $data)
    {
        $bindArray = array();
        array_walk_recursive($data, function($item) use (&$bindArray) { $bindArray[] = $item; });
        $stmt->execute($bindArray);
    }

    private function toEntity(array $arr) {
        $result = [];
        $product = new Product();
        foreach ($arr as $item) {
            if($product->id !== $item['product_id']) {
                $result[] = $product;
                $product = new Product();
                $product->id = $item["product_id"];
                $product->name = $item["name"];
                $product->discount = $item["discount"];
                $product->defaultPrice = $item["default_price"];
            }

            if(!empty($item["prices_id"])) {
                $product->addPrice(new Price($item["prices_id"],
                    $item["value"], $item["start_date"], $item["expiration_date"]));
            }
        }

        return $result;
    }
}