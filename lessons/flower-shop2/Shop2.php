<?php
class Shop2
{
    private array $suppliers = [];

    public function addSupplier(Supplier $supplier): void
    {
        $this->suppliers[] = $supplier;
    }

    public function products(): ProductCollection2
    {
        $products = new ProductCollection2();

        foreach ($this->suppliers as $supplier)
        {
            $supplierProducts = $supplier->products()->all();

            foreach ($supplierProducts as $barCode => ['product' => $product, 'amount' => $amount])
            {
                $products->add(
                    new Product2(
                        $product->sellable(),
                        $product->price() + ($product->price() * 0.2)
                    ),
                    $amount
                );
            }
        }

        return $products;
    }

}