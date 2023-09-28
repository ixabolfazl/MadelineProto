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

namespace danog\MadelineProto\EventHandler;

use ReflectionClass;
use JsonSerializable;
use ReflectionProperty;
use danog\MadelineProto\MTProto;
use danog\MadelineProto\EventHandler\Media\DocumentPhoto;
use danog\MadelineProto\EventHandler\Wallpaper\WallpaperSettings;

/**
 * Represents a [wallpaper](https://core.telegram.org/api/wallpapers).
 */
final class Wallpaper implements JsonSerializable
{
    /** @var int Identifier */
    public readonly int $id;

    /** @var int Access hash */
    public readonly int $accessHash;

    /** @var bool Whether we created this wallpaper */
    public readonly bool $creator;

    /** @var bool Whether this is the default wallpaper */
    public readonly bool $default;

    /** @var bool Whether this is a [pattern wallpaper](https://core.telegram.org/api/wallpapers#pattern-wallpapers) */
    public readonly bool $pattern;

    /** @var bool Whether this wallpaper should be used in dark mode. */
    public readonly bool $dark;

    /** @var string Unique wallpaper ID, used when generating [wallpaper links](https://core.telegram.org/api/links#wallpaper-links) or [importing wallpaper links](https://core.telegram.org/api/wallpapers). */
    public readonly string $uniqueId;

    /** @var DocumentPhoto The actual wallpaper */
    public readonly DocumentPhoto $media;
    
    /** @var mixed Info on how to generate the wallpaper, according to [these instructions](https://core.telegram.org/api/wallpapers). */
    public readonly WallpaperSettings $settings;

    public function __construct(
        MTProto $API,
        array $rawWallpaper,
    ) {
        $this->id = $rawWallpaper['id'];
        $this->accessHash = $rawWallpaper['access_hash'];
        $this->creator = $rawWallpaper['creator'];
        $this->default = $rawWallpaper['default'];
        $this->pattern = $rawWallpaper['pattern'];
        $this->dark = $rawWallpaper['dark'];
        $this->uniqueId = $rawWallpaper['slug'];
        $this->media = $API->wrapMedia($rawWallpaper['document']);
        $this->settings = new WallpaperSettings($rawWallpaper['settings']);
    }

    /** @internal */
    public function jsonSerialize(): mixed
    {
        $res = ['_' => static::class];
        $refl = new ReflectionClass($this);
        foreach ($refl->getProperties(ReflectionProperty::IS_PUBLIC) as $prop) {
            $res[$prop->getName()] = $prop->getValue($this);
        }
        return $res;
    }
}
