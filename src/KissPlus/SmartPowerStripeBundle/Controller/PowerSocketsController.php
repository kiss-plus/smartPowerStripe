<?php

namespace KissPlus\SmartPowerStripeBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use KissPlus\SmartPowerStripeBundle\Entity\PowerSocket;
use KissPlus\SmartPowerStripeBundle\Form\PowerSocketType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class PowerSocketsController extends FOSRestController
{
    /**
     * @View
     * @ApiDoc()
     */
    public function getSocketsAction()
    {
        return $this->getDoctrine()->getRepository(PowerSocket::class)->findAll();
    }

    /**
     * @View(statusCode=204)
     * @ApiDoc(
     *     input = "KissPlus\SmartPowerStripeBundle\Form\PowerSocketType"
     * )
     */
    public function postSocketsAction(Request $request)
    {
        $form = $this->processPostRequest($request);
        if ($form->isValid()) {
            $this->persistPowerSocket($form->getData());
        }
        return $form;
    }

    /**
     * @View(statusCode=204)
     * @ApiDoc(
     *     input = "KissPlus\SmartPowerStripeBundle\Form\PowerSocketType"
     * )
     */
    public function patchSocketAction(PowerSocket $socket, Request $request)
    {
        $form = $this->createForm(PowerSocketType::class, $socket);
        $form->submit($request->request->all(), false);
        if ($form->isValid()) {
            $this->persistPowerSocket($socket);
        }
        return $form;
    }

    /**
     * @View(statusCode=204)
     * @ApiDoc()
     */
    public function deleteSocketAction(PowerSocket $socket)
    {
        $objectManager = $this->getDoctrine()->getManager();
        $objectManager->remove($socket);
        $objectManager->flush();
    }

    private function persistPowerSocket(PowerSocket $socket)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($socket);
        $em->flush();
    }

    private function processPostRequest(Request $request): Form
    {
        $form = $this->createForm(PowerSocketType::class, new PowerSocket());
        $form->submit($request->request->all());
        return $form;
    }
}
