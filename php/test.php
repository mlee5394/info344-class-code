Hey this is some content above the code
<<<<<<< HEAD

<?php
// variables are loosely-typed
// aren't declared as a datatype
// php requires every variable to begin with $
// started from Perl
$name = 'Dave';

// string concatenation is a .
$fullName = $name . 'Stearns';

class Person {
	protected $name;
	
	// normally for constructs, you use a . to address it, but for php you use $this->variablename = $whatever
	public function __construct($n) {
		$this->name = $n;
	}
	
	public function getName() {
		return $this->name;
	}
}

function foo($bar) {
	echo "Hey this is the foo fighting function\n";
}

// single quotes and double quotes matter
// double quotes php will look inside the string and create substitutions
// echo is like print into terminal
// variables that need to be called out can be put in brackets
echo "Hello {$name}s\n";
foo(NULL);
?>

And this is some content below
=======
<?php
$name = 'Dave';
$fullName = $name . 'Stearns';

class Person {
    protected $name;
    
    public function __construct($n) {
        $this->name = $n;
    }
    
    public function getName() {
        return $this->name;
    }
}

function foo($bar) {
    echo "Hey this is the foo fighting function\n";
}

echo "Hello {$name}s\n";
foo(NULL);
?>
And this is some content below
>>>>>>> 278f399a03f67ccb40c80ec9fe59b166249f0dbb
