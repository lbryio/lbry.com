<?php


class ChainQuery
{
    protected static $pdo = null;

    public static function getInstance()
    {
        if (!static::$pdo) {
            static::$pdo = new PDO(Config::get(Config::CHAINQUERY_DSN),
                Config::get(Config::CHAINQUERY_USERNAME), Config::get(Config::CHAINQUERY_PASSWORD));
        }
        return static::$pdo;
    }

    public static function findChannelClaim($claimName)
    {
        $claimName = '@' . trim($claimName, '@');
        $stmt = static::getInstance()->prepare("SELECT * FROM claim c WHERE c.name = ? AND c.bid_state = ?");
        $stmt->execute([$claimName, "controlling"]);
        return $stmt->fetch();
    }

    public static function countClaimsInChannel($claimId)
    {
        $stmt = static::getInstance()->prepare("SELECT COUNT(*) FROM claim c WHERE c.publisher_id = ?");
        $stmt->execute([$claimId]);
        $result = $stmt->fetch();
        return $result[0] ?? 0;
    }
}
