<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



final class HomeController extends AbstractController{
   
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('frontoffice/page/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    

    #[Route('/about-us', name: 'app_about')]
    public function about_us(): Response
    {
        return $this->render('frontoffice/page/about.html.twig', [
            
        ]);
    }

    #[Route('/forum', name: 'app_forum')]
    public function forum(): Response
    {
        return $this->render('frontoffice/page/forum.html.twig', [
            
        ]);
    }

    
    #[Route('/gallery', name: 'app_gallery')]
    public function gallery(): Response
    {
        return $this->render('frontoffice/page/gallery.html.twig', [
            
        ]);
    }

    #[Route('/dons', name: 'app_dons')]
    public function dons(): Response
    {
        return $this->render('frontoffice/page/dons.html.twig', [
            
        ]);
    }
    #[Route('/atelier', name: 'app_atelier')]
    public function atelier(): Response
    {
        return $this->render('frontoffice/page/atelier.html.twig', [
            
        ]);
    }
    #[Route('/beneficiaires', name: 'app_beneficiaires')]
    public function beneficiaires(): Response
    {
        return $this->render('frontoffice/page/beneficiaires.html.twig', [
            
        ]);
    }
   
}
