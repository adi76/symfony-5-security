<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/test", name="app_test_get", methods={"GET","POST"})
     */
    public function test_get(Request $request)
    {
        if ($request->isMethod('GET')) {
            return $this->render('test.html.twig', [
                'ids' => [1, 2, 3, 4, 5],
            ]);
        }
        dd($request->request);
    }

    /**
     * @Route("/test2", name="app_test2", methods={"GET"})
     */
    public function test2(): Response
    {
        $author = new Author();
        $form = $this->createForm(AuthorFormType::class, $author);

        return $this->render('home/index2.html.twig', [
            'author_form' => $form->createView(),
        ]);
    }
}
