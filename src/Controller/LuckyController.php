<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use App\Entity\Contact;
use App\Entity\Apropos;
use App\Entity\Competence;

class LuckyController extends Controller
{
    public function number()
    {
        $number = random_int(0, 100);
        
        $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        
        $contacts = $this->getDoctrine()->getRepository(Contact::class)->findAll();

        $apropos = $this->getDoctrine()->getRepository(Apropos::class)->findAll();
        
        $competences= $this->getDoctrine()->getRepository(Competence::class)->findAll();
        


        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
            'name' => 'Olivier',
            'formations'=> $formations,
            'contacts'=>$contacts,
            'apropos'=>$apropos,
            'competences'=>$competences
        ));
    }



    public function createFormation()
    {
        $form = new Formation();
        $form -> setName('Ma formation');
        $form -> setName('name');
        $form -> setName('duree');
        $form -> setName('lieu');
        $eManager = $this ->getDoctrine()->getManager();
        $eManager->persist($form);
        $eManager->flush();
    }
    
    
    public function createContact()
    {
        $form = new Contact();
        $form -> setName('Contact');
        $form -> setName('mail');
        $form -> setName('telephone');
        $form -> setName('site');
        $eManager = $this ->getDoctrine()->getManager();
        $eManager->persist($form);
        $eManager->flush();
    }
    
    


    
    public function createApropos()
    {
        $form = new Apropos();
        $form -> setName('Apropos');
        $form -> setName('description');
        $eManager = $this ->getDoctrine()->getManager();
        $eManager->persist($form);
        $eManager->flush();
    }


    
    public function createCompetence()
    {
        $form = new Competence();
        $form -> setName('Competence');
        $form -> setName('audiovisuel');
        $form -> setName('infographie');
        $form -> setName('communication');
        $eManager = $this ->getDoctrine()->getManager();
        $eManager->persist($form);
        $eManager->flush();
    }
}
