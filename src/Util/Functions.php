<?php

use Atatusoft\Plural\Plural;

/**
 * Convenience function for getting the plural form of a singular word.
 *
 * @param string $word The singular word
 * @return  string The word pluralized
 * @see     Plural::pluralize()
 */
function plural(string $word): string
{
  return Plural::pluralize($word);
}