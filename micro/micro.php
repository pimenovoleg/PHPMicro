<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 12/2/12
 * Time: 1:29 PM
 * To change this template use File | Settings | File Templates.
 */

session_start();

require(dirname(__FILE__) . '/core/SessionDB.php');
require(dirname(__FILE__) . '/core/Model.php');
require(dirname(__FILE__) . '/core/Controller.php');
require(dirname(__FILE__) . '/core/Respond.php');
require(dirname(__FILE__) . '/core/Request.php');

$sessionDB = new SessionDB();