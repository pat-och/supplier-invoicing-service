<?php declare(strict_types=1);

namespace App\Core;

use App\Core\Command\CreateInvoice;
use App\Entity\Invoice;

class CreateInvoiceHandler
{
    public function handle(CreateInvoice $command): Invoice
    {
        return new Invoice()->setUid($command->getId());
    }
}