<?php

namespace Tanigami\ValueObjects\Geo;

use InvalidArgumentException;
use Symfony\Component\Intl\Intl;

/**
 * @method static Country ac
 * @method static Country ad
 * @method static Country ae
 * @method static Country af
 * @method static Country ag
 * @method static Country ai
 * @method static Country al
 * @method static Country am
 * @method static Country ao
 * @method static Country aq
 * @method static Country ar
 * @method static Country as
 * @method static Country at
 * @method static Country au
 * @method static Country aw
 * @method static Country ax
 * @method static Country az
 * @method static Country ba
 * @method static Country bb
 * @method static Country bd
 * @method static Country be
 * @method static Country bf
 * @method static Country bg
 * @method static Country bh
 * @method static Country bi
 * @method static Country bj
 * @method static Country bl
 * @method static Country bm
 * @method static Country bn
 * @method static Country bo
 * @method static Country bq
 * @method static Country br
 * @method static Country bs
 * @method static Country bt
 * @method static Country bw
 * @method static Country by
 * @method static Country bz
 * @method static Country ca
 * @method static Country cc
 * @method static Country cd
 * @method static Country cf
 * @method static Country cg
 * @method static Country ch
 * @method static Country ci
 * @method static Country ck
 * @method static Country cl
 * @method static Country cm
 * @method static Country cn
 * @method static Country co
 * @method static Country cr
 * @method static Country cu
 * @method static Country cv
 * @method static Country cw
 * @method static Country cx
 * @method static Country cy
 * @method static Country cz
 * @method static Country de
 * @method static Country dg
 * @method static Country dj
 * @method static Country dk
 * @method static Country dm
 * @method static Country do
 * @method static Country dz
 * @method static Country ea
 * @method static Country ec
 * @method static Country ee
 * @method static Country eg
 * @method static Country eh
 * @method static Country er
 * @method static Country es
 * @method static Country et
 * @method static Country ez
 * @method static Country fi
 * @method static Country fj
 * @method static Country fk
 * @method static Country fm
 * @method static Country fo
 * @method static Country fr
 * @method static Country ga
 * @method static Country gb
 * @method static Country gd
 * @method static Country ge
 * @method static Country gf
 * @method static Country gg
 * @method static Country gh
 * @method static Country gi
 * @method static Country gl
 * @method static Country gm
 * @method static Country gn
 * @method static Country gp
 * @method static Country gq
 * @method static Country gr
 * @method static Country gs
 * @method static Country gt
 * @method static Country gu
 * @method static Country gw
 * @method static Country gy
 * @method static Country hk
 * @method static Country hn
 * @method static Country hr
 * @method static Country ht
 * @method static Country hu
 * @method static Country ic
 * @method static Country id
 * @method static Country ie
 * @method static Country il
 * @method static Country im
 * @method static Country in
 * @method static Country io
 * @method static Country iq
 * @method static Country ir
 * @method static Country is
 * @method static Country it
 * @method static Country je
 * @method static Country jm
 * @method static Country jo
 * @method static Country jp
 * @method static Country ke
 * @method static Country kg
 * @method static Country kh
 * @method static Country ki
 * @method static Country km
 * @method static Country kn
 * @method static Country kp
 * @method static Country kr
 * @method static Country kw
 * @method static Country ky
 * @method static Country kz
 * @method static Country la
 * @method static Country lb
 * @method static Country lc
 * @method static Country li
 * @method static Country lk
 * @method static Country lr
 * @method static Country ls
 * @method static Country lt
 * @method static Country lu
 * @method static Country lv
 * @method static Country ly
 * @method static Country ma
 * @method static Country mc
 * @method static Country md
 * @method static Country me
 * @method static Country mf
 * @method static Country mg
 * @method static Country mh
 * @method static Country mk
 * @method static Country ml
 * @method static Country mm
 * @method static Country mn
 * @method static Country mo
 * @method static Country mp
 * @method static Country mq
 * @method static Country mr
 * @method static Country ms
 * @method static Country mt
 * @method static Country mu
 * @method static Country mv
 * @method static Country mw
 * @method static Country mx
 * @method static Country my
 * @method static Country mz
 * @method static Country na
 * @method static Country nc
 * @method static Country ne
 * @method static Country nf
 * @method static Country ng
 * @method static Country ni
 * @method static Country nl
 * @method static Country no
 * @method static Country np
 * @method static Country nr
 * @method static Country nu
 * @method static Country nz
 * @method static Country om
 * @method static Country pa
 * @method static Country pe
 * @method static Country pf
 * @method static Country pg
 * @method static Country ph
 * @method static Country pk
 * @method static Country pl
 * @method static Country pm
 * @method static Country pn
 * @method static Country pr
 * @method static Country ps
 * @method static Country pt
 * @method static Country pw
 * @method static Country py
 * @method static Country qa
 * @method static Country re
 * @method static Country ro
 * @method static Country rs
 * @method static Country ru
 * @method static Country rw
 * @method static Country sa
 * @method static Country sb
 * @method static Country sc
 * @method static Country sd
 * @method static Country se
 * @method static Country sg
 * @method static Country sh
 * @method static Country si
 * @method static Country sj
 * @method static Country sk
 * @method static Country sl
 * @method static Country sm
 * @method static Country sn
 * @method static Country so
 * @method static Country sr
 * @method static Country ss
 * @method static Country st
 * @method static Country sv
 * @method static Country sx
 * @method static Country sy
 * @method static Country sz
 * @method static Country ta
 * @method static Country tc
 * @method static Country td
 * @method static Country tf
 * @method static Country tg
 * @method static Country th
 * @method static Country tj
 * @method static Country tk
 * @method static Country tl
 * @method static Country tm
 * @method static Country tn
 * @method static Country to
 * @method static Country tr
 * @method static Country tt
 * @method static Country tv
 * @method static Country tw
 * @method static Country tz
 * @method static Country ua
 * @method static Country ug
 * @method static Country um
 * @method static Country un
 * @method static Country us
 * @method static Country uy
 * @method static Country uz
 * @method static Country va
 * @method static Country vc
 * @method static Country ve
 * @method static Country vg
 * @method static Country vi
 * @method static Country vn
 * @method static Country vu
 * @method static Country wf
 * @method static Country ws
 * @method static Country xk
 * @method static Country ye
 * @method static Country yt
 * @method static Country za
 * @method static Country zm
 * @method static Country zw
 */
class Country
{
    /**
     * @var string
     */
    private $isoCode;

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $isoCode
     */
    private function __construct(string $isoCode, string $name)
    {
        $this->isoCode = $isoCode;
        $this->name = $name;
    }

    public static function __callStatic($name, $arguments)
    {
        $isoCode = strtoupper($name);
        $name = Intl::getRegionBundle()->getCountryName($isoCode);
        if (null === $name) {
            throw new InvalidArgumentException(sprintf('Invalid country code: %s', $isoCode));
        }

        return new self($isoCode, $name);
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
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}
