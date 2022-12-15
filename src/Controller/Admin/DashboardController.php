<?php

namespace App\Controller\Admin;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function index(CategoryRepository $categoryRepository): Response
    {
		$categories = $categoryRepository->findAll();
        return $this->render('admin/dashboard/index.html.twig', [
			'categories' => $categories,
        ]);
    }
	
	#[Route('/admin/category/{id}', name: 'admin_category_show')]
	public function showCategory(CategoryRepository $categoryRepository, $id): Response
	{
		$category = $categoryRepository->find($id);
		return $this->render('admin/dashboard/category.html.twig', [
			'category' => $category,
		]);
	}
}
