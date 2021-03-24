<?php

namespace Laravel\Octane;

use Stringable;

class Stream
{
    /**
     * Stream the given error message to stderr.
     *
     * @param  \Stringable  $error
     * @return void
     */
    public static function error(Stringable $message)
    {
        fwrite(STDERR, (string) str_replace("\n", ' ', $message)."\n");
    }

    /**
     * Stream the given request information to stdout.
     *
     * @param  string  $method
     * @param  string  $url
     * @param  int  $statusCode
     * @param  float  $duration
     * @return void
     */
    public static function request(string $method, string $url, int $statusCode, float $duration)
    {
        fwrite(STDOUT, json_encode([
            'method' => $method,
            'url' => $url,
            'statusCode' => $statusCode,
            'duration' => $duration,
        ])."\n");
    }
}
