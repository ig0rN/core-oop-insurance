<?php

class Input {

    public static function exist($type) {
      switch ($type) {
          case 'post':
              return (!empty($_POST)) ? true : false;
          break;
          case 'get':
              return (!empty($_GET)) ? true : false;
          break;
          default:
              return false;
          break;
      }
    }

}
