<?php

/*
 * Copyright (c) 2025 Martin Pettersson
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace N7e\Configuration;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(JsonConfigurationSource::class)]
class JsonConfigurationSourceTest extends TestCase
{
    #[Test]
    public function shouldProduceConfiguration(): void
    {
        $configurationSource = new JsonConfigurationSource(__DIR__ . '/fixtures/configuration.json');

        $this->assertEquals(['key' => 'value'], $configurationSource->load());
    }

    #[Test]
    public function shouldThrowIfInvalidJson(): void
    {
        $this->expectException(InvalidJsonException::class);

        (new JsonConfigurationSource(__DIR__ . '/fixtures/invalid.json'))->load();
    }
}
