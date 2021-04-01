<?php

use Swoole\Table;

if ($serverState['octaneConfig']['max_execution_time'] ?? false) {
    $timerTable = new Table(1000);

    $timerTable->column('worker_pid', Table::TYPE_INT, 1000);
    $timerTable->column('time', Table::TYPE_INT, 1000);

    $timerTable->create();

    return $timerTable;
}

return null;
