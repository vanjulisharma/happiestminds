<?php

namespace App\Controller;

use App\Form\WeekType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VanjuController extends AbstractController
{    
    /**
     * @Route("/vanju",name="vanju")
     */
    
    public function selectWeek(Request $request):Response
    {
        $form =$this->createForm(WeekType::class);
        $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        //handle form submission eg store the selected week
        $selectWeek =$form->getData();

        return $this->render('success/index.html.twig');
    }
        return $this->render('vanju/select_week.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
}
