<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminCategoryController extends AbstractController
{
    #[Route('/admin/category', name: 'app_admin_category')]
    public function index(): Response
    {
        return $this->render('admin_category/index.html.twig', [
            'controller_name' => 'AdminCategoryController',
        ]);
    }

    #[Route('/gestion_category/afficher', name: 'category_afficher')]
    public function afficher_category(CategoryRepository $repoCategory)
    {
        // findAll() = SELECT * FROM category;
        $categories = $repoCategory->findAll();
        return $this->render("admin_category/category_afficher.html.twig", [
            "categories" => $categories
        ]);
    }


    #[Route('/gestion_category/ajouter', name: 'category_ajouter')]
    public function ajouter_category()
    {
        $category = new Category;

        $form = $this->createForm(CategoryType::class, $category);

        return $this->render('admin_category/category_ajouter.html.twig', [
            'formCategory' => $form->createView()
        ]);
    }
}
