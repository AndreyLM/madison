<?php
namespace App\Middlewares;

use App\Router\Exceptions\RequestNotMatchedException;
use App\Router\IRouter;
use JsonSchema\Exception\ResourceNotFoundException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;

class RouterMiddleware implements MiddlewareInterface
{

    /**
     * @var IRouter
     */
    private $router;

    public function __construct(IRouter $router)
    {
        $this->router = $router;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            $result = $this->router->match($request);

            foreach ($result->getAttributes() as $attribute=>$value) {
                $request = $request->withAttribute($attribute, $value);
            }

            $action = $result->getHandler();
            return $action($request);

        } catch (RequestNotMatchedException $e) {
            return new HtmlResponse('Undefined page 2', 404);
        }
    }

}