create function funcExtenso (num int) returns varchar(100) as $$
begin
    if num = 1 then
        return 'um';
    elseif num = 2 then
        return 'dois';
    elseif num = 3 then
        return 'tres';
    elseif num = 4 then
        return 'quatro';
    elseif num = 5 then
        return 'cinco';
    elseif num = 6 then
        return 'seis';
    elseif num = 7 then
        return 'sete';
    elseif num = 8 then
        return 'oito';
    elseif num = 9 then
        return 'nove';
    elseif num = 10 then
        return 'dez';
    else 
        return 'numero fora do intervalo';
    end if;
end;
$$ language plpgsql;

select funcExtenso(5); -- cinco
select funcExtenso(10); -- dez
select funcExtenso(11); -- numero fora do intervalo
select funcExtenso(0); -- numero fora do intervalo

---

create function somaTres(a int, b int, c int) returns int as $$
begin
    return a + b + c;
end;
$$ language plpgsql;

select somaTres(1, 2, 3); -- 6

---

create function funcConcact(str1 varchar, str2 varchar) returns varchar as $$
begin
    return str1 || ' - ' || str2;
end;
$$ language plpgsql;

select funcConcact('Hello', 'World'); -- Hello - World

---

create function funcLength(str1 varchar, str2 varchar) returns int as $$
begin
    return length(str1) + length(str2);
end;
$$ language plpgsql;

select funcLength('Hello', 'World'); -- 10

---

create function funcUpper(str1 varchar, str2 varchar) returns varchar as $$
begin
    return upper(str1) || ' ' || upper(str2);
end;
$$ language plpgsql;

select funcUpper('Hello', 'World'); -- HELLO WORLD

---

create function funcMedia(a int, b int) returns float as $$
begin
    return (a + b) / 2.0;
end;
$$ language plpgsql;

select funcMedia(4, 6); -- 5.0

---

create funcIdade(idade int) returns varchar as $$
begin
    if idade <= 7 then
        return 'Infantil A';
    elseif idade <= 10 then
        return 'Infantil B';
    elseif idade <= 13 then
        return 'Juvenil A';
    elseif idade <= 17 then
        return 'Juvenil B';
    else
        return 'Adulto';
    end if;
end;
$$ language plpgsql;

select funcIdade(6); -- Infantil A
select funcIdade(9); -- Infantil B
select funcIdade(12); -- Juvenil A
select funcIdade(15); -- Juvenil B
select funcIdade(20); -- Adulto