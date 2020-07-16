<?php

namespace PFC\Demo\LuckyTicket;

class TicketsRange
{
    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $end;

    /**
     * @param int $start
     * @param int $end
     */
    public function __construct(int $start, int $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return \Iterator
     */
    public function iterate(): \Iterator
    {
        $current = $this->start;
        while ($current <= $this->end) {
            yield $current;

            ++$current;
        }
    }

    /**
     * @param TicketsRangeTransfer $ticketsRangeTransfer
     *
     * @return static
     */
    public static function createFromTransfer(TicketsRangeTransfer $ticketsRangeTransfer): self
    {
        return new self($ticketsRangeTransfer->startValue(), $ticketsRangeTransfer->endValue());
    }
}
