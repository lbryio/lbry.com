<?php

class Debug
{
    public static function exceptionToString(Throwable $e)
    {
        return static::getExceptionMessageWithoutTrace($e) . "\n" . static::getFullTrace($e);
    }

    public static function getExceptionMessageWithoutTrace(Throwable $e)
    {
        return 'exception \'' . get_class($e) . '\' with message \'' . $e->getMessage() . '\' in ' . $e->getFile() . ':' . $e->getLine();
    }

    /**
     * Same as the normal getTraceAsString(), but does not truncate long lines.
     * @param Throwable $exception
     * @return string
     * @see http://stackoverflow.com/questions/1949345/how-can-i-get-the-full-string-of-phps-gettraceasstring/6076667#6076667
     * @see https://gist.github.com/1437966
     */
    public static function getFullTrace(Throwable $exception)
    {
        $rtn = '';
        foreach ($exception->getTrace() as $count => $frame) {
            $args = isset($frame['args']) ? static::exceptionFrameArgsToString($frame['args']) : '';

            $rtn .= sprintf(
          "#%s %s(%s): %s(%s)\n",
                      $count,
                      $frame['file'] ?? 'unknown file',
                      $frame['line'] ?? 'unknown line',
                      isset($frame['class']) ? $frame['class'].$frame['type'].$frame['function'] : $frame['function'],
                      $args
      );
        }
        return $rtn;
    }

    public static function exceptionFrameArgsToString(array $args)
    {
        $ret = [];
        foreach ($args as $arg) {
            if (is_string($arg)) {
                $ret[] = "'" . $arg . "'";
            } elseif (is_array($arg)) {
                $ret[] = 'Array(' . count($arg) . ')';
            } elseif (is_null($arg)) {
                $ret[] = 'NULL';
            } elseif (is_bool($arg)) {
                $ret[] = ($arg) ? 'true' : 'false';
            } elseif (is_object($arg)) {
                $ret[] = get_class($arg) . (!($arg instanceof Closure) && isset($arg->id) ? "({$arg->id})" : '');
            } elseif (is_resource($arg)) {
                $ret[] = get_resource_type($arg);
            } else {
                $ret[] = $arg;
            }
        }
        return join(', ', $ret);
    }
}
