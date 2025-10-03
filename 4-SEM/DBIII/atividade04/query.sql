create function loopTo(n int) returns int[] as $$
declare
    sum int := 0;
    response int[] := '{}';
begin
    while sum < n loop
      if sum % 2 = 0 then
        response := ARRAY_APPEND(response, sum);
      end if;

      sum := sum + 1;
    end loop;

    return response;
end;
$$ language plpgsql;

select loopTo(5); -- {0,2,4}

---

create function multiplicationTable(n int) returns table(num int, multiplier int, result int) as $$
declare
    sum int := 1;
begin
    while sum <= 10 loop
      return query select n as num, sum as multiplier, n * sum as result;
      sum := sum + 1;
    end loop;
end;
$$ language plpgsql;

select * from multiplicationTable(5);
-- num | multiplier | result
-- ----+------------+--------
--  5 |          1 |      5
--  5 |          2 |     10
--  5 |          3 |     15
--  5 |          4 |     20 
--  5 |          5 |     25
--  5 |          6 |     30
--  5 |          7 |     35
--  5 |          8 |     40
--  5 |          9 |     45
--  5 |         10 |     50