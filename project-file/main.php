<?php
ini_set('memory_limit', '1048M');
ini_set('max_execution_time', 300);  
require_once("../test2/src/randomdata.php");
include_once("../test2/src/option.php");
if(isset($_POST['record_no'])){
   $record_no  = $_POST["record_no"];
} 

function getMemoryUsage(){

  return memory_get_peak_usage(true) / 1024 / 1024; // MiB
}

$fullName = array();
$data = array();
$count = 0;
while($count < $record_no){

    $count++;
    $firstname 			= RandomData::getFirstName();
    $initials  			= RandomData::getInitial($firstname);
    $lastname 	 		= RandomData::getLastName();   
    $dob   				  = RandomData::getRandomDate(4,50, 'm/d/Y');
    $age 				    = RandomData::getAge($dob);

    $fullName[$count]   = $firstname.",".$lastname.",".$initials.",".$age.",".$dob;
    $data[]             = explode(',',$fullName[$count]);

}
// call array to csv 
RandomData::arrayToCsv($data);

?>

Assignment 3
a.) Which students registered after 31-Jul-11, show the student number, course and grade
    SELECT student_number, course, grade
    FROM students
    WHERE ondate > '2011-07-31';

b.) Write a meaningful where clause illustrating the operators IN, BETWEEN, LIKE, IS NULL, EXISTS, in use e.g. which students still don't have a grade for CSC312: 
    SELECT *
    FROM students
    WHERE course IN ('mat101','sta100') or
        course LIKE '___1__' or
        grade BETWEEN 0 and 50 or
        grade IS NULL or

    SELECT DISTINCT course
    FROM registration R1
    WHERE EXISTS (
        SELECT * FROM registration R2
        WHERE R2.student_number = R1.student_number
        and R2.course <> R1.course
    )
    
c.) Which students are taking subjects which require 30 or more credits. (hint use a subquery in the where clause). Order the results by credits in descending order.
Sorry my bad on this question, I meant order by student_number desc (I'll give marks if I see an order by:)

    SELECT student_number
    FROM students
    WHERE course IN (
      select code
      from course
      where credits >= 30
    )
    ORDER BY student_number DESC

d.) Combinations of subject in same dept, that would be like, e.g. MAT101, STA100, in Mat department

    SELECT C1.code AS Subj1, C2.code AS Subj2, C1.dept AS Department
    FROM course C1, course C2
    WHERE C1.dept = C2.dept AND
          C1.code < C2.code

e.) Return a list of the departments. The list should be unique i.e. there should be no duplicates.

    SELECT distinct code
    FROM department

f.) Return a list for a report of:
    student numbers, 
    the courses they have taken and passed (50% is a pass), 
    the credits for the course and the departments name not it's code.

    SELECT  student_number AS StudentNumber, 
            c.code AS CourseCode, c.descr AS CourseDescription, c.credits AS Credits,
            D.descr AS Department
    FROM registration R, course C, department D 
    WHERE R.grade >= 50 AND
          R.course = C.code AND
          C.dept = D.code

g.) Return a list of subjects which have another subject in the same department (hint use a subquery)
    SELECT code
    FROM course C1
    WHERE EXISTS ( SELECT code
                   FROM course C2
                   WHERE C1.code <> C2.code AND
                         C1.dept = C2.dept
                  )
    The outer query runs through each subject in the course table, 
    The inside query runs through the course table and checks 
    if there is a subject in the same dept i.e. C1.dept = C2.dept
    and that the code is not equal to the current C1.code, i.e. C1.code <> C2.code.
    That is, is there another different subject in the same department.
    Think of the outside select as a for loop that runs through all its rows,
    The inside is a query on each of those rows. If there is a match it would return a 
    value. This is where the EXISTS checks was something returned. If yes, it will
    return the code for that row, otherwise it will continue to the next row.

h.) Which students have never taken a course from the Mat department?                                                                     
    SELECT student_number
    FROM registration R
    WHERE student_number NOT IN (
        SELECT student_number
        FROM registration R
        WHERE course in ( SELECT code
                          FROM course
                          WHERE dept = 'Mat' 
                        )
        )

    The innermost query finds all course coudes in the Mat department.
    The next inner query finds students who take one of those codes.
    The outer query finds students that are not in that list of students who take a 
    course in mats.
    Be careful that you don't just directly ask 'where code not in mat dept.
    A student could well have some subjects not in Mat, ontop of their Mat subjects.