<?php

namespace test\formuleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use test\formuleBundle\Entity\Produits;
use test\formuleBundle\Form\ProduitsType;

/**
 * Produits controller.
 *
 * @Route("/prod")
 */
class ProduitsController extends Controller
{
    /**
     * Lists all Produits entities.
     *
     * @Route("/", name="prod")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('testformuleBundle:Produits')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Produits entity.
     *
     * @Route("/{id}/show", name="prod_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('testformuleBundle:Produits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produits entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Produits entity.
     *
     * @Route("/new", name="prod_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Produits();
        $form   = $this->createForm(new ProduitsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Produits entity.
     *
     * @Route("/create", name="prod_create")
     * @Method("post")
     * @Template("testformuleBundle:Produits:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Produits();
        $request = $this->getRequest();
        $form    = $this->createForm(new ProduitsType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prod_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Produits entity.
     *
     * @Route("/{id}/edit", name="prod_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('testformuleBundle:Produits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produits entity.');
        }

        $editForm = $this->createForm(new ProduitsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Produits entity.
     *
     * @Route("/{id}/update", name="prod_update")
     * @Method("post")
     * @Template("testformuleBundle:Produits:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('testformuleBundle:Produits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produits entity.');
        }

        $editForm   = $this->createForm(new ProduitsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prod_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Produits entity.
     *
     * @Route("/{id}/delete", name="prod_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('testformuleBundle:Produits')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Produits entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prod'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
