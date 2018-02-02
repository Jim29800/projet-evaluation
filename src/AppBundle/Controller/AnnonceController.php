<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
class AnnonceController extends Controller
{
    /**
     * @Route("/annonces", name="list_annonce")
     */
    public function listAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository("AppBundle:Categorie")->findAll();
        $form = $this->createFormBuilder()
            ->add('filtre', ChoiceType::class, array(
                'attr' => [
                    'id' => "filtre",
                    'class' => 'form-control form-bottom-margin',
                    'placeholder' => 'catégorie',
                    'onchange' => 'this.form.submit()'
                ],
                'choices' => $categories,
                'choice_label' => 'titre',
                'choice_value' => 'id',
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData("filtre");
            $annonces = $em->getRepository("AppBundle:Annonce")->findByCategorie($data);
            $filtrer = $data["filtre"];
            
        }else {
            $annonces = $em->getRepository("AppBundle:Annonce")->findAll();
            $filtrer = "";            
        }






        return $this->render('Annonce/list.html.twig', array(
            "annonces" => $annonces,
            "form" => $form->createView(),
            "filtrer" => $filtrer,
        ));
    }

    /**
     * @Route("/annonce/{id}")
     */
    public function showAction()
    {
        return $this->render('Annonce/show.html.twig', array(
            // ...
        ));
    }

}
