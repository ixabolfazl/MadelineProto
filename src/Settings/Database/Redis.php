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

/**
 * Redis backend settings.
 */
final class Redis extends DriverDatabaseAbstract
{
    /**
     * Database number.
     */
    protected int $database = 0;
    /**
     * Database URI.
     */
    protected string $uri = 'redis://127.0.0.1';

    public function mergeArray(array $settings): void
    {
        $settings = $settings['db']['redis'] ?? [];
        if (isset($settings['host'])) {
            $this->setUri($settings['host'].(isset($settings['port']) ? ':'.($settings['port']) : ''));
        }
        parent::mergeArray($settings);
    }

    /**
     * Get database number.
     */
    public function getDatabase(): int
    {
        return $this->database;
    }

    /**
     * Set database number.
     *
     * @param int $database Database number.
     */
    public function setDatabase(int $database): self
    {
        $this->database = $database;

        return $this;
    }

    /**
     * Get database URI.
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Set database URI.
     *
     * @param string $uri Database URI.
     */
    public function setUri(string $uri): static
    {
        $this->uri = $uri;

        return $this;
    }
}
