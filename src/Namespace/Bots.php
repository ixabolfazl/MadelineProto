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

interface Bots
{
    /**
     * Sends a custom request; for bots only.
     *
     * @param mixed $params Any JSON-encodable data
     * @param string $custom_method The method name
     * @return mixed Any JSON-encodable data
     */
    public function sendCustomRequest(mixed $params, string $custom_method = ''): mixed;

    /**
     * Answers a custom query; for bots only.
     *
     * @param mixed $data Any JSON-encodable data
     * @param int $query_id Identifier of a custom query
     */
    public function answerWebhookJSONQuery(mixed $data, int $query_id = 0): bool;

    /**
     * Set bot command list.
     *
     * @param array{_: 'botCommandScopeDefault'}|array{_: 'botCommandScopeUsers'}|array{_: 'botCommandScopeChats'}|array{_: 'botCommandScopeChatAdmins'}|array{_: 'botCommandScopePeer', peer: array|int|string}|array{_: 'botCommandScopePeerAdmins', peer: array|int|string}|array{_: 'botCommandScopePeerUser', peer: array|int|string, user_id: array|int|string} $scope Command scope @see https://docs.madelineproto.xyz/API_docs/types/BotCommandScope.html
     * @param string $lang_code Language code
     * @param list<array{_: 'botCommand', command?: string, description?: string}>|array<never, never> $commands Array of Bot commands @see https://docs.madelineproto.xyz/API_docs/types/BotCommand.html
     */
    public function setBotCommands(array $scope, string $lang_code = '', array $commands = []): bool;

    /**
     * Clear bot commands for the specified bot scope and language code.
     *
     * @param array{_: 'botCommandScopeDefault'}|array{_: 'botCommandScopeUsers'}|array{_: 'botCommandScopeChats'}|array{_: 'botCommandScopeChatAdmins'}|array{_: 'botCommandScopePeer', peer: array|int|string}|array{_: 'botCommandScopePeerAdmins', peer: array|int|string}|array{_: 'botCommandScopePeerUser', peer: array|int|string, user_id: array|int|string} $scope Command scope @see https://docs.madelineproto.xyz/API_docs/types/BotCommandScope.html
     * @param string $lang_code Language code
     */
    public function resetBotCommands(array $scope, string $lang_code = ''): bool;

    /**
     * Obtain a list of bot commands for the specified bot scope and language code.
     *
     * @param array{_: 'botCommandScopeDefault'}|array{_: 'botCommandScopeUsers'}|array{_: 'botCommandScopeChats'}|array{_: 'botCommandScopeChatAdmins'}|array{_: 'botCommandScopePeer', peer: array|int|string}|array{_: 'botCommandScopePeerAdmins', peer: array|int|string}|array{_: 'botCommandScopePeerUser', peer: array|int|string, user_id: array|int|string} $scope Command scope @see https://docs.madelineproto.xyz/API_docs/types/BotCommandScope.html
     * @param string $lang_code Language code
     * @return list<array{_: 'botCommand', command: string, description: string}> Array of  @see https://docs.madelineproto.xyz/API_docs/types/BotCommand.html
     */
    public function getBotCommands(array $scope, string $lang_code = ''): array;

    /**
     * Sets the [menu button action »](https://core.telegram.org/api/bots/menu) for a given user or for all users.
     *
     * @param array|int|string $user_id User ID @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @param array{_: 'botMenuButtonDefault'}|array{_: 'botMenuButtonCommands'}|array{_: 'botMenuButton', text?: string, url?: string} $button Bot menu button action @see https://docs.madelineproto.xyz/API_docs/types/BotMenuButton.html
     */
    public function setBotMenuButton(array|int|string $user_id, array $button): bool;

    /**
     * Gets the menu button action for a given user or for all users, previously set using [bots.setBotMenuButton](https://docs.madelineproto.xyz/API_docs/methods/bots.setBotMenuButton.html); users can see this information in the [botInfo](https://docs.madelineproto.xyz/API_docs/constructors/botInfo.html) constructor.
     *
     * @param array|int|string $user_id User ID or empty for the default menu button. @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @return array{_: 'botMenuButtonDefault'}|array{_: 'botMenuButtonCommands'}|array{_: 'botMenuButton', text: string, url: string} @see https://docs.madelineproto.xyz/API_docs/types/BotMenuButton.html
     */
    public function getBotMenuButton(array|int|string $user_id): array;

    /**
     * Set the default [suggested admin rights](https://core.telegram.org/api/rights#suggested-bot-rights) for bots being added as admins to channels, see [here for more info on how to handle them »](https://core.telegram.org/api/rights#suggested-bot-rights).
     *
     * @param array{_: 'chatAdminRights', change_info?: bool, post_messages?: bool, edit_messages?: bool, delete_messages?: bool, ban_users?: bool, invite_users?: bool, pin_messages?: bool, add_admins?: bool, anonymous?: bool, manage_call?: bool, other?: bool, manage_topics?: bool} $admin_rights Admin rights @see https://docs.madelineproto.xyz/API_docs/types/ChatAdminRights.html
     */
    public function setBotBroadcastDefaultAdminRights(array $admin_rights): bool;

    /**
     * Set the default [suggested admin rights](https://core.telegram.org/api/rights#suggested-bot-rights) for bots being added as admins to groups, see [here for more info on how to handle them »](https://core.telegram.org/api/rights#suggested-bot-rights).
     *
     * @param array{_: 'chatAdminRights', change_info?: bool, post_messages?: bool, edit_messages?: bool, delete_messages?: bool, ban_users?: bool, invite_users?: bool, pin_messages?: bool, add_admins?: bool, anonymous?: bool, manage_call?: bool, other?: bool, manage_topics?: bool} $admin_rights Admin rights @see https://docs.madelineproto.xyz/API_docs/types/ChatAdminRights.html
     */
    public function setBotGroupDefaultAdminRights(array $admin_rights): bool;

    /**
     * Set localized name, about text and description of a bot (or of the current account, if called by a bot).
     *
     * @param array|int|string|array<never, never> $bot If called by a user, **must** contain the peer of a bot we own. @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @param string $lang_code Language code, if left empty update the fallback about text and description
     * @param string $name New bot name
     * @param string $about New about text
     * @param string $description New description
     */
    public function setBotInfo(array|int|string $bot = [], string $lang_code = '', string $name = '', string $about = '', string $description = ''): bool;

    /**
     * Get localized name, about text and description of a bot (or of the current account, if called by a bot).
     *
     * @param array|int|string|array<never, never> $bot If called by a user, **must** contain the peer of a bot we own. @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @param string $lang_code Language code, if left empty this method will return the fallback about text and description.
     * @return array{_: 'bots.botInfo', name: string, about: string, description: string} @see https://docs.madelineproto.xyz/API_docs/types/bots.BotInfo.html
     */
    public function getBotInfo(array|int|string $bot = [], string $lang_code = ''): array;

    /**
     * Reorder usernames associated to a bot we own.
     *
     * @param array|int|string $bot The bot @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @param list<string>|array<never, never> $order The new order for active usernames. All active usernames must be specified.
     */
    public function reorderUsernames(array|int|string $bot, array $order = []): bool;

    /**
     * Activate or deactivate a purchased [fragment.com](https://fragment.com) username associated to a bot we own.
     *
     * @param array|int|string $bot The bot @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     * @param bool $active Whether to activate or deactivate it
     * @param string $username Username
     */
    public function toggleUsername(array|int|string $bot, bool $active, string $username = ''): bool;
}
