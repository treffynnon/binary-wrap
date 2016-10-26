<?php

namespace Treffynnon\BinaryWrap\Examples\Date;

/**
 * This is an example of how the BinaryWrapAbstract can be implemented to
 * provide a registry of `date` related functions.
 *
 * Take a look in integration/Date/DateTest.php for further hints on how this
 * class can be used.
 */
class Date extends \Treffynnon\BinaryWrap\BinaryWrapAbstract
{
    public function registerCommands()
    {
        // This command can be called in two ways:
        //
        // Date::rfc();
        // $d = new Date; $d->rfc();
        $this->addCommand('rfc', function () {
            return new RfcDateCommand;
        });

        // This command can be called in two ways:
        //
        // Date::lastFridayOfTheMonth();
        // $d = new Date; $d->lastFridatOfTheMonth();
        $this->addCommand('lastFridayOfTheMonth', function () {
            return new LastFridayOfTheMonthCommand;
        });

        // This one is a little more fun in that you can pass it arguments at call time
        // that will be used in the FormattedDateCommand class to build the command
        // parameters before execution. See the FormattedDateCommand class for how this is_a
        // achieved relatively simply.
        //
        // It can be called in two ways:
        //
        // Date::formattedDate('%d %m %Y');
        // $d = new Date; $d->formattedDate('%d %m %Y');
        $this->addCommand('formattedDate', function () {
            return new FormattedDateCommand;
        });
    }
}
