<?php

namespace Feft\AddressBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Form\Type\PostalCodeType;

/**
 * PostalCode controller.
 *
 * @Route("/postalcode")
 */
class PostalCodeController extends Controller
{

    /**
     * Lists all PostalCode entities.
     *
     * @Route("/", name="postalcode")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FeftAddressBundle:PostalCode')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new PostalCode entity.
     *
     * @Route("/", name="postalcode_create")
     * @Method("POST")
     * @Template("FeftAddressBundle:PostalCode:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PostalCode();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('postalcode_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a PostalCode entity.
     *
     * @param PostalCode $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PostalCode $entity)
    {
        $form = $this->createForm(new PostalCodeType(), $entity, array(
            'action' => $this->generateUrl('postalcode_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PostalCode entity.
     *
     * @Route("/new", name="postalcode_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PostalCode();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a PostalCode entity.
     *
     * @Route("/{id}", name="postalcode_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:PostalCode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PostalCode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PostalCode entity.
     *
     * @Route("/{id}/edit", name="postalcode_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:PostalCode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PostalCode entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a PostalCode entity.
     *
     * @param PostalCode $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(PostalCode $entity)
    {
        $form = $this->createForm(new PostalCodeType(), $entity, array(
            'action' => $this->generateUrl('postalcode_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing PostalCode entity.
     *
     * @Route("/{id}", name="postalcode_update")
     * @Method("PUT")
     * @Template("FeftAddressBundle:PostalCode:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:PostalCode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PostalCode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('postalcode_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a PostalCode entity.
     *
     * @Route("/{id}", name="postalcode_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FeftAddressBundle:PostalCode')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PostalCode entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('postalcode'));
    }

    /**
     * Creates a form to delete a PostalCode entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('postalcode_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
