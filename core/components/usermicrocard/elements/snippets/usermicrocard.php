<?php

/**
 * UserMicroData
 *
 * Copyright 2021 by Anton Tarasov <contact@antontarasov.com>
 *
 * UserMicroData is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * UserMicroData is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * UserMicroData; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package usermicrodata
 */
/**
 * UserMicroData
 *
 * A dynamic form processing Snippet for MODx Revolution.
 *
 * @var modX $modx
 * @var array $scriptProperties
 *
 * @package formit
 */


/** @var modX $modx */
/** @var array $scriptProperties */

/*

http://microformats.org/wiki/hcard


*/

// Snippet parameters
$uid = intval($modx->getOption('userID', $scriptProperties, $_GET['uid']));
$mode = $modx->getOption('mode', $scriptProperties, 'vCard');
$vTpl = $modx->getOption('vTpl', $scriptProperties, 'umcVCardTpl');
$vName = $modx->getOption('vName', $scriptProperties, 'vCard.vcf');
$hTpl = $modx->getOption('vTpl', $scriptProperties, 'umcHCardTpl');
$cName = $modx->getOption('companyName', $scriptProperties, $modx->getOption('site_name'));
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

$result = '';

$siteUrl = $modx->getOption('site_url');

if ($uid){

    // get user data
    
    $user = $modx->getObject('modUser', $uid);
    if (!$user) return '';
    $profile = $user->getOne('Profile');
    if (!$profile) return '';
    
    //photo preparations
    
    $photo = file_get_contents($siteUrl.$profile->get('photo'));
    $b64PhotoWithLines = chunk_split(base64_encode($photo), 74, "\n");
    $photo 	= preg_replace('/(.+)/', ' $1', $b64PhotoWithLines);
    
    // output parameters
    
    $params = array(
        'fullname'  => $profile->get('fullname'),
        'photo'     => !empty($photo) ? $photo : '',
        'image'     => $siteUrl.$profile->get('photo'),
        'address'   => $profile->get('address'),
        'city'      => $profile->get('city'),
        'zip'       => $profile->get('zip'),
        'state'     => $profile->get('state'),
        'phone'     => $profile->get('phone'),
        'fax'       => $profile->get('fax'),
        'email'     => $profile->get('email'),
        'website'   => $profile->get('website'),
        'country'   => $profile->get('country'),
        'company'   => $cName,
    );
    
    if ('hCard' == $mode){
        
        $result = $modx->getChunk($hTpl, $params);
        if (!empty($toPlaceholder)) {
            // If using a placeholder, output nothing and set output to specified placeholder
            $modx->setPlaceholder($toPlaceholder, $result);
            return '';
        }
        
    }else{ // vCard mode
    
        header('Content-Type: text/x-vcard');  
        header('Content-Disposition: inline; filename= "'.$vName.'"');  
        $result = $modx->getChunk($vTpl, $params);
        
    }  

    // By default just return output
    return $result;
    
}else{
    return false;
}