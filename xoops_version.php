<?php
// $Id: xoops_version.php,v 1.2 2006/03/10 04:07:54 mikhail Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2006 xoopscube.org                       //
//                       <http://xoopscube.org>                             //
//  ------------------------------------------------------------------------ //
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

$modversion['name'] = _MI_XWHOIS_NAME;
$modversion['version'] = 1.00;
$modversion['description'] = _MI_XWHOIS_DESC;
$modversion['credits'] = 'sloppycode.net';
$modversion['author'] = 'John Horne XOOPS @ IBDeeming! seventhseal@ibdeeming.com';
$modversion['help'] = 'xwhois.html';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 1;
$modversion['image'] = 'images/xwhois.png';
$modversion['dirname'] = 'xwhois';

//Admin things
$modversion['hasAdmin'] = 0;
$modversion['adminmenu'] = '';

//Blocks
$modversion['blocks'][1]['file'] = 'xwhois.php';
$modversion['blocks'][1]['name'] = _MI_XWHOIS_BNAME1;
$modversion['blocks'][1]['description'] = 'WhoIS Block Search - side block';
$modversion['blocks'][1]['show_func'] = 'b_xwhois_show';
$modversion['blocks'][1]['template'] = 'b_xwhois.html';

$modversion['blocks'][2]['file'] = 'xwhois.php';
$modversion['blocks'][2]['name'] = _MI_XWHOIS_BNAME2;
$modversion['blocks'][2]['description'] = 'WhoIS Block Search - side block';
$modversion['blocks'][2]['show_func'] = 'b_xwhois_show';
$modversion['blocks'][2]['template'] = 'bc_xwhois.html';
// Menu
$modversion['hasMain'] = 1;

// Templates
$modversion['templates'][1]['file'] = 'xwhois.html';
$modversion['templates'][1]['description'] = 'WhoIS';
