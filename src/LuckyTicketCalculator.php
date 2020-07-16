<?php declare(strict_types=1);

namespace PFC\Demo\LuckyTicket;

class LuckyTicketCalculator
{
    /**
     * @param int $ticketNumber
     *
     * @return bool
     */
    public function isLucky(int $ticketNumber): bool
    {
        $ticketString = str_pad((string) $ticketNumber, 6, '0', STR_PAD_LEFT);

        $firstPart = substr($ticketString, 0, 3);
        $secondPart = substr($ticketString, 3, 3);

        $firstPartReduced = $this->reducePartRecursive($firstPart);
        $secondPartReduced = $this->reducePartRecursive($secondPart);

        return $firstPartReduced === $secondPartReduced;
    }

    /**
     * @param string $part
     *
     * @return int
     */
    private function reducePartRecursive(string $part): int
    {
        if (strlen($part) === 1) {
            return (int) $part;
        }

        $partArray = str_split($part);
        $reduced = (string) array_sum($partArray);

        return $this->reducePartRecursive($reduced);
    }
}
