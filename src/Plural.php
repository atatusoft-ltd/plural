<?php

namespace Atatusoft\Plural;

use Atatusoft\Plural\Rules\RuleType;

/**
 * Contains functions that may be used to pluralize words according to the
 * pluralization rules of a given language.
 *
 * @author  Michael J. I. Jackson <mjijackson@gmail.com>
 */
class Plural
{

    /**
     * The current version of Plural.
     *
     * @var string
     */
    const string VERSION = '1.2.0';

    /**
     * An array of all rules that have been loaded, keyed by language code.
     *
     * @var array
     */
    protected static array $rules = [];

    /**
     * The code of the language currently being used.
     *
     * @var string
     */
    protected static string $currentLanguage = '';

    /**
     * Loads the language file for the language with the given language code
     * from the rules directory.
     *
     * @param string $language   The language code
     * @return  bool                True on success, false on failure
     */
    public static function loadLanguage(string $language): bool
    {
        if (!isset(self::$rules[$language])) {
            self::$rules[$language] = [
                RuleType::PLURAL->value             => [],
                RuleType::IRREGULAR->value          => [],
                RuleType::SINGULAR->value           => [],
                RuleType::SINGULAR_IRREGULAR->value => [],
            ];

            $langFile = __DIR__ . "/Rules/$language.php";

            if ((@include_once $langFile) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Sets the {@link Plural::$currentLanguage current language code}.
     *
     * @param string $language   The language code
     * @return  void
     */
    public static function setLanguage(string $language): void
    {
        self::$currentLanguage = $language;
    }

    /**
     * Adds a plural rule to the internal array of plural rules.
     *
     * @param string $regex      The regular expression to match
     * @param string $replace    The replacement string to use
     * @return  void
     */
    public static function addRule(string $regex, string $replace): void
    {
        self::$rules[self::$currentLanguage][RuleType::PLURAL->value][$regex] = $replace;
    }

    /**
     * Adds many plural rules at once. The $rules array should contain regular
     * expression to replacement value pairs.
     *
     * @param   array  $rules  An array of regular expression to replacement value pairs
     * @return  void
     * @see     Plural::addRule()
     */
    public static function addRules(array $rules): void
    {
        foreach ($rules as $regex => $replace) {
            self::addRule($regex, $replace);
        }
    }

    /**
     * Adds a singular rule to the internal array of plural rules.
     *
     * @param string $regex The regular expression to match
     * @param string $replace The replacement string to use
     * @return  void
     */
    public static function addSingularRule(string $regex, string $replace): void
    {
      self::$rules[self::$currentLanguage][RuleType::SINGULAR->value][$regex] = $replace;
    }

    /**
     * Adds many singular rules at once. The $rules array should contain regular
     * expression to replacement value pairs.
     *
     * @param array<string, string> $rules
     * @return  void
     * @see     Plural::addRule()
     */
    public static function addSingularRules(array $rules): void
    {
      foreach ($rules as $regex => $replace) {
        self::addSingularRule($regex, $replace);
      }
    }

    /**
     * Adds an irregular plural rule to the internal array of plural rules.
     *
     * @param string $singular   The singular form of the word
     * @param string $plural     The plural form of the word
     * @return  void
     */
    public static function addIrregular(string $singular, string $plural): void
    {
        self::$rules[self::$currentLanguage]['irregular'][$singular] = $plural;
    }

    /**
     * Adds many irregular plural rules at once. The $rules array should contain
     * regular expression to replacement value pairs.
     *
     * @param array $rules
     * @return  void
     * @see     Plural::addIrregular()
     */
    public static function addIrregulars(array $rules): void
    {
        foreach ($rules as $singular => $plural) {
            self::addIrregular($singular, $plural);
        }
    }

    /**
     * Adds an irregular singular rule to the internal array of plural rules.
     *
     * @param string $regex The regular expression to match
     * @param string $replace The replacement string to use
     * @return  void
     */
    public static function addSingularIrregular(string $regex, string $replace): void
    {
      self::$rules[self::$currentLanguage][RuleType::SINGULAR_IRREGULAR->value][$regex] = $replace;
    }

    /**
     * Adds many irregular singular rules at once. The $rules array should contain
     * regular expression to replacement value pairs.
     *
     * @param array<string, string> $rules The rules to add
     * @return  void
     * @see     Plural::addIrregular()
     */
    public static function addSingularIrregulars(array $rules): void
    {
      foreach ($rules as $regex => $replace) {
        self::addSingularIrregular($regex, $replace);
      }
    }

    /**
     * Converts a singular noun to its plural form.
     *
     * @param string $word   The singular word
     * @return  string          The word pluralized
     */
    public static function pluralize(string $word): string
    {
        if (!isset(self::$rules[self::$currentLanguage])) {
            return $word;
        }

        $word = trim($word);
        $rules = self::$rules[self::$currentLanguage];

        if (isset($rules[RuleType::IRREGULAR->value][$word])) {
            return $rules[RuleType::IRREGULAR->value][$word];
        }
        foreach ($rules[RuleType::PLURAL->value] as $regex => $replace) {
            $word = preg_replace($regex, $replace, $word, 1, $count);
            if ($count) {
                return $word;
            }
        }

        return $word;
    }

    /**
     * Converts a plural noun to its singular form.
     *
     * @param string $word The plural word
     * @return string The word singularized
     */
    public static function singularize(string $word): string
    {
      if (!isset(self::$rules[self::$currentLanguage])) {
        return $word;
      }

      $word = trim($word);
      $rules = self::$rules[self::$currentLanguage];

      if (isset($rules[RuleType::SINGULAR_IRREGULAR->value][$word])) {
        return $rules[RuleType::SINGULAR_IRREGULAR->value][$word];
      }
      foreach ($rules[RuleType::SINGULAR->value] as $regex => $replace) {
        $word = preg_replace($regex, $replace, $word, 1, $count);
        if ($count) {
          return $word;
        }
      }

      return $word;
    }
}