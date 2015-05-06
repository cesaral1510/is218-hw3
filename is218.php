<?php
//id gets dets set after submittin form

class queriesSingleton{
	public static function getArray(){
		static $finalArray = null;
		if(null === $finalArray){
			$finalArray = new static;
			$finalArray = array("select employees.emp_no,last_name, first_name,salary from employees join (select * from salaries order by salary desc limit 1) as a on a.emp_no=employees.emp_no;",
				"select salaries.emp_no, first_name, last_name, salary, from_date from salaries join employees on employees.emp_no=salaries.emp_no where from_date between \"1981-01-01\" and \"1985-12-31\" order by salary desc limit 1;",
				"select dept_name, salaries.salary from dept_manager join salaries on dept_manager.emp_no = salaries.emp_no join departments on dept_manager.dept_no = departments.dept_no order by salary desc limit 1;",
				"select * from departments;",
				"select dept_manager.dept_no, dept_manager.emp_no, first_name, last_name,dept_name  from dept_manager join employees on dept_manager.emp_no=employees.emp_no join departments on departments.dept_no=dept_manager.dept_no where dept_manager.to_date='9999-01-01';",
				"select * from employees join salaries on employees.emp_no=salaries.emp_no order by salary desc limit 1;",
				"select * from employees join salaries on employees.emp_no=salaries.emp_no order by salary asc limit 1;",
				"select dept_no,count(*) Total_per_dept from employees join dept_emp on employees.emp_no=dept_emp.emp_no group by dept_no;",
				"select  dept_name, sum(salary) from employees  join dept_emp on employees.emp_no=dept_emp.emp_no join salaries on salaries.emp_no=dept_emp.emp_no join departments on departments.dept_no=dept_emp.dept_no  where salaries.to_date='9999-01-01' group by dept_emp.dept_no; ",
				"select sum(salary) Total_salary from salaries where to_date='9999-01-01';");

		}
		return $finalArray;

	}
}
class printer0{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:100%">';
		echo "<tr>";
		echo "<th>employee ID</th>";
		echo "<th>Last name</th>";
		echo "<th>First Name</th>";
		echo "<th>Salary</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row['emp_no']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['salary']."</td>";

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer1{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:100%">';
		echo "<tr>";
		echo "<th>employee ID</th>";
		echo "<th>Last name</th>";
		echo "<th>First Name</th>";
		echo "<th>Salary</th>";
		echo "<th>Date</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row['emp_no']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['salary']."</td>";
			echo "<td>".$row['from_date']."</td>";

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer2{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:50%">';
		echo "<tr>";
		echo "<th>Name of department</th>";
		echo "<th>Salary</th>";
		
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row['dept_name']."</td>";
			echo "<td>".$row['salary']."</td>";
			

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer3{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:50%">';
		echo "<tr>";
		echo "<th>Name of department</th>";
		echo "<th>Department Number</th>";
		
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row['dept_name']."</td>";
			echo "<td>".$row['dept_no']."</td>";
			

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer4{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:70%">';
		echo "<tr>";
		echo "<th>Name of department</th>";
		echo "<th>Department Number</th>";
		echo "<th>First name</th>";
		echo "<th>Last name</th>";
		
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row['dept_name']."</td>";
			echo "<td>".$row['dept_no']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer5{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:70%">';
		echo "<tr>";
		echo "<th>Emp ID</th>";
		echo "<th>Date of birth</th>";
		echo "<th>First Name</th>";
		echo "<th>Last name</th>";
		echo "<th>Salary</th>";


		
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row['emp_no']."</td>";
			echo "<td>".$row['birth_date']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['salary']."</td>";
			

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer6{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:70%">';
		echo "<tr>";
		echo "<th>Emp ID</th>";
		echo "<th>Date of birth</th>";
		echo "<th>First Name</th>";
		echo "<th>Last name</th>";
		echo "<th>Salary</th>";


		
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row['emp_no']."</td>";
			echo "<td>".$row['birth_date']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['salary']."</td>";
			

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer7{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:50%">';
		echo "<tr>";
		echo "<th>Dept ID</th>";
		echo "<th>Total employees per department</th>";
		


		
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row['dept_no']."</td>";
			echo "<td>".$row['Total_per_dept']."</td>";
			
			

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer8{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:50%">';
		echo "<tr>";
		echo "<th>Dept ID</th>";
		echo "<th>Total salary department</th>";
		


		
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>$".$row['dept_name']."</td>";
			echo "<td>$".$row['sum(salary)']."</td>";
			
			

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class printer9{

	function __construct(){
		
		
		$db=connectToDB();
		$sql = queriesSingleton::getArray()[$_REQUEST['selection']];
		
		if(!$result = $db->query($sql)){
			die('error'.$db->error);
		}
			
		echo '<table border="1" style="width:30%">';
		echo "<tr>";
		
		echo "<th>Total current salary</th>";
		


		
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>$".$row['Total_salary']."</td>";
		
			
			

			echo "</tr>";
		}
	echo "</table>";		
	}
}
class addEmployee{
	function __construct(){

	echo '<form action="is217.php" method="POST">';
	echo 'ID:<br>';
	echo '<input type="text" name="emp_no">';
	echo '<br>First name:<br>';
	echo '<input type="text" name="first_name">';
	echo '<br>';
	echo 'Last name:<br>';
	echo '<input type="text" name="last_name">';
	echo '<br><br>';
	echo 'Date of birth<br>';
	echo '<input type="date" name="birth_date">';
	echo '<br><br>';
	echo '<input type="radio" name="gender" value="M" checked>Male';
	echo '<br>';
	echo '<input type="radio" name="gender" value="F">Female';
	echo '<br><br>Hire Date<br>';
	echo '<input type="date" name="hire_date">';
	echo '<br><br>';
	echo "<input type='hidden' name='id' value='add'>";
	echo '<input type="submit" value="Submit">';

	echo '</form>'; 
	}
}
class editEmployees{
	function __construct(){
		$db = connectToDB();
		$qry = "select * from employees limit 5;";
		$result = $db->query($qry);
		echo "<table style=\"width:100%\">
		<tr>
		<td>EMP ID</td>
		<td>DOB</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Gender</td>
		<td>Hire Date</td>
		</tr>
		";
		while($row = $result->fetch_array()){
		echo "<tr>";
		
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "<td>".$row[4]."</td>";
		echo "<td>".$row[5]."</td>";
		
		echo '<form action="is217.php" method="POST">';
	
	echo '<td><input type="hidden" name="emp_no" value = '.$row[0].'></td>';
	echo '<td><input type="hidden" name="birth_date" value = '.$row[1].'></td>';

	echo '<td><input type="hidden" name="first_name" value = '.$row[2].'></td>';
	echo '<td><input type="hidden" name="last_name" value = '.$row[3].'></td>';
	echo '<td><input type="hidden" name="gender" value = '.$row[4].'></td>';

	
	echo '<td><input type="hidden" name="hire_date" value = '.$row[5].'></td>';
	echo '<td><input type="hidden" name="id" value ="modify"></td>';

	echo '<td><input type="submit" value="Edit"></td>';

	echo '</form>'; 



		echo "</tr>";
			
		}
		echo "</table>";
	}
}
class menu{

	public function __construct(){

		echo'<a href="?selection=0">Who is the highest paid employee?</a><br>';
		echo'<a href="?selection=1">Who is the highest paid employee between 1985 and 1981?</a><br>';
		echo'<a href="?selection=2">Which department currently has highest paid department manager?</a><br>';
		echo'<a href="?selection=3">What are the titles of all the departments?</a><br>';
		echo'<a href="?selection=4">Who are the current department heads?</a><br>';
		echo'<a href="?selection=5">Who is highest paid employee that is not a department head?</a><br>';
		echo'<a href="?selection=6"> Who is currently the lowest paid employee?(takes aroud 20 secs)</a><br>';
		echo'<a href="?selection=7"> How many employees currently work in each department?</a><br>';
		echo'<a href="?selection=8">How much does each department currently spend on salaries?</a><br>';
		echo'<a href="?selection=9">How much is currently spent for all salaries?</a><br>';
		echo'<a href="?selection=10">Click here to add an employee?</a><br>';
		echo'<a href="?selection=11">edit the last 5 employees?</a><br>';


	}

	

}
//id gets set when a form is submitted, 
if ($_POST['id']=="add") {
    addEmployee();
    $menu = new menu();
	}
elseif($_POST['id']=="modify"){
	
	modifyEmployeeEdit();
}
elseif($_POST['id']=="editSubmit"){
	
	submitEmployeeEdit();
	$menu = new menu();
}
//if id is not set, it displays the menu only
else{

	$menu = new menu();
	if($_REQUEST['selection'] ==10)
		$page = new addEmployee();
	elseif($_REQUEST['selection'] ==11)
		$page = new editEmployees();
	else{
		$Currentpage = "printer".$_REQUEST['selection'];
		$page = new $Currentpage();
	}
}
	





function connectToDB(){
		$db = new mysqli('localhost','root','','employees');
		if($db->connect_errno > 0){
			die('Unable to connect'. $db->connect_error);
		}
		else
			return $db;
	}
function addEmployee(){
	$db = connectToDB();
		$stmt = $db->prepare("INSERT INTO employees(emp_no,
            birth_date,
            first_name,
            last_name,
            gender,
            hire_date) VALUES (?,?,?,?,?,?)");
	
		$stmt->bind_param('ssssss', $_POST['emp_no'],
		$_POST['birth_date'],
		$_POST['first_name'],
		$_POST['last_name'],
		$_POST['gender'],
		$_POST['hire_date']);
		
		
			
			$stmt->execute();
			echo"The empploye has been added<br>";
	
	}
function modifyEmployeeEdit(){

	echo '<form action="is217.php" method="POST">';
	echo 'EMP ID<br>';
	echo '<input type="text" name="emp_no" value = '.$_POST['emp_no'].'><br>';
	echo 'DOB<br>';
	echo '<input type="text" name="birth_date" value = '.$_POST['birth_date'].'><br>';
	echo 'First NAme<br>';

	echo '<input type="text" name="first_name" value = '.$_POST['first_name'].'><br>';
	echo 'Last Name<br>';
	echo '<input type="text" name="last_name" value = '.$_POST['last_name'].'><br>';
	echo 'Gender<br>';
	echo '<input type="text" name="gender" value = '.$_POST['gender'].'><br>';
	echo 'Hire Date<br>';

	
	echo '<input type="text" name="hire_date" value = '.$_POST['hire_date'].'><br>';
	echo '<input type="hidden" name="id" value ="editSubmit"><br>';

	
	echo '<input type="submit" value="submit">';

	echo '</form></tr>'; 
}

function submitEmployeeEdit(){
	$db = connectToDB();
	$stmt = $db->prepare("UPDATE employees SET 
			emp_no=?, 
			birth_date=?, 
			first_name=?, 
			last_name=?, 
			gender=?, 
			hire_date=?

			WHERE emp_no=?");
		
	$stmt->bind_param('ssssssi', $_POST['emp_no'],
	$_POST['birth_date'],
	$_POST['first_name'],
	$_POST['last_name'],
	$_POST['gender'],
	$_POST['hire_date'],
	$_POST['emp_no']);
			
			
				
	$stmt->execute();
	echo"The empploye has been Modified<br>";
		
}



?>