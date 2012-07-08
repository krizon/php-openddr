<?php

namespace OpenDDR\Model;

class UserAgent
{
    /**
     * @var string
     */
    private $completeUserAgent;

    /**
     * @var boolean
     */
    private $mozillaPattern;

    /**
     * @var boolean
     */
    private $operaPattern;

    /**
     * @var string
     */
    private $mozillaVersion;

    /**
     * @var string
     */
    private $operaVersion;

    /**
     * @var boolean
     */
    private $containsAndroid;

    /**
     * @var boolean
     */
    private $containsBlackBerryOrRim;

    /**
     * @var boolean
     */
    private $containsIOSDevices;

    /**
     * @var boolean
     */
    private $containsMSIE;

    /**
     * @var boolean
     */
    private $containsSymbian;

    /**
     * @var array
     */
    private $patternElements = array();

    /**
     * @var boolean
     */
    private $containsWindowsPhone;

    public function __construct($userAgent)
    {
        $this->completeUserAgent = $userAgent;

        // @todo ported one on one from java src, needs refactoring for better extensibility
        preg_match('#(.*?)((?:Mozilla)|(?:Opera))[/ ](\\d+\\.\\d+).*?\\(((?:.*?)(?:.*?\\(.*?\\))*(?:.*?))\\)(.*)#', $userAgent, $result);
        if ($result) {
            $this->patternElements = $result;
            $version = $result[3];

            if (false !== strpos($result[2], 'Opera')) {
                $this->mozillaPattern = false;
                $this->operaPattern = true;
                $this->operaVersion = $version;

                if ($this->operaVersion == "9.80" && $result[2] != null) {
                    preg_match('#.*Version/(\\d+.\\d+).*#', $result[5], $result2);

                    if ($result2) {
                        $this->operaVersion = $result2[1];
                    }
                }
            } else {
                $this->mozillaPattern = true;
                $this->mozillaVersion = $version;
            }
        } else {
            $this->mozillaPattern = false;
            $this->operaPattern = false;
            $this->patternElements = array();
            $this->mozillaVersion = null;
            $this->operaVersion = null;
        }

        // @todo ported one on one from java src, needs refactoring for better extensibility
        if (false !== strpos($userAgent, 'Android')) {
            $this->containsAndroid = true;
        } else {
            $this->containsAndroid = false;
            if (preg_match("#.*(?!like).iPad.*#", $userAgent) || preg_match("#.*(?!like).iPod.*#", $userAgent) || preg_match("#.*(?!like).iPhone.*#", $userAgent)) {
                $this->containsIOSDevices = true;
            } else {
                $this->containsIOSDevices = false;
                if (preg_match("#.*[Bb]lack.?[Bb]erry|RIM.?Tablet.?OS.*#", $userAgent)) {
                    $this->containsBlackBerryOrRim = true;
                } else {
                    $this->containsBlackBerryOrRim = false;
                    if (preg_match("#.*Symbian.|SymbOS.*|.*Series.?60.*#", $userAgent)) {
                        $this->containsSymbian = true;

                    } else {
                        $this->containsSymbian = false;
                        if (preg_match("#.*Windows.?(?:(?:CE)|(?:Phone)|(?:NT)|(?:Mobile)).*#", $userAgent)) {
                            $this->containsWindowsPhone = true;
                        } else {
                            $this->containsWindowsPhone = false;
                        }

                        if (preg_match("#.*MSIE.([0-9\\.b]+).*#", $userAgent)) {
                            $this->containsMSIE = true;
                        } else {
                            $this->containsMSIE = false;
                        }
                    }
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getCompleteUserAgent()
    {
        return $this->completeUserAgent;
    }

    /**
     * @return boolean
     */
    public function getContainsAndroid()
    {
        return $this->containsAndroid;
    }

    /**
     * @return boolean
     */
    public function getContainsBlackBerryOrRim()
    {
        return $this->containsBlackBerryOrRim;
    }

    /**
     * @return boolean
     */
    public function getContainsIOSDevices()
    {
        return $this->containsIOSDevices;
    }

    /**
     * @return boolean
     */
    public function getContainsMSIE()
    {
        return $this->containsMSIE;
    }

    /**
     * @return boolean
     */
    public function getContainsSymbian()
    {
        return $this->containsSymbian;
    }

    /**
     * @return boolean
     */
    public function getContainsWindowsPhone()
    {
        return $this->containsWindowsPhone;
    }

    /**
     * @return boolean
     */
    public function getMozillaPattern()
    {
        return $this->mozillaPattern;
    }

    /**
     * @return string
     */
    public function getMozillaVersion()
    {
        return $this->mozillaVersion;
    }

    /**
     * @return boolean
     */
    public function getOperaPattern()
    {
        return $this->operaPattern;
    }

    /**
     * @return string
     */
    public function getOperaVersion()
    {
        return $this->operaVersion;
    }
}