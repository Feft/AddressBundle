<?php

namespace Feft\AddressBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Form\Type\LocalityType;

/**
 * Locality controller.
 *
 * @Route("/locality")
 */
class LocalityController extends Controller
{

    /**
     * Lists all Locality entities.
     *
     * @Route("/", name="locality")
     * @Method("GET")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FeftAddressBundle:Locality')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Locality entity.
     *
     * @Route("/", name="locality_create")
     * @Method("POST")
     * @Template("FeftAddressBundle:Locality:new.html.twig")
     *
     * @param Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction(Request $request)
    {
        $entity = new Locality();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('locality_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Locality entity.
     *
     * @param Locality $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Locality $entity)
    {
        $form = $this->createForm(new LocalityType(), $entity, array(
            'action' => $this->generateUrl('locality_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Locality entity.
     *
     * @Route("/new", name="locality_new")
     * @Method("GET")
     * @Template()
     *
     * @return array
     */
    public function newAction()
    {
        $entity = new Locality();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Locality entity.
     *
     * @Route("/{id}", name="locality_show")
     * @Method("GET")
     * @Template()
     *
     * @param $id
     *
     * @return array
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:Locality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Locality entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Locality entity.
     *
     * @Route("/{id}/edit", name="locality_edit")
     * @Method("GET")
     * @Template()
     *
     * @param $id
     *
     * @return array
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:Locality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Locality entity.');
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
     * Creates a form to edit a Locality entity.
     *
     * @param Locality $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Locality $entity)
    {
        $form = $this->createForm(new LocalityType(), $entity, array(
            'action' => $this->generateUrl('locality_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Locality entity.
     *
     * @Route("/{id}", name="locality_update")
     * @Method("PUT")
     * @Template("FeftAddressBundle:Locality:edit.html.twig")
     *
     * @param Request $request
     * @param $id locality id to update
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FeftAddressBundle:Locality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Locality entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('locality_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Locality entity.
     *
     * @Route("/{id}", name="locality_delete")
     * @Method("DELETE")
     *
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FeftAddressBundle:Locality')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Locality entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('locality'));
    }

    /**
     * Creates a form to delete a Locality entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('locality_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
