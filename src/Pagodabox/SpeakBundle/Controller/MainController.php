<?php

namespace Pagodabox\SpeakBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Pagodabox\SpeakBundle\Entity\Content;
use Pagodabox\SpeakBundle\Form\MessageType;

class MainController extends Controller
{

    public function indexAction()
    {
        $content = new Content();
        $request = $this->get('request');

        $form = $this->get('form.factory')->create(new MessageType());
        $form->setData($content);
        $em = $this->get('doctrine')->getEntityManager();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                $em->persist($content);
                $em->flush();
                
                $url = $this->get('router')->generate('homepage');
                return new RedirectResponse($url);
            }
        }

        $messages = $em->getRepository('Pagodabox\SpeakBundle\Entity\Content')->findAll();
         arsort( $messages);
 
        return $this->render('PagodaboxSpeakBundle:Main:index.html.twig', array('messages' => $messages,
                    'form' => $form->createView()));
    }

}
