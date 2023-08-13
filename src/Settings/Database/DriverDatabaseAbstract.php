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

namespace danog\MadelineProto\Settings\Database;

use danog\MadelineProto\Settings\DatabaseAbstract;

/**
 * Base class for database backends.
 */
abstract class DriverDatabaseAbstract extends DatabaseAbstract
{
    /**
     * For how long to keep records in memory after last read, for cached backends.
     */
    protected int $cacheTtl = 5 * 60;
    /**
     * Database password.
     */
    protected string $password = '';

    /**
     * Which serializer to use by default.
     *
     * If null, the best serializater is chosen.
     */
    protected ?SerializerType $serializer = null;

    public function mergeArray(array $settings): void
    {
        foreach (self::toCamel([
            'database',
            'password',
            'cache_ttl',
        ]) as $object => $array) {
            if (isset($settings[$array])) {
                $this->{$object}($settings[$array]);
            }
        }
    }

    /**
     * Get DB key.
     */
    public function getKey(): string
    {
        $uri = \parse_url($this->getUri());
        $host = $uri['host'] ?? '';
        $port = $uri['port'] ?? '';
        return "$host:$port:".$this->getDatabase();
    }

    /**
     * Get for how long to keep records in memory after last read, for cached backends.
     */
    public function getCacheTtl(): int
    {
        return $this->cacheTtl;
    }

    /**
     * Set for how long to keep records in memory after last read, for cached backends.
     *
     * The cache TTL identifier can be a string like '+5 minutes'.
     * When data is retrieved from a database it is stored in memory.
     * This helps to reduce latency, improve speed and reduce mysql/postgres/redis load.
     * Data will be removed from the cache if last access was more than this amount of time.
     * Clean up is done once per minute.
     *
     * @param int|string $cacheTtl For how long to keep records in memory after last read, for cached backends.
     */
    public function setCacheTtl(int|string $cacheTtl): static
    {
        $this->cacheTtl = \is_int($cacheTtl) ? $cacheTtl : \strtotime($cacheTtl) - \time();

        return $this;
    }

    /**
     * Get password.
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set password.
     *
     * @param string $password Password.
     */
    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get database name/ID.
     *
     */
    abstract public function getDatabase(): string|int;
    /**
     * Get database URI.
     */
    abstract public function getUri(): string;

    /**
     * Set database URI.
     */
    abstract public function setUri(string $uri): static;

    public function getSerializer(): ?SerializerType
    {
        return $this->serializer;
    }

    /**
     * Which serializer to use by default.
     *
     * If null, the best serializer is chosen.
     */
    public function setSerializer(?SerializerType $serializer): static
    {
        $this->serializer = $serializer;
        return $this;
    }
}
