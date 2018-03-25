<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/24/18
 * Time: 2:03 PM
 */

namespace Models\Repositories;


use Models\Entities\Product;
use Models\Exceptions\ModelNotFoundException;
use Models\Exceptions\ModelRuntimeException;
use PDO;

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
        $stmt = $this->pdo->query('SELECT * FROM products');
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo var_dump($result); die;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function getById($id): Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id=:id");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function save(Product $product): Product
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
        // TODO: Implement delete() method.
    }

    private function update(Product $product) {

    }

    private function create(Product $product) {

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
}