<?php declare(strict_types=1);

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/townhall', routeName: 'townhall')]
class TownhallController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/townhall.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Townhall');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Townhall', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        // Supplier Invoicing Service
    }
}
