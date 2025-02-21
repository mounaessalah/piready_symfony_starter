<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeBController extends AbstractController{
    #[Route('/home/b', name: 'app_home_b')]
    public function index(): Response
    {
        return $this->render('backoffice/index.html.twig', [
            'controller_name' => 'HomeBController',
        ]);
    }

    #[Route('/dashboard', name: 'admin_home')]
    public function dasboard(): Response
    {
        return $this->render('backoffice/dashboard.html.twig', [
            
        ]);
    }

    #[Route('/users', name: 'admin_users')]
    public function user(): Response
    {
        return $this->render('backoffice/users.html.twig', [
            
        ]);
    }
    #[Route('/forum', name: 'admin_forum')]
    public function forum(): Response
    {
        return $this->render('backoffice/forum.html.twig', [
            
        ]);
    }
    #[Route('/dons', name: 'admin_donations')]
    public function dons(): Response
    {
        return $this->render('backoffice/donations.html.twig', [
            
        ]);
    }
    #[Route('/gallery', name: 'admin_gallery')]
    public function gallery(): Response
    {
        return $this->render('backoffice/gallery.html.twig', [
            
        ]);
    }
    #[Route('/atelier', name: 'admin_workshops')]
    public function atelier(): Response
    {
        return $this->render('backoffice/workshops.html.twig', [
            
        ]);
    }
    
    #[Route('/beneficiaires', name: 'admin_beneficiaries')]
    public function beneficiaires(): Response
    {
        return $this->render('backoffice/beneficiaires.html.twig', [
            
        ]);
    }
    

}
