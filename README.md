# Atprotocol

[![Automation](https://github.com/ghostwriter/atprotocol/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/atprotocol/actions/workflows/automation.yml)
[![PHP Version](https://badgen.net/packagist/php/ghostwriter/atprotocol?color=777BB4)](https://www.php.net/supported-versions)
[![Packagist Downloads](https://badgen.net/packagist/dt/ghostwriter/atprotocol?color=F28D1A)](https://packagist.org/packages/ghostwriter/atprotocol)
[![PayPal](https://img.shields.io/badge/paypal-@codepoet-0079C1?logo=data%3Aimage%2Fsvg%2Bxml%3Bbase64%2CPHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI%2BPHBhdGggZD0iTTE5LjcxNSA2LjEzM2MuMjQ5LTEuODY2IDAtMy4xMS0uOTk5LTQuMjY2QzE3LjYzNC42MjIgMTUuNzIxIDAgMTMuMzA3IDBINi4yMzVjLS40MTggMC0uOTE2LjQ0NC0xIC44ODlMMi4zMjMgMjAuNjIyYzAgLjM1Ni4yNS44LjY2NS44aDQuMzI4bC0uMjUgMS45NTZjLS4wODQuMzU1LjE2Ni42MjIuNDk4LjYyMmgzLjY2M2MuNDE3IDAgLjgzMi0uMjY3LjkxNS0uNzExdi0uMjY3bC43NDktNC42MjJ2LS4xNzhjLjA4My0uNDQ0LjUtLjguOTE1LS44aC41YzMuNTc4IDAgNi4zMjUtMS41MSA3LjE1Ni01Ljk1NS40MTgtMS44NjcuMjUyLTMuMzc4LS43NDctNC40NDUtLjI1LS4zNTUtLjY2Ni0uNjIyLTEtLjg4OSIgZmlsbD0iIzAwOWNkZSIvPjxwYXRoIGQ9Ik0xOS43MTUgNi4xMzNjLjI0OS0xLjg2NiAwLTMuMTEtLjk5OS00LjI2NkMxNy42MzQuNjIyIDE1LjcyMSAwIDEzLjMwNyAwSDYuMjM1Yy0uNDE4IDAtLjkxNi40NDQtMSAuODg5TDIuMzIzIDIwLjYyMmMwIC4zNTYuMjUuOC42NjUuOGg0LjMyOGwxLjE2NC03LjM3OC0uMDgzLjI2N2MuMDg0LS41MzMuNS0uODg5Ljk5OC0uODg5aDIuMDhjNC4wNzkgMCA3LjI0MS0xLjc3OCA4LjI0LTYuNzU1LS4wODMtLjI2NyAwLS4zNTYgMC0uNTM0IiBmaWxsPSIjMDEyMTY5Ii8%2BPHBhdGggZD0iTTkuNTYzIDYuMTMzYy4wODItLjI2Ni4yNS0uNTMzLjQ5OC0uNzEuMTY2IDAgLjI1LS4wOS40MTYtLjA5aDUuNDk0Yy42NjYgMCAxLjMzLjA5IDEuODMuMTc4LjE2NiAwIC4zMzMgMCAuNDk4LjA4OS4xNjguMDg5LjMzNC4wODkuNDE4LjE3OGguMjVjLjI0OC4wODkuNDk3LjI2Ni43NDguMzU1LjI0OC0xLjg2NiAwLTMuMTEtLjk5OS00LjM1NUMxNy43MTcuNTMzIDE1LjgwNCAwIDEzLjM5IDBINi4yMzVjLS40MTggMC0uOTE2LjM1Ni0xIC44ODlMMi4zMjMgMjAuNjIyYzAgLjM1Ni4yNS44LjY2NS44aDQuMzI4bDEuMTY0LTcuMzc4IDEuMDg0LTcuOTF6IiBmaWxsPSIjMDAzMDg3Ii8%2BPC9zdmc%2B)](https://paypal.me/codepoet)
[![Sponsors via GitHub](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/atprotocol&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)

> [!WARNING]
>
> This project is not finished yet, work in progress.

## Installation

You can install the package via composer:

``` bash
composer require ghostwriter/atprotocol
```

## Usage

### Auth
> **Info**
>
> Use app passwords to securely login to Bluesky without giving full access to your account or password.
> https://bsky.app/settings/app-passwords

```php
$bsky = new Bluesky(personalDataServer: 'https://bsky.social');

// create a new account on the server
$sessionData = $bsky->createAccount(
  email: 'nathanael.esayeas@protonmail.com',
  handle: 'codepoet.bsky.social',
  password: '************'
  inviteCode: 'black-lives-matter',
);

// if an existing session (accessed with 'bsky.session') was securely stored previously, then reuse that
$bsky->resumeSession(session: $sessionData);

// if no old session was available, create a new one by logging in with password (App Password)
$sessionData = $bsky->login(
    identifier: 'codepoet.bsky.social',
    password: '************'
);

$bsky->post(text: 'My first post using ghostwriter/atprotocol for PHP.');

// Feeds and content
$bsky->getTimeline($params,$opts)
$bsky->getAuthorFeed($params,$opts)
$bsky->getPostThread($params,$opts)
$bsky->getPost($params)
$bsky->getPosts($params,$opts)
$bsky->getLikes($params,$opts)
$bsky->getRepostedBy($params,$opts)
$bsky->post($record)
$bsky->deletePost($postUri)
$bsky->like($uri, cid)
$bsky->deleteLike($likeUri)
$bsky->repost($uri, cid)
$bsky->deleteRepost($repostUri)
$bsky->uploadBlob($data,$opts)

// Social graph
$bsky->getFollows($params,$opts)
$bsky->getFollowers($params,$opts)
$bsky->follow($did)
$bsky->deleteFollow($followUri)

// Actors
$bsky->getProfile($params,$opts)
$bsky->upsertProfile($updateFn)
$bsky->getProfiles($params,$opts)
$bsky->getSuggestions($params,$opts)
$bsky->searchActors($params,$opts)
$bsky->mute($did)
$bsky->unmute($did)
$bsky->muteModList($listUri)
$bsky->unmuteModList($listUri)
$bsky->blockModList($listUri)
$bsky->unblockModList($listUri)

// Notifications
$bsky->listNotifications($params,$opts)
$bsky->countUnreadNotifications($params,$opts)
$bsky->updateSeenNotifications()

// Identity
$bsky->resolveHandle($params,$opts)
$bsky->updateHandle($params,$opts)

// Session management
$bsky->createAccount($params)
$bsky->login($params)
$bsky->resumeSession($session)



// Excepions
        // { "name": "InvalidHandle" },
        // { "name": "InvalidPassword" },
        // { "name": "InvalidInviteCode" },
        // { "name": "HandleNotAvailable" },
        // { "name": "UnsupportedDomain" },
        // { "name": "UnresolvableDid" },
        // { "name": "IncompatibleDidDoc" }


// TODO: extract the headers from the lexicon objects
```

### Changelog

Please see [CHANGELOG.md](./CHANGELOG.md) for more information on what has changed recently.

### Security

If you discover any security-related issues, please use [`Security Advisories`](https://github.com/ghostwriter/atprotocol/security/advisories/new) instead of using the issue tracker.

### Credits

- [Nathanael Esayeas](https://github.com/ghostwriter)
- [All Contributors](https://github.com/ghostwriter/atprotocol/contributors)

### License

The BSD-3-Clause. Please see [License File](./LICENSE) for more information.
