# AtProtocol

[![Automation](https://github.com/ghostwriter/atprotocol/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/atprotocol/actions/workflows/automation.yml)
[![Supported PHP Version](https://badgen.net/packagist/php/ghostwriter/atprotocol?color=8892bf)](https://www.php.net/supported-versions)
[![GitHub Sponsors](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/atprotocol&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)
[![Code Coverage](https://codecov.io/gh/ghostwriter/atprotocol/branch/main/graph/badge.svg)](https://codecov.io/gh/ghostwriter/atprotocol)
[![Type Coverage](https://shepherd.dev/github/ghostwriter/atprotocol/coverage.svg)](https://shepherd.dev/github/ghostwriter/atprotocol)
[![Psalm Level](https://shepherd.dev/github/ghostwriter/atprotocol/level.svg)](https://psalm.dev/docs/running_psalm/error_levels)
[![Latest Version on Packagist](https://badgen.net/packagist/v/ghostwriter/atprotocol)](https://packagist.org/packages/ghostwriter/atprotocol)
[![Downloads](https://badgen.net/packagist/dt/ghostwriter/atprotocol?color=blue)](https://packagist.org/packages/ghostwriter/atprotocol)

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
