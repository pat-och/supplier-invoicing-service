<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class RedirectController extends AbstractController
{

    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {}

    #[Route('/', name: 'redirect')]
    public function index(): Response
    {
        return $this->redirect($this->urlGenerator->generate('townhall'));
    }
}
