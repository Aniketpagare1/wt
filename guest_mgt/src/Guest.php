<?php
class Guest
{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $visit_date;
    public $visit_time;

    public function __construct($id, $name, $email, $phone, $visit_date, $visit_time)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->visit_date = $visit_date;
        $this->visit_time = $visit_time;
    }
}
?>
