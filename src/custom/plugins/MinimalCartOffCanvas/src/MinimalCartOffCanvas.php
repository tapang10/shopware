<?php declare(strict_types=1);

namespace MinimalCartOffCanvas\Controller;

use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Checkout\Cart\SalesChannel\CartService;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Storefront\Page\Checkout\CheckoutPageLoader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MinimalCartController extends AbstractController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @Route("/minimal-cart", name="frontend.minimal.cart", methods={"GET"})
     */
    public function index(Context $context): Response
    {
        $cart = $this->cartService->getCart(Uuid::randomHex(), $context);
        return $this->render('@MinimalCartOffCanvas/storefront/page/checkout/minimal-offcanvas-cart.html.twig', [
            'cart' => $cart,
        ]);
    }
}
