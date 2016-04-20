INSERT INTO week (
	SELECT date FROM generate_series( '2007-04-22'::date, 
	    '2016-04-19'::date, '7 days'::interval) date
);