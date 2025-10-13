<?php

namespace App\Enums;

enum ApprovalStatus: int
{
    case PENDING = 0;
    case APPROVED = 1;
    case REJECTED = 2;

    public function label(): string {
        return ucfirst(strtolower($this->name));
    }
}
