<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Property;
use AppBundle\Form\Type\PropertyType;

/**
 * Property controller.
 *
 * @Route("/property")
 */
class PropertyController extends Controller
{
    /**
     * Lists all Property entities.
     *
     * @Route("/", name="property_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $properties = $em->getRepository('AppBundle:Property')->findAll();

        return $this->render('property/index.html.twig', array(
            'properties' => $properties,
        ));
    }

    /**
     * Creates a new Property entity.
     *
     * @Route("/new", name="property_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($property);
            $em->flush();

            return $this->redirectToRoute('property_show', array('id' => $property->getId()));
        }

        return $this->render('property/new.html.twig', array(
            'property' => $property,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Property entity.
     *
     * @Route("/{id}", name="property_show")
     * @Method("GET")
     */
    public function showAction(Property $property)
    {
        $deleteForm = $this->createDeleteForm($property);

        return $this->render('property/show.html.twig', array(
            'property' => $property,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Property entity.
     *
     * @Route("/{id}/edit", name="property_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Property $property)
    {
        $deleteForm = $this->createDeleteForm($property);
        $editForm = $this->createForm(PropertyType::class, $property);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($property);
            $em->flush();

            return $this->redirectToRoute('property_edit', array('id' => $property->getId()));
        }

        return $this->render('property/edit.html.twig', array(
            'property' => $property,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Property entity.
     *
     * @Route("/{id}", name="property_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Property $property)
    {
        $form = $this->createDeleteForm($property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($property);
            $em->flush();
        }

        return $this->redirectToRoute('property_index');
    }

    /**
     * Creates a form to delete a Property entity.
     *
     * @param Property $property The Property entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Property $property)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('property_delete', array('id' => $property->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
