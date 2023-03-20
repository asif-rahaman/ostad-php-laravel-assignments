<?php
/*
Assignment Name: SQL Commands Assignment



Description:

In this assignment, you will be working with a fictional database of a 
company named "XYZ Corp." 
The database contains two tables, employees and departments. 
Your task is to write SQL commands to retrieve and manipulate data from these tables.



Instructions:


Use the employees table to answer the following questions:

The foolowing Query is to  Create the database and the 'departments' and 'epmployees' tables

    CREATE DATABASE db_ostad_xyz_corp;

    USE db_ostad_xyz_corp;

    CREATE TABLE departments (
        department_id INT PRIMARY KEY,
        department_name VARCHAR(50),
        department_manager VARCHAR(50)
    );

    CREATE TABLE employees (
        employee_id INT PRIMARY KEY,
        employee_name VARCHAR(50),
        employee_age INT,
        employee_salary DECIMAL(10,2),
        department_id INT,
        FOREIGN KEY (department_id) REFERENCES departments(department_id)
    );



a. Write a query to select all columns and rows from the employees table.

Ans:   SELECT * FROM employees;

  This query selects all the data from employees table 


b. Write a query to select only the name and salary columns of all employees with a salary greater than 50000.

Ans:     
    SELECT employee_name, employee_salary
    FROM employees
    WHERE employee_salary > 50000;


c. Write a query to calculate the average salary of all employees.

Ans:    SELECT AVG(employee_salary) AS average_salary
        FROM employees;


d. Write a query to count the number of employees who work in the "Marketing" department.

Ans:    SELECT COUNT(*) AS num_employees
        FROM employees
        WHERE department_id IN (
            SELECT department_id FROM departments WHERE department_name = 'Marketing'
        );


e. Write a query to update the salary column of the employee with an id of 1001 to 60000.

Ans:     UPDATE employees
         SET employee_salary = 60000
         WHERE employee_id = 1001;


f. Write a query to delete all employees whose salary is less than 30000.

Ans:     DELETE FROM employees
         WHERE employee_salary < 30000;

 


Use the departments table to answer the following questions:


a. Write a query to select all columns and rows from the departments table.

Ans:    SELECT *
        FROM departments;


b. Write a query to select only the name and manager columns of the "Finance" department.

Ans:    SELECT department_name, department_manager
        FROM departments
        WHERE name = 'Finance';


c. Write a query to calculate the total number of employees in each department.

Ans:    SELECT departments.department_name, COUNT(employees.employee_id) AS total_employees
        FROM departments
        LEFT JOIN employees ON departments.department_id = employees.department_id
        GROUP BY departments.department_name;


d. Write a query to insert a new department called "Research" with a manager named "John Doe".

Ans:      INSERT INTO departments (department_name, department_manager)
          VALUES ('Research', 'John Doe');


 
