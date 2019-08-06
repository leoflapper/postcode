<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats the postcodes (Eircode) in the Republic of Ireland.
 *
 * An Eircode is a unique 7-character code consisting of letters and numbers.
 * An Eircode consists of a 3-character routing key to identify the area
 * and a 4-character unique identifier for each address.
 *
 * Examples
 *  - A65 F4E2
 *  - W23 F854
 *
 * @see https://www.citizensinformation.ie/en/consumer_affairs/telecommunications_and_postal_services/eircode.html
 */
class IEFormatter implements CountryPostcodeFormatter
{

    /**
     * The regular expression pattern used to validate the postcode.
     * @see https://stackoverflow.com/questions/33391412/validation-for-irish-eircode/33408964#33408964
     */
    private const PATTERN = '/(?:^[AC-FHKNPRTV-Y][0-9]{2}|D6W)[ -]?[0-9AC-FHKNPRTV-Y]{4}$/';

    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match(self::PATTERN, $postcode, $matches) !== 1) {
            return null;
        }

        return $postcode;
    }
}
