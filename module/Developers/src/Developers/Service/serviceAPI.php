<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 17/11/2017
 * Time: 12:37
 */

class serviceAPI
{
    protected $jsonContent = null;

    public function __construct()
    {
        $this->jsonContent = file_get_contents(__DIR__ . '/../../../data/employees.json');
    }

    public function getEmployeesBySalary($minSalary, $maxSalary)
    {
        $decodedContent = json_decode($this->jsonContent, true);

        $employees = [];

        foreach ($decodedContent as $employee)
        {
            $salary = str_replace(',', '', $employee['salary']);
            $salary = str_replace('$', '', $salary);
            $salary = floatval($salary);
            if ($minSalary <= $salary && $salary <= $maxSalary) {
                $employees[] = $employee;
            } else {
                $filtered = $decodedContent;
            }
        }

        return $employees;
    }
}