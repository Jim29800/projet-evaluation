<?php
namespace AppBundle\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use AppBundle\Entity\Annonce;
use AppBundle\Entity\Utilisateur;

class AdminController extends BaseAdminController
{
    public function createNewAnnonceEntity()
    {
        $annonce =  new Annonce();
        $annonce->setUtilisateur($this->getUser());
        return $annonce;
    }
    public function createNewUtilisateurEntity()
    {

        $utilisateur = new Utilisateur();
        $utilisateur->setRoles(array('ROLE_ADMIN'));
        $utilisateur->setEnabled(true);
        
        return $utilisateur;
    }
    // public function persistAnnonceEntity($annonce)
    // {
    //     $annonce->setUtilisateur($this->getUser());
    //     parent::persistAnnonceEntity($annonce);
    // }


    // public function createNewUserEntity()
    // {
    //     return $this->get('fos_user.user_manager')->createUser();
    // }

    // public function persistUserEntity($user)
    // {
    //     $this->get('fos_user.user_manager')->updateUser($user, false);
    //     parent::persistUserEntity($user);
    // }
    // public function updateUserEntity($user)
    // {
    //     $this->get('fos_user.user_manager')->updateUser($user, false);
    //     parent::updateUserEntity($user);
    // }
    // public function updateEntity($entity)
    // {
    //     if (method_exists($entity, 'utilisateur')) {
    //         $entity->setUtilisateur($this->getUser());
    //     }

    //     parent::updateEntity($entity);
    // }
    // Customizes the instantiation of entities only for the 'User' entity

    // protected function newAction()
    // {
    //     $this->dispatch(EasyAdminEvents::PRE_NEW);
    //     $entity = $this->executeDynamicMethod('createNew<EntityName>Entity');
    //     $easyadmin = $this->request->attributes->get('easyadmin');
    //     $easyadmin['item'] = $entity;
    //     $this->request->attributes->set('easyadmin', $easyadmin);
    //     $fields = $this->entity['new']['fields'];
    //     $newForm = $this->executeDynamicMethod('create<EntityName>NewForm', array($entity, $fields));
    //     $newForm->handleRequest($this->request);
    //     //=============================
    //     if ($newForm->isSubmitted() && $newForm->isValid()) {
    //         if (get_class($entity) === 'AppBundle\Entity\Annonce') {
    //             $user = $this->getUser();
    //             $entity->setUtilisateur($user);
    //         }
    //         $this->dispatch(EasyAdminEvents::PRE_PERSIST, array('entity' => $entity));
    //         $this->executeDynamicMethod('prePersist<EntityName>Entity', array($entity));
    //         $this->em->persist($entity);
    //         $this->em->flush();
    //         $this->dispatch(EasyAdminEvents::POST_PERSIST, array('entity' => $entity));
    //         return $this->redirectToReferrer();
    //     }
    //     //============================
    //     $this->dispatch(EasyAdminEvents::POST_NEW, array(
    //         'entity_fields' => $fields,
    //         'form' => $newForm,
    //         'entity' => $entity,
    //     ));
    //     return $this->render($this->entity['templates']['new'], array(
    //         'form' => $newForm->createView(),
    //         'entity_fields' => $fields,
    //         'entity' => $entity,
    //     ));
    // }
}