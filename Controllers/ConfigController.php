<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/24/18
 * Time: 2:10 PM
 */

namespace Controllers;


use App\Controller\BaseController;
use App\Template\ITemplateRenderer;
use PDO;
use PDOException;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;


class ConfigController extends BaseController
{

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ServerRequestInterface $request, ITemplateRenderer $template, ContainerInterface $container)
    {
        parent::__construct($request, $template);
        $this->container = $container;
    }

    public function createTables(){
        $connection = $this->container->get('config')['connection'];

        $host = $connection['host'];
        $username = $connection['user'];
        $password = $connection['pass'];
        $db = $connection['db'];

        try{
            $dsn = "mysql:host=$host;dbname=$db";
            $dbh = new PDO($dsn, $username, $password);

            $sql_create_prod_tbl = <<<EOSQL
            CREATE TABLE products(
              id int(11) NOT NULL AUTO_INCREMENT,
              name varchar(255) DEFAULT NULL,
              discount int(3) DEFAULT NULL,
              default_price int(10),
              PRIMARY KEY (id),
              UNIQUE(name)
            ) ENGINE=InnoDB
EOSQL;

            $sql_create_prices_tbl = <<<EOSQL
            CREATE TABLE prices (
              id int(11) NOT NULL AUTO_INCREMENT,
              value date NOT NULL,
              start_date int(30) NOT NULL,
              expiration_date int(30) NOT NULL,
              product_id  int(11) NOT NULL,
              PRIMARY KEY (id),
              UNIQUE(start_date),
              KEY prod_prices (product_id),
              CONSTRAINT prod_prices FOREIGN KEY (product_id)
              REFERENCES products (id) ON DELETE CASCADE ON UPDATE CASCADE 
            ) ENGINE=InnoDB
EOSQL;

            $msg = '';

            $r = $dbh->exec($sql_create_prod_tbl);

            if($r !== false){

                $r = $dbh->exec($sql_create_prices_tbl);

                if($r !== false){
                    $msg =  "Tables are created successfully!<br/>";
                }else{
                    $msg =  "Error creating the prices table.<br/>";
                }

            }else{
                $msg =  "Error creating the products table.<br/>";
            }

            // display the message
            if($msg != '')
                return $this->renderHtml('config/create_tables', [
                    'msg' => $msg
                ]);

        }catch (PDOException $e){
            throw $e;
        }
    }
}