<?php

namespace Service\ServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Service\ServiceBundle\Entity\Enquiry;
use Service\ServiceBundle\FormEntity\EnquiryType;
use Symfony\Component\Form;


class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('ServiceBundle:Page:index.html.twig');
    }
    
    public function aboutAction()
    {
        return $this->render('ServiceBundle:Page:about.html.twig');
    }
    
    public function contactsAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(EnquiryType::class, $enquiry);
        
        if($request->isMethod($request::METHOD_POST)){
            $form->handleRequest($request);
            if($form->isValid()){
                return $this->redirect($this->generateUrl('ServiceBundle_contact'));
            }
        }
        return $this->render('ServiceBundle:Page:contacts.html.twig',array(
            'form'=> $form->createView()
        ));
    }
}
