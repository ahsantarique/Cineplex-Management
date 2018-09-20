DROP TRIGGER IF EXISTS  `limit_seat` ;

CREATE DEFINER =  `root`@`localhost` TRIGGER `limit_seat` BEFORE UPDATE ON  `ticket` FOR EACH ROW BEGIN DECLARE MSG VARCHAR( 250 ) ;

DECLARE N INT;

DECLARE C CURSOR FOR SELECT MAX( cnt ) 
FROM (

SELECT COUNT( * ) CNT
FROM ticket
GROUP BY T_ID, SHOW_DATE
)T;

OPEN C;

FETCH C INTO N;

IF N >30 THEN CALL my_signal(
'Error: invalid_id_test; Id must be a positive integer'
);

END IF ;

CLOSE C;

END
