<?php

/*
 * Copyright (c) 2025 Martin Pettersson
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace N7e\Configuration;

/**
 * JSON configuration source implementation.
 *
 * @see \N7e\Configuration\ConfigurationSourceInterface
 */
class JsonConfigurationSource extends FileConfigurationSource implements ConfigurationSourceInterface
{
    /** {@inheritDoc} */
    public function load(): array
    {
        /**
         * Decoded configuration.
         *
         * @var array|null $configuration
         */
        $configuration = json_decode($this->read(), true);

        if (is_null($configuration)) {
            throw new InvalidJsonException($this->file);
        }

        return $configuration;
    }
}
