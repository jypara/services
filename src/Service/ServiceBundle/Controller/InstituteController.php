<?php

namespace Service\ServiceBundle\Controller;

use Service\ServiceBundle\Entity\Institute;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Institute controller.
 *
 * @Route("institute")
 */
class InstituteController extends Controller
{
    /**
     * Lists all institute entities.
     *
     * @Route("/", name="institute_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $institutes = $em->getRepository('ServiceBundle:Institute')->findAll();

        return $this->render('institute/index.html.twig', array(
            'institutes' => $institutes,
        ));
    }

    /**
     * Creates a new institute entity.
     *
     * @Route("/new", name="institute_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $institute = new Institute();
        $form = $this->createForm('Service\ServiceBundle\Form\InstituteType', $institute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($institute);
            $em->flush($institute);

            return $this->redirectToRoute('institute_show', array('id' => $institute->getId()));
        }

        return $this->render('institute/new.html.twig', array(
            'institute' => $institute,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a institute entity.
     *
     * @Route("/{id}", name="institute_show")
     * @Method("GET")
     */
    public function showAction(Institute $institute)
    {
        $deleteForm = $this->createDeleteForm($institute);

        return $this->render('institute/show.html.twig', array(
            'institute' => $institute,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing institute entity.
     *
     * @Route("/{id}/edit", name="institute_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Institute $institute)
    {
        $deleteForm = $this->createDeleteForm($institute);
        $editForm = $this->createForm('Service\ServiceBundle\Form\InstituteType', $institute);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('institute_edit', array('id' => $institute->getId()));
        }

        return $this->render('institute/edit.html.twig', array(
            'institute' => $institute,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a institute entity.
     *
     * @Route("/{id}", name="institute_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Institute $institute)
    {
        $form = $this->createDeleteForm($institute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($institute);
            $em->flush($institute);
        }

        return $this->redirectToRoute('institute_index');
    }

    /**
     * Creates a form to delete a institute entity.
     *
     * @param Institute $institute The institute entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Institute $institute)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('institute_delete', array('id' => $institute->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
