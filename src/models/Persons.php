<?php
namespace Azelea\Core;

class Persons {
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $address;
    private string $city;

    public function getId(): int {
        return $this->id;
    }

    public function setLastname($lastname): static {
        $this->lastname = $lastname;
        return $this;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function setFirstname($firstname): static {
        $this->firstname = $firstname;
        return $this;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function setAddress($address): static {
        $this->address = $address;
        return $this;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setCity($city): static {
        $this->city = $city;
        return $this;
    }

    public function getCity(): string {
        return $this->city;
    }
}