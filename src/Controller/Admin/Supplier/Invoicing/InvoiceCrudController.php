<?php

namespace App\Controller\Admin\Supplier\Invoicing;

use App\Entity\Invoice;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Uid\Uuid;

class InvoiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Invoice::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('uid')
            ->setFormTypeOption('disabled', true)
            ->hideOnForm(); // optionally hide on forms if it's auto-generated
    }

    public function createEntity(string $entityFqcn): Invoice
    {
        return new Invoice()->setUid(Uuid::v4());
    }
}
