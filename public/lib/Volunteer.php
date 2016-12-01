<?php
ini_set('memory_limit', '256M');
class Volunteer
{
    public $php = 'Noemi","12/07/98","Harden Middle School", 123, 3.4,"813330111"';
    public function pop(){
        return $this->php;
    }
}
