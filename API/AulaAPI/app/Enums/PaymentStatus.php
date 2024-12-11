<?php

namespace App\Enums;

class PaymentStatus
{
    const PENDING = 'pending';
    const PROGRESSING = 'progressing';
    const COMPLETED = 'completed';
    const CANCELLED = 'cancelled';
}