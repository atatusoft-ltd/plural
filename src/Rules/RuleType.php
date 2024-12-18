<?php

namespace Atatusoft\Plural\Rules;

/**
 * The type of pluralization rule.
 *
 * @package Atatusoft\Plural\Rules
 * @since 1.2.0
 * @author Andrew Masiye <amasiye313@gmail.com>
 */
enum RuleType: string
{
  case PLURAL = 'plural';
  case SINGULAR = 'singular';
  case IRREGULAR = 'irregular';
  case SINGULAR_IRREGULAR = 'singular_irregular';
}
