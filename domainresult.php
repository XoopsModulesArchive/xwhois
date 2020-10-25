<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2006 xoopscube.org                       //
//                       <http://xoopscube.org>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

include 'header.php';
$GLOBALS['xoopsOption']['template_main'] = 'xwhois.html';
require XOOPS_ROOT_PATH . '/header.php';
include 'class/clsWhois.php';

if (isset($_POST['xwhois_domain'])) {
    $xwhois_domain = $_POST['xwhois_domain'];
}
if (isset($_POST['xwhois_domainext'])) {
    $xwhois_domainext = $_POST['xwhois_domainext'];
}

function xwhois($xwhois_domain, $xwhois_domainext)
{
    global $xoopsTpl;

    $xoopsTpl->assign('lang_xwhois_domainresult', '1');

    $whois = new xWhois();

    if ('' != $xwhois_domain && '' != $xwhois_domainext) {
        $xoopsTpl->assign('lang_xwhois_fulldomain', "<b>$xwhois_domain$xwhois_domainext</B>");

        $lookupresult = $whois->lookup($xwhois_domain . $xwhois_domainext);

        $xoopsTpl->assign('lang_xwhois_lookup', $lookupresult);
    } else {
        $xoopsTpl->assign('lang_xwhois_lookup', XWHOIS_INVALID_DNS);
    }

    $xoopsTpl->assign('lang_xwhois_header', XWHOIS_HEADER);

    $xoopsTpl->assign('lang_xwhois_search', XWHOIS_SEARCH);

    $xoopsTpl->assign('lang_xwhois_instr', XWHOIS_INSTR);
}

xwhois($xwhois_domain, $xwhois_domainext);

require XOOPS_ROOT_PATH . '/footer.php';
