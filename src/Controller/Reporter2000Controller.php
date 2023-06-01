<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class Reporter2000Controller extends AbstractController {

    /** 
     * @Route("/reporter2000", name="post_reporter2000")
     */
    public function postReporter2000(): Response{

        //stocker dans une variable ton inputPHP
        $var = readfile("php://input");

        //recuperer un objet SImpleXmlELement a partir du XMl que tu as recu
        $xml = simplexml_load_string($var);

        //instancier ton adaptter et lui passer son content

        //recuprer une instance de Vehicle, Report,Radar

        return new Response(
            $var,
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }


}