<?php

namespace Feft\AddressBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Feft\AddressBundle\Entity\Street;
use Feft\AddressBundle\Form\StreetType;

/**
 * Street controller.
 *
 * @Route("/street")
 */
class StreetController extends Controller
{

    /**
     * Lists all Street entities.
     *
     * @Route("/", name="street")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FeftAddressBundle:Street')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Street entity.
     *
     * @Route("/", name="street_create")
     * @Method("POST")
     * @Template("FeftAddressBundle:Street:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Street();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('street_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Street entity.
     *
     * @param Street $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Street $entity)
    {
        $form = $this->createForm(new StreetType(), $entity, array(
            'action' => $this->generateUrl('street_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Street entity.
     *
     * @Route("/new", name="street_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Street();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Street entity.
     *
     * @Route("/{id}", name="street_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:Street')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Street entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Street entity.
     *
     * @Route("/{id}/edit", name="street_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:Street')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Street entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Street entity.
    *
    * @param Street $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Street $entity)
    {
        $form = $this->createForm(new StreetType(), $entity, array(
            'action' => $this->generateUrl('street_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Street entity.
     *
     * @Route("/{id}", name="street_update")
     * @Method("PUT")
     * @Template("FeftAddressBundle:Street:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:Street')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Street entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('street_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Street entity.
     *
     * @Route("/{id}", name="street_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FeftAddressBundle:Street')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Street entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('street'));
    }

    /**
     * Creates a form to delete a Street entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('street_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
