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

interface Chatlists
{
    /**
     * Export a [folder »](https://core.telegram.org/api/folders), creating a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist The folder to export @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     * @param string $title An optional name for the link
     * @param list<array|int|string>|array<never, never> $peers Array of The list of channels, group and supergroups to share with the link. Basic groups will automatically be [converted to supergroups](https://core.telegram.org/api/channel#migration) when invoking the method. @see https://docs.madelineproto.xyz/API_docs/types/InputPeer.html
     * @return array{_: 'chatlists.exportedChatlistInvite', filter: array{_: 'dialogFilter', contacts: bool, non_contacts: bool, groups: bool, broadcasts: bool, bots: bool, exclude_muted: bool, exclude_read: bool, exclude_archived: bool, id: int, title: string, emoticon: string, pinned_peers: list<array|int|string>, include_peers: list<array|int|string>, exclude_peers: list<array|int|string>}|array{_: 'dialogFilterDefault'}|array{_: 'dialogFilterChatlist', has_my_invites: bool, id: int, title: string, emoticon: string, pinned_peers: list<array|int|string>, include_peers: list<array|int|string>}, invite: array{_: 'exportedChatlistInvite', title: string, url: string, peers: list<array|int|string>}} @see https://docs.madelineproto.xyz/API_docs/types/chatlists.ExportedChatlistInvite.html
     */
    public function exportChatlistInvite(array $chatlist, string $title = '', array $peers = []): array;

    /**
     * Delete a previously created [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist The related folder @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     * @param string $slug `slug` obtained from the [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     */
    public function deleteExportedInvite(array $chatlist, string $slug = ''): bool;

    /**
     * Edit a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist Folder ID @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     * @param string $slug `slug` obtained from the [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     * @param string $title If set, sets a new name for the link
     * @param list<array|int|string>|array<never, never> $peers Array of If set, changes the list of peers shared with the link @see https://docs.madelineproto.xyz/API_docs/types/InputPeer.html
     * @return array{_: 'exportedChatlistInvite', title: string, url: string, peers: list<array|int|string>} @see https://docs.madelineproto.xyz/API_docs/types/ExportedChatlistInvite.html
     */
    public function editExportedInvite(array $chatlist, string $slug = '', string $title = '', array $peers = []): array;

    /**
     * List all [chat folder deep links »](https://core.telegram.org/api/links#chat-folder-links) associated to a folder.
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist The folder @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     * @return array{_: 'chatlists.exportedInvites', invites: list<array{_: 'exportedChatlistInvite', title: string, url: string, peers: list<array|int|string>}>, chats: list<array|int|string>, users: list<array|int|string>} @see https://docs.madelineproto.xyz/API_docs/types/chatlists.ExportedInvites.html
     */
    public function getExportedInvites(array $chatlist): array;

    /**
     * Obtain information about a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     *
     * @param string $slug `slug` obtained from the [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links)
     * @return array{_: 'chatlists.chatlistInviteAlready', filter_id: int, missing_peers: list<array|int|string>, already_peers: list<array|int|string>, chats: list<array|int|string>, users: list<array|int|string>}|array{_: 'chatlists.chatlistInvite', title: string, emoticon: string, peers: list<array|int|string>, chats: list<array|int|string>, users: list<array|int|string>} @see https://docs.madelineproto.xyz/API_docs/types/chatlists.ChatlistInvite.html
     */
    public function checkChatlistInvite(string $slug = ''): array;

    /**
     * Import a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links), joining some or all the chats in the folder.
     *
     * @param string $slug `slug` obtained from a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     * @param list<array|int|string>|array<never, never> $peers Array of List of new chats to join, fetched using [chatlists.checkChatlistInvite](https://docs.madelineproto.xyz/API_docs/methods/chatlists.checkChatlistInvite.html) and filtered as specified in the [documentation »](https://core.telegram.org/api/folders#shared-folders). @see https://docs.madelineproto.xyz/API_docs/types/InputPeer.html
     * @return array @see https://docs.madelineproto.xyz/API_docs/types/Updates.html
     */
    public function joinChatlistInvite(string $slug = '', array $peers = []): array;

    /**
     * Fetch new chats associated with an imported [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links). Must be invoked at most every `chatlist_update_period` seconds (as per the related [client configuration parameter »](https://core.telegram.org/api/config#chatlist-update-period)).
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist The folder @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     * @return array{_: 'chatlists.chatlistUpdates', missing_peers: list<array|int|string>, chats: list<array|int|string>, users: list<array|int|string>} @see https://docs.madelineproto.xyz/API_docs/types/chatlists.ChatlistUpdates.html
     */
    public function getChatlistUpdates(array $chatlist): array;

    /**
     * Join channels and supergroups recently added to a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist The folder @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     * @param list<array|int|string>|array<never, never> $peers Array of List of new chats to join, fetched using [chatlists.getChatlistUpdates](https://docs.madelineproto.xyz/API_docs/methods/chatlists.getChatlistUpdates.html) and filtered as specified in the [documentation »](https://core.telegram.org/api/folders#shared-folders). @see https://docs.madelineproto.xyz/API_docs/types/InputPeer.html
     * @return array @see https://docs.madelineproto.xyz/API_docs/types/Updates.html
     */
    public function joinChatlistUpdates(array $chatlist, array $peers = []): array;

    /**
     * Dismiss new pending peers recently added to a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist The folder @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     */
    public function hideChatlistUpdates(array $chatlist): bool;

    /**
     * Returns identifiers of pinned or always included chats from a chat folder imported using a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links), which are suggested to be left when the chat folder is deleted.
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist Folder ID @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     * @return list<array|int|string> Array of  @see https://docs.madelineproto.xyz/API_docs/types/Peer.html
     */
    public function getLeaveChatlistSuggestions(array $chatlist): array;

    /**
     * Delete a folder imported using a [chat folder deep link »](https://core.telegram.org/api/links#chat-folder-links).
     *
     * @param array{_: 'inputChatlistDialogFilter', filter_id?: int} $chatlist Folder ID @see https://docs.madelineproto.xyz/API_docs/types/InputChatlist.html
     * @param list<array|int|string>|array<never, never> $peers Array of Also leave the specified channels and groups @see https://docs.madelineproto.xyz/API_docs/types/InputPeer.html
     * @return array @see https://docs.madelineproto.xyz/API_docs/types/Updates.html
     */
    public function leaveChatlist(array $chatlist, array $peers = []): array;
}
