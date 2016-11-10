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

        return $this->render('MovemberBundle:movember:index.html.twig', array(
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

        return $this->render('MovemberBundle:movember:new.html.twig', array(
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

        return $this->render('MovemberBundle:movember:show.html.twig', array(
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

        return $this->render('MovemberBundle:movember:edit.html.twig', array(
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

    public function geocodAction()
    {
        // url encode the address
        $address = urlencode(28000);

        // google map geocode api url
        $url = "http://maps.google.com/maps/api/geocode/json?address={28000}";

        // get the json response
        $resp_json = file_get_contents($url);

        // decode the json
        $resp = json_decode($resp_json, true);
        var_dump($resp);
        // response status will be 'OK', if able to geocode given address
        if($resp['status']=='OK'){

            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $formatted_address = $resp['results'][0]['formatted_address'];

            echo $lati;
            echo $longi;

            // verify if data is complete
            if($lati && $longi && $formatted_address){

                // put the data in the array
                $data_arr = array();

                array_push(
                    $data_arr,
                    $lati,
                    $longi,
                    $formatted_address
                );

                return $data_arr;

            }else{
                return false;
            }

        }else{
            return false;
            
        }
    }
}
