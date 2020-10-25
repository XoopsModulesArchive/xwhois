<?php
/*
************************************************************************
* © Sloppycode.net All rights reserved.
*
* This is a standard copyright header for all source code appearing
* at sloppycode.net. This application/class/script may be redistributed,
* as long as the above copyright remains intact.
* Comments to sloppycode@sloppycode.net
************************************************************************
*/

/*
 * Whois wrapper for most global TLDs
 * @author C.Small <chris@sloppycode.net>
 * @version 1.5 - Added PEAR style comments
 * @version 1.4 - Timeout and whois_server properties added.
 * @version 1.3 - Temporary fix for .name,.pro domains
 * @version 1.2 - Error catching for .tv domains
 * @version 1.1 - Converted to php
 * @version 1.0 - Perl version [http://www.sloppycode.net/sloppycode/Perl[CGI]/s29.html]
*/

class xWhois
{
    /*
     * Optional parameter for the server to be used for the lookup.
     * If this is not set, an appropriate whois server for the domain name
     * specified is automagically found by the Whois class.
     * @type string
     * @access public
     */

    public $whois_server;

    /*
     * The timeout, in seconds, for the lookup. Default is 30.
     * @type integer
     * @access public
     */

    public $timeout = 30;

    /*
     * Returns a string, with new-lines (\n) converted to non-breaking spaces (&lt;BR&gt;),
     * with details for the domain specified by $domain.
     * @access public
     * @param string $domain the domain to lookup, excluding http:// and www
     * @return string the results of the whois
     */

    public function lookup($domain)
    {
        $result = '';

        $parts = [];

        $host = '';

        // .tv don't allow access to their whois

        if (mb_strstr($domain, '.tv')) {
            //$result = "'.tv' domain names require you to have an account to do whois searches.";

            $result = "Please contact us regarding the $domain";

        // New domains fix (half work, half don't)
        } elseif (mb_strstr($domain, '.name') || mb_strstr($domain, '.pro') > 0) {
            //$result = ".name,.pro require you to have an account to do whois searches.";

            $result = "Please contact us regarding $domain";
        } else {
            if (empty($this->whois_server)) {
                $parts = explode('.', $domain);

                $testhost = $parts[count($parts) - 1];

                $whoisserver = $testhost . '.whois-servers.net';

                $this->host = gethostbyname($whoisserver);

                $this->host = gethostbyaddr($this->host);

                if ($this->host == $testhost) {
                    $this->host = 'www.internic.net';
                }
            }

            //			flush();

            //			ob_flush();

            $whoisSocket = fsockopen($this->host, 43, $errno, $errstr, $this->timeout);

            if ($whoisSocket) {
                fwrite($whoisSocket, $domain . "\015\012");

                while (!feof($whoisSocket)) {
                    $result .= fgets($whoisSocket, 128) . '<br>';
                }

                fclose($whoisSocket);
            }
        }

        return $result;
    }
}
