<?php declare(strict_types=1);

namespace App\Controller\Admin\Supplier\Invoicing;

use App\Core\Command\CreateInvoice;
use App\Core\CreateInvoiceHandler;
use App\Entity\Invoice;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Uid\Uuid;

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
        yield TextField::new('uid')
            ->setFormTypeOption('disabled', true)
            ->hideOnIndex()
            ->hideOnForm()
            ->hideOnDetail()
        ;

        yield ImageField::new('file')
            ->setBasePath('uploads\supplier-invoices') // base URL for displaying the file
            ->setUploadDir('uploads\supplier-invoices') // directory where files are uploaded
//            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]') // optional but recommended
        ;
    }

    public function createEntity(string $entityFqcn): Invoice
    {
        $createInvoice = CreateInvoice::build(Uuid::v4());

        return $this->createInvoice->handle($createInvoice);
    }
}
