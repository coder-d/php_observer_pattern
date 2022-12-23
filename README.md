# php_observer_pattern
The Honey Bird Code       

Write an application using good object orientated principles to simulate a honey bird feeding on nectar of flowers during daytime.  

Requirements

The observer pattern must be used to open and close the flowers and tell the honeybird it is time to feed.  
The honeybird and the flowers will be observers of the sun's on and off state.
The sun will stay on for 12 counts and off for 12 counts, ie. the flowers will be OPEN for 12 counts and the honey bird can feed for 12 counts, the other 12 counts the honeybird will sleep and the flowers will be closed. The sun should keep a global counter, so that we can measure the counts.
There should be 3 events : onDayStart, onDayEnd, onHourChange (change the flower that the bird feeds on). The honey bird will feed on a different flower every hour, so the honey bird can feed on 12 flowers in a day. The flowers do not need to do anything on the onHourChange event, the implementation can be left blank.
There are 10 flowers and they can only be fed on 10 times by the honey bird.   Once a flower cannot be fed on, the honey bird will immediately try another flower.  NOTE: each flower = 10 visits but each visit must be at a different time
The honey bird will always randomly pick which flower to feed on.
The flowers will remember their state from day to day.  So it will keep their feeding counts until the next day, so the flower will be empty after a few days of feeding.
The application will exit when there is no more nectar in any flower.
No timer needs to be used, the application can simply run and complete as fast as possible.
Print the results, as the application runs to file or console in the following fashion (count in parenthesis : 
        

------------------------------------------------
        DAY START (0)

        HOUR CHANGE (0)
        FLOWER-4 (9)

        HOUR CHANGE (1)
        FLOWER-8 (9)

        HOUR CHANGE (2)
        FLOWER-3 (9)

        HOUR CHANGE (3)
        FLOWER-4 (8)  <-- note, it randomly changed to the flower already visited.

        ...
        ...
        ...

        DAY END (11)

        HOUR CHANGE (11)
        SLEEP
        HOUR CHANGE (12)
        SLEEP
        HOUR CHANGE (13)

        ...
        ...
        ...

        DAY START (0)

        HOUR CHANGE (0)
        FLOWER-3 (0) <-- flower is empty, immediately choose a new flower
        FLOWER-4 (3)

        HOUR CHANGE (1)
        FLOWER-5 (6)

        HOUR CHANGE (2)
        FLOWER-2 (1)


        ...
        ...
        ...

        DAY END (23)

        ...
        ...
        ...

        EXIT (1233) <-- the total count that the application ran for.

— In the test sample run, after first feed flower count is shown as FLOWER-3(9)
which means FLOWER-2(0) would be the last call for the flower, so it will not show 
as mentioned FLOWER-2 (0) <-- flower is empty, immediately choose a new flower
as after last fed FLOWER-2 (0)  flower 2 is removed from the available flower list
So  the format will be 

HOUR CHANGE(3)
FLOWER -2 (0) (this means it was the last time it was fed and after than the counter came down to 0)
Since Honey Bird has fed in hour 3 the next request will be in hour 4

HOUR CHANGE (4)
FLOWER -4 (6)


— I have not used auto load for the code, so the app can be run using /src/ObserverDriver.php
— The test cases are in /tests, they use autoload so composer needs to be run before running the test cases
— tests can be run using command ./vendor/bin/phpunit
