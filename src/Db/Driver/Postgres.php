<?php declare(strict_types=1);

/**
 * This file is part of MadelineProto.
 * MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU General Public License along with MadelineProto.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Daniil Gentili <daniil@daniil.it>
 * @copyright 2016-2023 Daniil Gentili <daniil@daniil.it>
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
 * @link https://docs.madelineproto.xyz MadelineProto documentation
 */

namespace danog\MadelineProto\Db\Driver;

use Amp\Postgres\PostgresConfig;
use Amp\Postgres\PostgresConnectionPool;
use danog\MadelineProto\Logger;
use danog\MadelineProto\Settings\Database\Postgres as DatabasePostgres;
use Throwable;

/**
 * Postgres driver wrapper.
 *
 * @internal
 */
final class Postgres
{
    /** @var array<PostgresConnectionPool> */
    private static array $connections = [];

    public static function getConnection(DatabasePostgres $settings): PostgresConnectionPool
    {
        $dbKey = $settings->getKey();
        if (empty(static::$connections[$dbKey])) {
            $config = PostgresConfig::fromString('host='.\str_replace('tcp://', '', $settings->getUri()))
                ->withUser($settings->getUsername())
                ->withPassword($settings->getPassword())
                ->withDatabase($settings->getDatabase());

            static::createDb($config);
            static::$connections[$dbKey] = new PostgresConnectionPool($config, $settings->getMaxConnections(), $settings->getIdleTimeout());
        }

        return static::$connections[$dbKey];
    }

    private static function createDb(PostgresConfig $config): void
    {
        try {
            $db = $config->getDatabase();
            $user = $config->getUser();
            $connection =  new PostgresConnectionPool($config->withDatabase(null));

            $result = $connection->query("SELECT * FROM pg_database WHERE datname = '{$db}'");

            // Replace with getRowCount once it gets fixed
            if (!\iterator_to_array($result)) {
                $connection->query("
                    CREATE DATABASE {$db}
                    OWNER {$user}
                    ENCODING utf8
                ");
            }
            $connection->close();
        } catch (Throwable $e) {
            Logger::log($e->getMessage(), Logger::ERROR);
        }
    }
}
