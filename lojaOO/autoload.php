<?php
function customAutoload($className) {
    require_once("class/".$className.".php");
}