<?php declare(strict_types=1);

namespace App\Entity;

use App\Entity\Trait\SurrogateId;
use App\Entity\Trait\Uuid;
use App\Repository\InvoiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    use SurrogateId;
    use Uuid;

    #[ORM\Column(type: Types::TEXT, unique: true)]
    private ?string $document = null;

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(string $document): static
    {
        $this->document = $document;

        return $this;
    }
}
