<?php

namespace Domain\model;

class Decideur extends Utilisateur
{
    public function getUserType(): string
    {
        return "DECIDEUR";
    }
}