<?php

namespace Service\ServiceBundle\Controller;

use Service\ServiceBundle\Entity\ImageTable;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Imagetable controller.
 *
 * @Route("imagetable")
 */
class ImageTableController extends Controller
{
    /**
     * Lists all imageTable entities.
     *
     * @Route("/", name="imagetable_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imageTables = $em->getRepository('ServiceBundle:ImageTable')->findAll();

        return $this->render('imagetable/index.html.twig', array(
            'imageTables' => $imageTables,
        ));
    }

    /**
     * Creates a new imageTable entity.
     *
     * @Route("/new", name="imagetable_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imageTable = new Imagetable();
        $form = $this->createForm('Service\ServiceBundle\Form\ImageTableType', $imageTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageTable);
            $em->flush($imageTable);

            return $this->redirectToRoute('imagetable_show', array('id' => $imageTable->getId()));
        }

        return $this->render('imagetable/new.html.twig', array(
            'imageTable' => $imageTable,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a imageTable entity.
     *
     * @Route("/{id}", name="imagetable_show")
     * @Method("GET")
     */
    public function showAction(ImageTable $imageTable)
    {
        $deleteForm = $this->createDeleteForm($imageTable);

        return $this->render('imagetable/show.html.twig', array(
            'imageTable' => $imageTable,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing imageTable entity.
     *
     * @Route("/{id}/edit", name="imagetable_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ImageTable $imageTable)
    {
        $deleteForm = $this->createDeleteForm($imageTable);
        $editForm = $this->createForm('Service\ServiceBundle\Form\ImageTableType', $imageTable);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imagetable_edit', array('id' => $imageTable->getId()));
        }

        return $this->render('imagetable/edit.html.twig', array(
            'imageTable' => $imageTable,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a imageTable entity.
     *
     * @Route("/{id}", name="imagetable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ImageTable $imageTable)
    {
        $form = $this->createDeleteForm($imageTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imageTable);
            $em->flush($imageTable);
        }

        return $this->redirectToRoute('imagetable_index');
    }

    /**
     * Creates a form to delete a imageTable entity.
     *
     * @param ImageTable $imageTable The imageTable entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImageTable $imageTable)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagetable_delete', array('id' => $imageTable->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
