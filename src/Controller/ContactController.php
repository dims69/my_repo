<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ContactType;
use App\Entity\Contact;

/**
 * @Route("//competence")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/new", name="contact_new", methods={"GET"})
     */
    public function create()
    {
        $contact = new Contact();
        $form = $this ->createForm(ContactType::class, $contact);
        
        return $this -> render(
            'contact/create.html.twig',
            [
            'entity'=> $contact,
            'form' => $form->createView(),
            ]
            );
    }
    /**
     * @Route("/{id}/edit", name="contact_edit", methods={"GET","POST"})
     */
    public function edit4($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $contact = $entityManager->getRepository(Contact::class)->findOneBy(['id' => $id]);
        $form = $this->createForm(ContactType::class, $contact);
        
        return $this->render(
            'contact/create.html.twig',
            [
            'entity' => $contacts,
            'form' => $form->createView(),
            ]
        );
    }


    public function valid(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_lucky_number');
        }
    
        return $this->render(
            'contact/create.html.twig',
            [
            'entity' => $contact,
            'form' => $form->createView(),
            ]
        );
    }
    /**
         * @Route("/{id}", name="form_contact_delete", methods={"POST","GET"})
         */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $contact = $entityManager->getRepository(Contact::class)->findOneBy(['id' => $id]);
           
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($contact);
        $entityManager->flush();
            
        return $this ->redirectToRoute('app_lucky_number');
    }
}
