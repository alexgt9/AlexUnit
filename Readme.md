# Testing 
## We are not as smart as we think so:
* We are the worst testing our own code. We may forget corner cases.
* We usually test our code as a whole, instead of testing small parts. Parts should work independently.
* To check if everything works fine takes forever, and most importantly, it takes more and more as the project grows.

## Unit Test must be
*Isolated*: It does not depend on other classes or components
*Repeatable*: no side effects, no time consuming
*Self documented*: descriptive names are the key

## Parts
### Arrange     
Set up everything you need to test a functionality
### Act         
Execute the System Under Test (SUT)
### Assert  
Checks that everything went as expected

## Mocks
Mocks are not the same as doubles

* *Dummy* objects are passed around but never actually used. Usually they are just used to fill parameter lists.

* *Fake* objects actually have working implementations, but usually take some shortcut which makes them not suitable for production (an InMemoryTestDatabase is a good example).

* *Stubs* provide canned answers to calls made during the test, usually not responding at all to anything outside what's programmed in for the test.

* *Spies* are stubs that also record some information based on how they were called. One form of this might be an email service that records how many messages it was sent.

* *Mocks* are pre-programmed with expectations which form a specification of the calls they are expected to receive. They can throw an exception if they receive a call they don't expect and are checked during verification to ensure they got all the calls they were expecting.

https://martinfowler.com/bliki/TestDouble.html

[Doubles examples](Doubles.php)

### What can a method do? 
* NOT -Modify internal state-   Not the final behavior
* NOT -Print Something- Probably should be delegated to other classes
* Return a value *(Assertions)*
* Throw exception *(Assertions)*
* Delegate *(Doubles)*


## PHPUnit

Use a real library instead of build your own please https://phpunit.de/ 

[PHPUnit Cheat-Sheet](PHPUnit-Cheat-Sheet.pdf)
