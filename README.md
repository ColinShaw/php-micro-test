# PHP MicroTest

This is an incredibly small and not very featureful testing framework for 
cases when you want to perform tests but don't want to mess around with
things like PHPUnit.  Or when you wonder what is so special about other testing
tools and would like to see an extremely simple alternative.



## How To Use It

First, create some code that does something.  It has to be a class and it 
has to be able to be extended.  Something like this:

```
<?php

    class Stuff {
    
        protected function do_stuff($a, $b) {
            return $a + $b;
        }
    
    }
```

Since it has to be able to be extended, your otherwise `private` methods will 
need to be `protected`.  The reason for this approach is both modularity and 
because PHP's reflection generally is not so great.  Next, you need to create 
a test class that extends the `Stuff` class and has `MicroTest` accessible:

```
<?php

    include 'stuff.php';
    include 'micro_test.php';

    class Tests extends Stuff {
   
       public function __construct() {
           parent::__construct();
           MicroTest::start();
           $this->TestDoStuff();
           MicroTest::finish();
       }
       
       private function TestDoStuff() {
           MicroTest::test_equal('Doing Stuff', $this->do_stuff(1,2), 3);
       }
   
    }
    
    (new Tests());
```

See, you just write assertions surrounded by an initializer and a finalizer.  And 
you could look at the code and find that it would be extremely easy to extend the 
assertion functionality to include many other things.  Like catching and reporting errors.
Or generate artificial testing components.  But for the simple stuff, testing 
that something did exactly as expected, it might even suffice as is.  And all in slightly 
under 1100 bytes and 40 lines.
