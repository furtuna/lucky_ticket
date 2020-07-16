<?php

use PFC\Demo\LuckyTicket\LuckyTicketCalculator;
use PFC\Demo\LuckyTicket\LuckyTicketsProcessor;
use PFC\Demo\LuckyTicket\TicketsRangeTransfer;
use PFC\Demo\LuckyTicket\TicketsRangeValidator;

require __DIR__.'/vendor/autoload.php';

/** Create services. */
$ticketsRangeValidator = new TicketsRangeValidator();
$luckyTicketCalculator = new LuckyTicketCalculator();
$luckyTicketsProcessor = new LuckyTicketsProcessor(
    $ticketsRangeValidator,
    $luckyTicketCalculator
);

/** Process lucky tickets. */
$ticketsRangeTransfer = TicketsRangeTransfer::createFromArray($_GET);
$outputArray = $luckyTicketsProcessor->process($ticketsRangeTransfer);

/** Output. */
echo 'Rows count: ', count($outputArray), '<br>';
foreach ($outputArray as $outputString) {
    echo $outputString, '<br>';
}
