<?php

namespace App\Controller;

use App\Entity\Auto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AutoController extends AbstractController
{
    /**
     * @Route("/auto", name="auto")
     */
    public function index()
    {
        return $this->render('auto/index.html.twig', [
            'controller_name' => 'AutoController',
        ]);
    }
	/**
	 * @Route("/product", name="create_product")
	 */
	public function createProduct(): Response
	{
		// you can fetch the EntityManager via $this->getDoctrine()
		// or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
		$entityManager = $this->getDoctrine()->getManager();

		$product = new Auto();
		$product->setName('Keyboard');
		$product->setPrice(1999);
		$product->setDescription('Ergonomic and stylish!');

		// tell Doctrine you want to (eventually) save the Product (no queries yet)
		$entityManager->persist($product);

		// actually executes the queries (i.e. the INSERT query)
		$entityManager->flush();

		return new Response('Saved new product with id '.$product->getId());
	}
}
