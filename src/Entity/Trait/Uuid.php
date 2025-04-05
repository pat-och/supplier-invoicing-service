<?php declare(strict_types=1);

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;
trait Uuid
{
    #[ORM\Column(type: 'uuid')]
    private ?\Symfony\Component\Uid\Uuid $uid = null;

    public function getUid(): ?\Symfony\Component\Uid\Uuid
    {
        return $this->uid;
    }

    public function setUid(\Symfony\Component\Uid\Uuid $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}