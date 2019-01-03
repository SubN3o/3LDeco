<?php

namespace TroisLDecoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
    	$test = "hello";
        return $this->render('@TroisLDeco/index.html.twig', ['test'=>$test]);
    }
}
