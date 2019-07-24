<?php

declare(strict_types=1);

namespace Sylius\ShopApiPlugin\Command\Cart;

class CompleteOrder
{
    /** @var string */
    protected $orderToken;

    /** @var string|null */
    protected $notes;

    public function __construct(string $orderToken, ?string $notes = null)
    {
        $this->orderToken = $orderToken;
        $this->notes = $notes;
    }

    public function orderToken(): string
    {
        return $this->orderToken;
    }

    public function notes(): ?string
    {
        return $this->notes;
    }
}
