<?php

namespace App\Model;

class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private string $class,
        private string $captain,
        private ProductStatusEnum $status,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function getCaptain(): string
    {
        return $this->captain;
    }

    public function getStatus(): ProductStatusEnum
    {
        return $this->status;
    }

    public function getStatusString(): string
    {
        return $this->status->value;
    }

    public function getStatusImageFilename(): string
    {
        return match ($this->status) {
            ProductStatusEnum::WAITING => 'images/status-waiting.png',
            ProductStatusEnum::IN_PROGRESS => 'images/status-in-progress.png',
            ProductStatusEnum::COMPLETED => 'images/status-complete.png',
        };
    }
}