<?php

use Atatusoft\Plural\Plural;

if (! function_exists('plural') ) {
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
}

if (! function_exists('singular') ) {
  /**
   * Convenience function for getting the singular form of a plural word.
   *
   * @param string $word The plural word
   * @return  string The word singularized
   * @see     Plural::singularize()
   */
  function singular(string $word): string
  {
    return Plural::singularize($word);
  }
}