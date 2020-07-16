<?php declare(strict_types=1);

namespace PFC\Demo\LuckyTicket;

class TicketsRangeTransfer
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
     * @return int
     */
    public function startValue(): int
    {
        return $this->start;
    }

    /**
     * @return int
     */
    public function endValue(): int
    {
        return $this->end;
    }

    /**
     * @param array $params
     *
     * @return static
     */
    public static function createFromArray(array $params): self
    {
        if (!isset($params['first']) || !isset($params['end'])) {
            throw new \OutOfBoundsException('Not enough arguments: "first", "end" keys must be present.');
        }

        $start = (int) $params['first'];
        $end = (int) $params['end'];

        return new self($start, $end);
    }
}
