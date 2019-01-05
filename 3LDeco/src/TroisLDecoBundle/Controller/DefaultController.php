<?php

namespace TroisLDecoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TroisLDecoBundle\Entity\Upload;
use TroisLDecoBundle\Form\UploadType;
use Symfony\Component\HttpFoundation\Request;

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
    public function adminAction(Request $request)
    {
    	$this->denyAccessUnlessGranted('ROLE_ADMIN');
    	
    	$upload = new Upload();
    	
    	// CreateForm prend deux arguments, la constante class de notre form type, et notre objet
    	$form = $this->createForm(UploadType::class, $upload);
    	
    	
    	// $form contient maintenant notre formulaire, on peut le manipuler comme précédemment
    	
    	$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
    	    $em = $this->getDoctrine()->getManager();
    	    $em->persist($upload);
    	    $em->flush();
    	    
    	    return $this->redirectToRoute('home');
    	}
    	
    	
    	return $this->render('@TroisLDeco/admin/admin.html.twig', array(
    	    'form' => $form->createView())
    	    );
    }
}
