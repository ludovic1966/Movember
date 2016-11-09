<?php

namespace MovemberBundle\Controller;

use MovemberBundle\Entity\Movember;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Movember controller.
 *
 */
class MovemberController extends Controller
{
    /**
     * Lists all movember entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $movembers = $em->getRepository('MovemberBundle:Movember')->findAll();

        return $this->render('movember/index.html.twig', array(
            'movembers' => $movembers,
        ));
    }

    /**
     * Creates a new movember entity.
     *
     */
    public function newAction(Request $request)
    {
        $movember = new Movember();
        $form = $this->createForm('MovemberBundle\Form\MovemberType', $movember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($movember);
            $em->flush($movember);

            return $this->redirectToRoute('movember_show', array('id' => $movember->getId()));
        }

        return $this->render('movember/new.html.twig', array(
            'movember' => $movember,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a movember entity.
     *
     */
    public function showAction(Movember $movember)
    {
        $deleteForm = $this->createDeleteForm($movember);

        return $this->render('movember/show.html.twig', array(
            'movember' => $movember,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing movember entity.
     *
     */
    public function editAction(Request $request, Movember $movember)
    {
        $deleteForm = $this->createDeleteForm($movember);
        $editForm = $this->createForm('MovemberBundle\Form\MovemberType', $movember);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('movember_edit', array('id' => $movember->getId()));
        }

        return $this->render('movember/edit.html.twig', array(
            'movember' => $movember,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a movember entity.
     *
     */
    public function deleteAction(Request $request, Movember $movember)
    {
        $form = $this->createDeleteForm($movember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($movember);
            $em->flush($movember);
        }

        return $this->redirectToRoute('movember_index');
    }

    /**
     * Creates a form to delete a movember entity.
     *
     * @param Movember $movember The movember entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Movember $movember)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('movember_delete', array('id' => $movember->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
