<?php

namespace Tanigami\ValueObjects\Money;

use InvalidArgumentException;
use Symfony\Component\Intl\Intl;

/**
 * @method static Currency aed
 * @method static Currency afn
 * @method static Currency all
 * @method static Currency amd
 * @method static Currency ang
 * @method static Currency aoa
 * @method static Currency ars
 * @method static Currency aud
 * @method static Currency awg
 * @method static Currency azn
 * @method static Currency bam
 * @method static Currency bbd
 * @method static Currency bdt
 * @method static Currency bgn
 * @method static Currency bhd
 * @method static Currency bif
 * @method static Currency bmd
 * @method static Currency bnd
 * @method static Currency bob
 * @method static Currency brl
 * @method static Currency bsd
 * @method static Currency btn
 * @method static Currency bwp
 * @method static Currency byn
 * @method static Currency byr
 * @method static Currency bzd
 * @method static Currency cad
 * @method static Currency cdf
 * @method static Currency chf
 * @method static Currency clp
 * @method static Currency cnh
 * @method static Currency cny
 * @method static Currency cop
 * @method static Currency crc
 * @method static Currency cuc
 * @method static Currency cup
 * @method static Currency cve
 * @method static Currency czk
 * @method static Currency djf
 * @method static Currency dkk
 * @method static Currency dop
 * @method static Currency dzd
 * @method static Currency egp
 * @method static Currency ern
 * @method static Currency etb
 * @method static Currency eur
 * @method static Currency fjd
 * @method static Currency fkp
 * @method static Currency gbp
 * @method static Currency gel
 * @method static Currency ghc
 * @method static Currency ghs
 * @method static Currency gip
 * @method static Currency gmd
 * @method static Currency gnf
 * @method static Currency gns
 * @method static Currency gtq
 * @method static Currency gyd
 * @method static Currency hkd
 * @method static Currency hnl
 * @method static Currency hrk
 * @method static Currency htg
 * @method static Currency huf
 * @method static Currency idr
 * @method static Currency ils
 * @method static Currency inr
 * @method static Currency iqd
 * @method static Currency irr
 * @method static Currency isk
 * @method static Currency itl
 * @method static Currency jmd
 * @method static Currency jod
 * @method static Currency jpy
 * @method static Currency kes
 * @method static Currency kgs
 * @method static Currency khr
 * @method static Currency kmf
 * @method static Currency kpw
 * @method static Currency krw
 * @method static Currency kwd
 * @method static Currency kyd
 * @method static Currency kzt
 * @method static Currency lak
 * @method static Currency lbp
 * @method static Currency lkr
 * @method static Currency lrd
 * @method static Currency lsl
 * @method static Currency ltl
 * @method static Currency lvl
 * @method static Currency lyd
 * @method static Currency mad
 * @method static Currency mdl
 * @method static Currency mga
 * @method static Currency mkd
 * @method static Currency mmk
 * @method static Currency mnt
 * @method static Currency mop
 * @method static Currency mro
 * @method static Currency mur
 * @method static Currency mvr
 * @method static Currency mwk
 * @method static Currency mxn
 * @method static Currency myr
 * @method static Currency mzm
 * @method static Currency mzn
 * @method static Currency nad
 * @method static Currency ngn
 * @method static Currency nio
 * @method static Currency nok
 * @method static Currency npr
 * @method static Currency nzd
 * @method static Currency omr
 * @method static Currency pab
 * @method static Currency pen
 * @method static Currency pgk
 * @method static Currency php
 * @method static Currency pkr
 * @method static Currency pln
 * @method static Currency pyg
 * @method static Currency qar
 * @method static Currency ron
 * @method static Currency rsd
 * @method static Currency rub
 * @method static Currency rwf
 * @method static Currency sar
 * @method static Currency sbd
 * @method static Currency scr
 * @method static Currency sdg
 * @method static Currency sdp
 * @method static Currency sek
 * @method static Currency sgd
 * @method static Currency shp
 * @method static Currency sll
 * @method static Currency sos
 * @method static Currency srd
 * @method static Currency ssp
 * @method static Currency std
 * @method static Currency syp
 * @method static Currency szl
 * @method static Currency thb
 * @method static Currency tjs
 * @method static Currency tmt
 * @method static Currency tnd
 * @method static Currency top
 * @method static Currency trl
 * @method static Currency try
 * @method static Currency ttd
 * @method static Currency twd
 * @method static Currency tzs
 * @method static Currency uah
 * @method static Currency ugx
 * @method static Currency usd
 * @method static Currency uyu
 * @method static Currency uzs
 * @method static Currency vef
 * @method static Currency vnd
 * @method static Currency vuv
 * @method static Currency wst
 * @method static Currency xaf
 * @method static Currency xcd
 * @method static Currency xof
 * @method static Currency xpf
 * @method static Currency yer
 * @method static Currency zar
 * @method static Currency zmk
 * @method static Currency zmw
 * @method static Currency zwd
 */
class Currency
{
    /**
     * @var string
     */
    private $isoCode;

    /**
     * @var int
     */
    private $decimalPlaces;

    /**
     * @param string $isoCode
     */
    private function __construct(string $isoCode)
    {
        $this->isoCode = $isoCode;
        if (in_array($isoCode, ['BHD', 'IQD', 'JOD', 'KWD', 'LYD', 'OMR', 'TND'])) {
            $decimalPlaces = 3;
        } elseif (in_array($isoCode, [
            'BIF', 'BYR', 'CLF', 'CLP', 'CVE', 'DJF', 'GNF', 'ISK', 'JPY', 'KMF',
            'KRW', 'PYG', 'RWF', 'UGX', 'VND', 'VUV', 'XAF', 'XOF', 'XPF'
        ])) {
            $decimalPlaces = 0;
        } elseif (in_array($isoCode, ['MGA', 'MRO'])) {
            $decimalPlaces = 1;
        } else {
            $decimalPlaces = 2;
        }
        $this->decimalPlaces = $decimalPlaces;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return self
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $isoCode = strtoupper($name);
        $name = Intl::getCurrencyBundle()->getCurrencyName($isoCode);
        if (null === $name) {
            throw new InvalidArgumentException(sprintf('Invalid currency code: %s', $isoCode));
        }

        return new self($isoCode);
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->isoCode === $other->isoCode;
    }

    /**
     * @return string
     */
    public function isoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @return int
     */
    public function decimalPlaces(): int
    {
        return $this->decimalPlaces;
    }
}
