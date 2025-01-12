<?php

namespace App\Service;

use DateTimeImmutable;

class Countdown
{
    private ?DateTimeImmutable $endDate = null;
    public function __construct(?string $endDate) {
        if($endDate) {
            $this->endDate = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $endDate);
        }
    }

    public function calculateCountdown(DateTimeImmutable $endDate = null): array
    {
        $now = new DateTimeImmutable();
        $endDate = $this->endDate ?? $endDate;
        if ($endDate <= $now) {
            return ['status' => 'expired', 'days' => 0, 'hours' => 0, 'minutes' => 0];
        }

        $interval = $now->diff($endDate);

        $days = $interval->days;
        $hours = $interval->h;
        $minutes = $interval->i;

        if ($days >= 1) {
            return ['status' => 'days', 'days' => $days];
        }

        if ($hours > 0) {
            return ['status' => 'hours', 'hours' => $hours];
        }

        return ['status' => 'minutes', 'minutes' => $minutes];
    }
}
