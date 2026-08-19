<?php

class Employee
{
    public $empID;
    public $name;
    public $salary;

    function __construct($empID, $name, $salary)
    {
        $this->empID = $empID;
        $this->name = $name;
        $this->salary = $salary;
    }

    function displayEmployee()
    {
        echo "Employee ID: " . $this->empID . "<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Salary: Rs. " . $this->salary . "<br><br>";
    }
}

$employee1 = new Employee(101, "Emon", 98873);
$employee2 = new Employee(102, "Jenish", 20203);
$employee3 = new Employee(103, "Saman", 66673);

$employee1->displayEmployee();
$employee2->displayEmployee();
$employee3->displayEmployee();

?>