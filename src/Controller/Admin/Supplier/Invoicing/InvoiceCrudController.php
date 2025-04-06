<?php declare(strict_types=1);

namespace App\Controller\Admin\Supplier\Invoicing;

use App\Core\Command\CreateInvoice;
use App\Core\CreateInvoiceHandler;
use App\Entity\Invoice;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints\File;

class InvoiceCrudController extends AbstractCrudController
{
    public function __construct(
        private readonly CreateInvoiceHandler $createInvoice,
    ) {}

    public static function getEntityFqcn(): string
    {
        return Invoice::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $filePath = '/var/uploads/supplier-invoices/';

        yield TextField::new('uid')
            ->setFormTypeOption('disabled', true)
            ->hideOnIndex()
            ->hideOnForm()
            ->hideOnDetail()
        ;

        yield ImageField::new('document', 'document')
            ->hideOnIndex()
            ->hideOnDetail()
            ->setBasePath($filePath)
            ->setUploadDir($filePath)
            ->setFileConstraints(new File([
                    'mimeTypes' => [
                        'application/pdf',
                        'application/x-pdf',
                        ],
                    'mimeTypesMessage' => 'Document non valide, seuls les documents PDF sont autorisés.',
                ])
            );
    }

    public function createEntity(string $entityFqcn): Invoice
    {
        $createInvoice = CreateInvoice::build(Uuid::v4());

        return $this->createInvoice->handle($createInvoice);
    }
}
