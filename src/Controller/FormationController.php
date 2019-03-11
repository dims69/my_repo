<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\FormationType;
use App\Entity\Formation;

/**
 * @Route("/formation")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("/new", name="formation_new", methods={"GET"})
     */
    public function new()
    {
        $formation = new Formation();
        $form = $this ->createForm(FormationType::class, $formation);
        
        return $this -> render(
            'formation/create.html.twig',
            [
            'entity'=> $formation,
            'form' => $form->createView(),
            ]
        );
    }
    
    /**
     * @Route("/edit/{id}", name="formation_edit", methods={"GET","POST"})
     *
     * @param Request  $request
     * @param Formation $formations
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit2(Request $request, Formation $formations)
    {
        $form = $this->createForm(FormationType::class, $formations);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('formation/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }


    public function valid(Request $request)
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $loisir = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_lucky_number');
        }
    
        return $this->render(
            'formation/create.html.twig',
            [
            'entity' => $formation,
            'form' => $form->createView(),
            ]
        );
    }
    /**
     * @Route("/{id}", name="form_formation_delete", methods={"POST","GET"})
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $formation = $entityManager->getRepository(Formation::class)->findOneBy(['id' => $id]);
           
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($formation);
        $entityManager->flush();
            
        return $this ->redirectToRoute('app_lucky_number');
    }
}
