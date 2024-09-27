<?php declare(strict_types=1);

namespace Custom\MinimalCartOffCanvas\Controller;

use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Checkout\Cart\CartService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MinimalCartController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request): Response
    {
        // Your logic for adding to cart
        $cart = $this->cartService->add($request);

        // Logic to render the minimal off-canvas
        return $this->render('@Storefront/page/checkout/minimal-offcanvas-cart.html.twig', [
            'cart' => $cart,
        ]);
    }

    public function getCrossSellingProducts($productId)
    {
        $customFieldIndex = $this->getCustomFieldIndex($productId); // Your method to fetch the custom field
        $pluginConfigIndex = $this->getPluginConfigIndex(); // Your method to fetch plugin configuration

        // Determine which index to use
        $crossSellingIndex = !empty($customFieldIndex) ? $customFieldIndex : $pluginConfigIndex;

        // Fetch cross-selling groups based on the determined index
        // Implement your logic to fetch the cross-selling products here
        // Return the list of products
    }

}
