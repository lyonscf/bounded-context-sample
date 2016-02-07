<?php namespace Domain\Shopping\Aggregate\Cart;

use BoundedContext\Contracts\Projection\Projection as ProjectionContract;
use BoundedContext\Contracts\Projection\Queryable as QueryableContract;
use BoundedContext\Index\Index;
use BoundedContext\Contracts\ValueObject\Identifier;
use BoundedContext\Sourced\Aggregate\State\AbstractProjection;
use BoundedContext\ValueObject\Boolean;

use Domain\Shopping\Entity\Cart;
use Domain\Shopping\Entity\Product;

class Projection extends AbstractProjection implements ProjectionContract, QueryableContract
{
    /**
     * @var  \BoundedContext\ValueObject\Boolean
     * @as is_created
     */
    public $is_created;

    /**
     * @var \BoundedContext\ValueObject\Boolean
     * @as is_checked_out
     */
    public $is_checked_out;

    /**
     * @var \Domain\Shopping\Entity\Cart
     * @as cart
     */
    public $cart;

    /**
     * @var \BoundedContext\Index\Index
     *
     * @collection
     * @of \Domain\Shopping\Entity\Product
     * @as products
     */
    public $products;

    public function create(Cart $cart)
    {
        $this->is_created = new Boolean(true);
        $this->cart = $cart;
        $this->products = new Index();
    }

    public function add_product(Product $product)
    {
        $this->products->add($product);
    }

    public function change_product_quantity(Product $product)
    {
        $this->products->replace($product);
    }

    public function remove_product(Identifier $product_id)
    {
        $this->products->remove($product_id);
    }

    public function checkout()
    {
        $this->is_checked_out = new Boolean(true);
    }
}
