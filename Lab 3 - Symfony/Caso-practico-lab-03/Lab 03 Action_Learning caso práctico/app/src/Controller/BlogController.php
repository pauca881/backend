<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index(): Response
    {
        $posts = $this->entityManager->getRepository(Post::class)->findAll();
        return $this->render('blog/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    public function show($id): Response
    {
        $postId = (int)$id;
        $post = $this->entityManager->getRepository(Post::class)->find($postId);

        if (!$post) {
            throw $this->createNotFoundException('La publicación no se encontró');
        }
        return $this->render('blog/show.html.twig', ['post' => $post]);
    }

    public function create(Request $request, FormFactoryInterface $formFactory): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setUpdatedAt(new \DateTimeImmutable());
            $post->setCreatedAt(new \DateTimeImmutable());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            $this->addFlash('success', 'El post se ha creado correctamente.');

            return $this->redirectToRoute('blog_index');
        }

        return $this->render('blog/create.html.twig', ['form' => $form->createView()]);
    }
}
