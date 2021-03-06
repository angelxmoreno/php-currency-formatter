<?php
namespace Axm\Currency;

/**
 * Class Config
 * @package Axm\Currency
 */
class Config
{
    /**
     * The ISO 4217 currency code in uppercase
     *
     * @var string
     */
    protected $iso_code;

    /**
     * The Currency symbol
     *
     * @var string
     */
    protected $currency_symbol;

    /**
     * The number of decimal points
     *
     * @var integer
     */
    protected $decimal_spaces;

    /**
     * The separator for the decimal point
     *
     * @var string
     */
    protected $decimal_separator;

    /**
     * The thousands separator
     *
     * @var string
     */
    protected $thousand_separator;

    /**
     * Determines placement of currency symbol (relative to price string)
     *
     * @var bool
     */
    public $prepend_symbol;

    /**
     * The currency label
     *
     * @var string
     */
    protected $label;

    /**
     * Currency Config constructor
     *
     * @param string $iso_code The ISO 4217 currency code
     * @param array $config_array The configuration array
     */
    public function __construct($iso_code, array $config_array = [])
    {
        $defaults = [
            'currency_symbol' => '$',
            'currency_code' => 'USD',
            'decimal_spaces' => 2,
            'decimal_separator' => '.',
            'thousand_separator' => ',',
            'label' => null,
            'prepend_symbol' => false
        ];
        $config = array_merge($defaults, $config_array);

        $this->iso_code = strtoupper($iso_code);
        $this->currency_code = $config['currency_code'];
        $this->currency_symbol = $config['currency_symbol'];
        $this->decimal_spaces = $config['decimal_spaces'];
        $this->decimal_separator = $config['decimal_separator'];
        $this->thousand_separator = $config['thousand_separator'];
        $this->label = is_null($config['label'])
            ? $this->currency_code
            : $config['label'];
        $this->prepend_symbol = $config['prepend_symbol'];
    }

    /**
     * Creates a Currency Config from an existing one with additional properties
     *
     * @param Config $config A Currency Config to use as the base
     * @param array $overrides An array of Currency Config properties to use
     *
     * @return Config The new Currency Config
     */
    public static function buildFromOverride(Config $config, array $overrides)
    {
        $config_array = array_merge($config->toArray(), $overrides);
        return new Config($config_array['iso_code'], $config_array);
    }

    /**
     * Returns the Currency Config as an array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'iso_code' => $this->iso_code,
            'currency_symbol' => $this->currency_symbol,
            'currency_code' => $this->currency_code,
            'decimal_spaces' => $this->decimal_spaces,
            'decimal_separator' => $this->decimal_separator,
            'thousand_separator' => $this->thousand_separator,
            'label' => $this->label,
            'prepend_symbol' => $this->prepend_symbol
        ];
    }

    /**
     * @return string
     */
    public function getIsoCode()
    {
        return $this->iso_code;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * @return string
     */
    public function getCurrencySymbol()
    {
        return $this->currency_symbol;
    }

    /**
     * @return int
     */
    public function getDecimalSpaces()
    {
        return $this->decimal_spaces;
    }

    /**
     * @return string
     */
    public function getDecimalSeparator()
    {
        return $this->decimal_separator;
    }

    /**
     * @return string
     */
    public function getThousandSeparator()
    {
        return $this->thousand_separator;
    }

    /**
     * @return bool
     */
    public function getPrependSymbol()
    {
        return $this->prepend_symbol;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
}
