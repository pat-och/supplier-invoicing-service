<?php declare(strict_types=1);

namespace App\Entity;

use App\Entity\Trait\SurrogateId;
use App\Entity\Trait\Uuid;
use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    use SurrogateId;
    use Uuid;
}
