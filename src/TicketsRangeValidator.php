<?php declare(strict_types=1);

namespace PFC\Demo\LuckyTicket;

class TicketsRangeValidator
{
    /**
     * @param TicketsRangeTransfer $ticketsRangeTransfer
     *
     * @return array
     */
    public function validate(TicketsRangeTransfer $ticketsRangeTransfer): array
    {
        $errors = [];
        $start = $ticketsRangeTransfer->startValue();
        $end = $ticketsRangeTransfer->endValue();

        if ($start < 1 || $start > 999999) {
            $errors[] = 'Parameter "start" must be in range (1,999999)';
        }

        if ($end < 1 || $end > 999999) {
            $errors[] = sprintf('Parameter "end" must be in range (1,999999)');
        }

        if (!empty($errors)) {
            return $errors;
        }

        if ($start > $end) {
            $errors[] = 'Parameter "end" must be greater or equal "start"';
        }

        return $errors;
    }
}
