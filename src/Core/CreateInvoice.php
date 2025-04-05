<?php declare(strict_types=1);

namespace App\Core;

use App\Entity\Invoice;
use Symfony\Component\Uid\Uuid;

class CreateInvoice
{

    public function handle(): Invoice
    {
        return new Invoice()->setUid(Uuid::v4());
    }
}