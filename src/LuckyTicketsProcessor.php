<?php declare(strict_types=1);

namespace PFC\Demo\LuckyTicket;

class LuckyTicketsProcessor
{
    /**
     * @var TicketsRangeValidator
     */
    private $validator;

    /**
     * @var LuckyTicketCalculator
     */
    private $calculator;

    /**
     * @param TicketsRangeValidator $validator
     * @param LuckyTicketCalculator $calculator
     */
    public function __construct(
        TicketsRangeValidator $validator,
        LuckyTicketCalculator $calculator
    ) {
        $this->validator = $validator;
        $this->calculator = $calculator;
    }

    /**
     * Returns array of lucky tickets or array of errors. Simplified just for test task reasons.
     *
     * @param TicketsRangeTransfer $ticketsRangeTransfer
     *
     * @return array
     */
    public function process(TicketsRangeTransfer $ticketsRangeTransfer): array
    {
        $errors = $this->validator->validate($ticketsRangeTransfer);

        if (!empty($errors)) {
            return $errors;
        }

        $ticketsRange = TicketsRange::createFromTransfer($ticketsRangeTransfer);
        $luckyTicketsCount = 0;
        $ticketsRangeIterator = $ticketsRange->iterate();

        foreach ($ticketsRangeIterator as $ticketNumber) {
            if ($this->calculator->isLucky($ticketNumber)) {
                ++$luckyTicketsCount;
            }
        }

        return [sprintf('Lucky tickets count: %s', $luckyTicketsCount)];
    }
}
