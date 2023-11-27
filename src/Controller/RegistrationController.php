<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Usuarios;


/**
 * @Route("/api", name="api_")
 */

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register", methods={"POST"})
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {

        $em = $this->getDoctrine()->getManager();
        $decoded = json_decode($request->getContent());
        $username = $decoded->username;
        $password = $decoded->password;

        $user = new Usuarios();
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setUsername($username);
        $user->setRoles(["ROLE_ADMIN"]);
        $em->persist($user);
        $em->flush();

        return $this->json(['message' => 'Registered Successfully']);
    }
}
