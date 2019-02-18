<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\CompetenceType;
use App\Entity\Competence;


/**
 * @Route("//competence")
 */
class CompetenceController extends AbstractController
{
     /**
     * @Route("/new", name="competence_new", methods={"GET"})
     */
    public function new()
    {
        $competence = new Competence();
        $form = $this ->createForm(CompetenceType::class, $competence);
        
        return $this -> render ('competence/create.html.twig', [
            'entity'=> $competence,
            'form' => $form->createView(),
            ]
            );
    }

    /**
     * @Route("/{id}/edit", name="competence_edit", methods={"GET","POST"})
     */
     public function edit3($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $competences = $entityManager->getRepository(Competence::class)->findOneBy(['id' => $id]);
        $form = $this->createForm(CompetenceType::class, $competences);
        
        return $this->render('competence/create.html.twig', [
            'entity' => $competences,
            'form' => $form->createView(),
            ]
        );
    }


  public function valid(Request $request)
  
    {
        $competence = new Competence();
        $form = $this->createForm(CompetenceType::class, $competence);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $competence = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($competence);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_lucky_number');
        }
    
        return $this->render('competence/create.html.twig', [
            'entity' => $competence,
            'form' => $form->createView(),
            ]
        );
    }


    public function delete($id)
    {
        
       $entityManager = $this->getDoctrine()->getManager();
        $competence = $entityManager->getRepository(Competence::class)->findOneBy(['id' => $id]);
           
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($competence);
            $entityManager->flush();
            
            return $this ->redirectToRoute('app_lucky_number');
        }
    }

