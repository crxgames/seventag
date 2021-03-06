<?php

namespace Coduo\PHPMatcher\Matcher;

use Coduo\ToString\String;

class BooleanMatcher extends Matcher
{
    const BOOLEAN_PATTERN = '/^@boolean@$/';

    /**
     * {@inheritDoc}
     */
    public function match($value, $pattern)
    {
        if (!is_bool($value)) {
            $this->error = sprintf("%s \"%s\" is not a valid boolean.", gettype($value), new String($value));
            return false;
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function canMatch($pattern)
    {
        return is_string($pattern) && 0 !== preg_match(self::BOOLEAN_PATTERN, $pattern);
    }
}
