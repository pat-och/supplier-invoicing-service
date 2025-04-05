<?php declare(strict_types=1);

namespace App\Core\Command;

use Symfony\Component\Uid\Uuid;

class CreateInvoice
{
    private function __construct(
        private readonly Uuid $id,
    ) {}

    public static function build(Uuid $id): self
    {
        return new self($id);
    }

    public function getId(): Uuid
    {
        return $this->id;
    }
}