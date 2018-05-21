<?php
/* HOW TO USE

$lockFile = Lock::getLock('lock-name');
if (is_resource($lockFile)) {

  // you have a lock here, do whatever you want

  Lock::freeLock($lockFile);
}
else {
  // you could not get the lock. show a message or throw an exception or whatever
}
*/


class Lock
{
    /**
     * Creates a lockfile and acquires an exclusive lock on it.
     *
     * @param string $name The name of the lockfile.
     * @param boolean $blocking Block until lock becomes available (default: don't block, just fail)
     * @return mixed Returns the lockfile, or FALSE if a lock could not be acquired.
     */
    public static function getLock($name, $blocking = false)
    {
        if (!preg_match('/^[A-Za-z0-9\.\-_]+$/', $name)) {
            throw new InvalidArgumentException('Invalid lock name: "' . $name . '"');
        }

        $filename = static::getLockDir() . '/' . $name;
        if (!preg_match('/\.lo?ck$/', $filename)) {
            $filename .= '.lck';
        }
        if (!file_exists($filename)) {
            file_put_contents($filename, '');
            chmod($filename, 0666); // if the file cant be opened for writing later, getting the lock will fail
        }
        $lockFile = fopen($filename, 'w+');
        if (!flock($lockFile, $blocking ? LOCK_EX : LOCK_EX|LOCK_NB)) {
            fclose($lockFile);
            return false;
        }
        return $lockFile;
    }

    /**
     * Free a lock.
     *
     * @param resource $lockFile
     */
    public static function freeLock($lockFile)
    {
        if ($lockFile) {
            flock($lockFile, LOCK_UN);
            fclose($lockFile);
        }
    }

    public static function getLockDir()
    {
        return sys_get_temp_dir();
    }
}
