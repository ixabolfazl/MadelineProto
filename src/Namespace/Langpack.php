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

/**
 * This file is automatic generated by build_docs.php file
 * and is used only for autocomplete in multiple IDE
 * don't modify manually.
 */

namespace danog\MadelineProto\Namespace;

interface Langpack
{
    /**
     * Get localization pack strings.
     *
     * @param string $lang_pack Language pack name, usually obtained from a [language pack link](https://core.telegram.org/api/links#language-pack-links)
     * @param string $lang_code Language code
     * @return array{_: 'langPackDifference', lang_code: string, from_version: int, version: int, strings: list<array{_: 'langPackString', key: string, value: string}|array{_: 'langPackStringPluralized', key: string, zero_value: string, one_value: string, two_value: string, few_value: string, many_value: string, other_value: string}|array{_: 'langPackStringDeleted', key: string}>} @see https://docs.madelineproto.xyz/API_docs/types/LangPackDifference.html
     */
    public function getLangPack(string $lang_pack = '', string $lang_code = ''): array;

    /**
     * Get strings from a language pack.
     *
     * @param string $lang_pack Language pack name, usually obtained from a [language pack link](https://core.telegram.org/api/links#language-pack-links)
     * @param string $lang_code Language code
     * @param list<string>|array<never, never> $keys Strings to get
     * @return list<array{_: 'langPackString', key: string, value: string}|array{_: 'langPackStringPluralized', key: string, zero_value: string, one_value: string, two_value: string, few_value: string, many_value: string, other_value: string}|array{_: 'langPackStringDeleted', key: string}> Array of  @see https://docs.madelineproto.xyz/API_docs/types/LangPackString.html
     */
    public function getStrings(string $lang_pack = '', string $lang_code = '', array $keys = []): array;

    /**
     * Get new strings in language pack.
     *
     * @param string $lang_pack Language pack
     * @param string $lang_code Language code
     * @param int $from_version Previous localization pack version
     * @return array{_: 'langPackDifference', lang_code: string, from_version: int, version: int, strings: list<array{_: 'langPackString', key: string, value: string}|array{_: 'langPackStringPluralized', key: string, zero_value: string, one_value: string, two_value: string, few_value: string, many_value: string, other_value: string}|array{_: 'langPackStringDeleted', key: string}>} @see https://docs.madelineproto.xyz/API_docs/types/LangPackDifference.html
     */
    public function getDifference(string $lang_pack = '', string $lang_code = '', int $from_version = 0): array;

    /**
     * Get information about all languages in a localization pack.
     *
     * @param string $lang_pack Language pack
     * @return list<array{_: 'langPackLanguage', official: bool, rtl: bool, beta: bool, name: string, native_name: string, lang_code: string, base_lang_code: string, plural_code: string, strings_count: int, translated_count: int, translations_url: string}> Array of  @see https://docs.madelineproto.xyz/API_docs/types/LangPackLanguage.html
     */
    public function getLanguages(string $lang_pack = ''): array;

    /**
     * Get information about a language in a localization pack.
     *
     * @param string $lang_pack Language pack name, usually obtained from a [language pack link](https://core.telegram.org/api/links#language-pack-links)
     * @param string $lang_code Language code
     * @return array{_: 'langPackLanguage', official: bool, rtl: bool, beta: bool, name: string, native_name: string, lang_code: string, base_lang_code: string, plural_code: string, strings_count: int, translated_count: int, translations_url: string} @see https://docs.madelineproto.xyz/API_docs/types/LangPackLanguage.html
     */
    public function getLanguage(string $lang_pack = '', string $lang_code = ''): array;
}
