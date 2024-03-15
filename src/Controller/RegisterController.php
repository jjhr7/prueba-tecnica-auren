<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Security;

class RegisterController extends AbstractController
{
    private EntityManagerInterface $em;
    private UserPasswordHasherInterface $passwordHasher;

    /**
     * @param EntityManagerInterface $em
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher)
    {
        $this->em = $em;
        $this->passwordHasher = $passwordHasher;
    }


    #[Route('/register', name: 'app_register')]
    public function index(Request $request, Security $security): Response
    {
        if ($security->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('admin');
        }
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $userRepository = $this->em->getRepository(User::class);
                $existingUser = $userRepository->findOneBy(['email' => $user->getEmail()]);
                if ($existingUser) {
                    $form->get('email')->addError(new FormError("Este email ya está registrado."));
                } else {
                    $user->setRoles(['ROLE_ADMIN']);
                    $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
                    $user->setPassword($hashedPassword);
                    $this->em->persist($user);
                    $this->em->flush();

                    $this->addFlash('success', "Se ha registrado correctamente");
                    return $this->redirectToRoute('app_login');
                }
            }
        }

        return $this->render('register/index.html.twig',[
            'form' => $form->createView(),
            'currentPage'=>'register'
        ]);
    }

}
