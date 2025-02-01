<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Exception;

use Ghostwriter\AtProtocol\Interface\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
