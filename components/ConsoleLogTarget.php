<?php

namespace app\components;

use yii\log\Target;

/**
 * Log route for echoing log entries to the console.
 */
class ConsoleLogTarget extends Target
{
    public function export()
    {
        $messages = array_map([$this, 'formatMessage'], $this->messages);
        $body = implode("\n", $messages);
        echo $body . "\n";
    }
}
