<?php

class FlowerShopCostumer
{
    private ?string $gender;

    public function setGender(string $gender): void
    {
        if (strtolower($gender) === 'male' || strtolower($gender) === 'female') {
            $this->gender = $gender;
        } else {
            $this->gender = null;
        }
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }
}

