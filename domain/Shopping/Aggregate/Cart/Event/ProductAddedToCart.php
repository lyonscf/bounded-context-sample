<?php namespace Domain\Shopping\Aggregate\Cart\Event;

use BoundedContext\Contracts\Event\Event;
use BoundedContext\Contracts\ValueObject\Identifier;
use BoundedContext\Event\AbstractEvent;
use Domain\Shopping\Aggregate\Cart\Entity\Product;

class ProductAddedToCart extends AbstractEvent implements Event
{
    public $product;

    public function __construct(Identifier $id, Product $product)
    {
        parent::__construct($id);

        $this->product = $product;
    }
}
