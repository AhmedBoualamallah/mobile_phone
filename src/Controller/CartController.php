<?php

namespace App\Controller;

use App\Model\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;

class CartController extends AbstractController
{
    private Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    #[Route('/mon-panier', name: 'cart')]
    public function index(): Response
    {
        $cartProducts = $this->cart->getDetails();

        return $this->render('cart/index.html.twig', [
            'cart' => $cartProducts['products'],
            'totalQuantity' => $cartProducts['totals']['quantity'],
            'totalPrice' =>$cartProducts['totals']['price']
        ]);
    }

    #[Route('/panier/ajouter/{id}', name: 'add_to_cart')]
    public function add(int $id): Response
    {
        $this->cart->add($id);
        return $this->redirectToRoute('cart');
    }

    #[Route('/panier/réduire/{id}', name: 'decrease_item')]
    public function decrease(int $id): Response
    {
        $this->cart->decreaseItem($id);
        return $this->redirectToRoute('cart');
    }
    
    #[Route('/panier/supprimer/{id}', name: 'remove_cart_item')]
    public function removeItem(int $id): Response
    {
        $this->cart->removeItem($id);
        return $this->redirectToRoute('cart');
    }

    #[Route('/panier/supprimer/', name: 'remove_cart')]
    public function remove(): Response
    {
        $this->cart->remove();
        return $this->redirectToRoute('product');
    }
}
