<?php

namespace TroisLDecoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
    	$test = "Accueil";
        return $this->render('@TroisLDeco/index.html.twig', ['test'=>$test]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {
    	return $this->render('@TroisLDeco/admin/admin.html.twig');
    }
}
