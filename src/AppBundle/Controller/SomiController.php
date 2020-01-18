<?php

namespace AppBundle\Controller;

use AppBundle\Entity\somazpost;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\PropertyAccess\PropertyPath;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class SomiController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function somiAction(Request $request)
    {

        // creates a task and gives it some dummy data for this example
        $somaz = new somazpost();
        $somaz->setIme('');
        $somaz->setPrezime('');
        $somaz->setNazivProjekta('Projekat1');
        $somaz->setAktivnost('');
        $somaz->setUtrosenoVreme(0.5);
        $somaz->setDatum(new \DateTime('today'));

        $form = $this->createFormBuilder($somaz)
            ->add('ime', TextType::class)
            ->add('prezime', TextType::class)
            ->add('nazivProjekta', ChoiceType::class,  array(
                'choices' => array(
                    'aplikacija' => 'Projekat1',
                    'sajt' => 'Projekat2',
                    'animacija' => 'Projekat3'

                ),
                'choice_label' => function ($value) { return $value; },
            ))
            ->add('aktivnost', TextareaType::class)
            ->add('utrosenoVreme', ChoiceType::class, array(
                'choices' => array(
                    '30 min' => 0.5,
                    '1 sat' => 1.0,
                    '1 sat i 30 min' => 1.5,
                    '2 sata' => 2.0,
                    '2 sata i 30 min' => 2.5,
                    '3 sata' => 3.0,
                    '3 sata i 30 min' => 3.5,
                    '4 sata' => 4.0,
                    '4 sata i 30 min' => 4.5,
                    '5 sati' => 5.0,
                    '5 sati i 30min' => 5.5,
                    '6 sati' => 6.0,
                    '6 sata i 30 min' => 6.5,
                    '7 sati' => 7.0,
                    '7 sati i 30 min' => 7.5,
                    '8 sati' => 8.0
                ),
                'choice_label' => function ($value) { return $value; },))

            ->add('datum', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Unesi'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

           $im=$form['ime']->getData();
            $pr=$form['prezime']->getData();
            $ip=$form['nazivProjekta']->getData();
            $ak=$form['aktivnost']->getData();
            $uv=$form['utrosenoVreme']->getData();
            $dt=$form['datum']->getData();

            $somaz->setIme($im);
            $somaz->setPrezime($pr);
            $somaz->setNazivProjekta($ip);
            $somaz->setAktivnost($ak);
            $somaz->setUtrosenoVreme($uv);
            $somaz->setDatum($dt);

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($somaz);

            $entityManager->flush();

            return $this->redirect($request->getUri());

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView() ));


    }

    /**
     * @Route("manager", name="manager")
     */
    public function menadzeraction(Request $request)
    {

        $uds= $this->getDoctrine()
        ->getRepository('AppBundle:somazpost')
        ->findAll();
        // replace this example code with whatever you need
        return $this->render('default/manager.html.twig',array(
            'userdats' => $uds));
    }

}
