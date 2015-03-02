<?php

/**
* Alex unit run your tests
*/
class AlexUnit{
	
	private $testingClass;
	private $reflection;

	public function __construct($className)
	{
		$fileName = __DIR__ . "/${className}.php";
		if(!is_readable($fileName)){
			throw new InvalidArgumentException("The class doesn't exists");
		}

		require $fileName;
		$this->testingClass = $className;
		$this->reflection = new ReflectionClass($className);
	}

	public function run(){
		$test = new $this->testingClass;
		$methods = $this->reflection->getMethods(ReflectionMethod::IS_PUBLIC);

		try {
			$count = 0;
			foreach ($methods as $method) {
				$count++;
				$method->invoke($test);
			}
			echo "\033[01;32m All Test passed!! Number of tests ${count}\033[0m\n";		
		} catch (TestFailException $e) {
			echo "\033[01;31m " . $e->getMessage() . "\033[0m\n";		
		}
	}
}

class TestFailException extends Exception{}


if (!isset($argv[1])) {
	echo <<<HELP
You need to especify the test name.

USAGE:

php AlexUnit.php <class_name>

Params:
	Class Name: The name of the test class to run. 

HELP;
	exit;
}

$alexUnit = new AlexUnit($argv[1]);
$alexUnit->run();