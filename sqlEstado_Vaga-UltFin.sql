SELECT tg.vagas.estvaga, TIME_FORMAT(tg.vagas.hrentrada, '%H:%i') AS hrentrada, TIME_FORMAT(tg.vagas.hrsaida, '%H:%i') AS hrsaida FROM tg.vagas where pkvaga>=13
SELECT * FROM (select * FROM tg.nfvagas RIGHT JOIN tg.vagas on tg.nfvagas.fkusuario = 1 and tg.vagas.pkvaga = tg.nfvagas.fkusuario)
tg.vagas.estvaga,  TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i')AS entrada, TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i')AS saida
select tg.vagas.estvaga, TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i') AS hrentrada, TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i') AS hrsaida FROM tg.nfvagas LEFT JOIN tg.vagas on tg.nfvagas.fkusuario = 1 and tg.vagas.pkvaga = tg.nfvagas.fkvaga
select tg.vagas.pkvaga, tg.vagas.estvaga, hrentrada, hrsaida FROM (select TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i') AS hrentrada, TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i') AS hrsaida from nfvagas) as NF, tg.vagas
select tg.vagas.pkvaga, tg.vagas.estvaga, hrentrada, hrsaida FROM (select TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i') AS hrentrada, TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i') AS hrsaida from nfvagas WHERE TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i') = ) as NF, tg.vagas
select DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d') from tg.nfvagas
select CURRENT_DATE() 


select (TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i')) as hrentrada, (TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i')) as hrsaida FROM nfvagas where CURRENT_DATE() = ( select DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d'))
select * FROM vagas where vagas.pkvaga != (select tg.nfvagas.fkvaga from nfvagas where CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d'));
-- retorna as vagas que não foram reservadas para o dia atual ou foram reservadas para outro dia
select tg.nfvagas.fkvaga, (TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i')) as hrentrada, (TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i')) as hrsaida from nfvagas where CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d')
-- Retorna o vbalores das vagas que foram reservadas para o dia atual 
select *, (select * FROM vagas where vagas.pkvaga != (select tg.nfvagas.fkvaga from nfvagas where CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d'))) from (select tg.nfvagas.fkvaga, (TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i')) as hrentrada, (TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i')) as hrsaida from nfvagas where CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d')) as nfvagasD where vagasD.pkvaga<23





SELECT tg.nfvagas.fkvaga, (TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i')) AS hrentrada, (TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i')) AS hrsaida, vagas.estvaga
		FROM nfvagas FULL OUTER join vagas
		ON CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d');
		
		
		
SELECT tg.nfvagas.fkvaga,  tg.vagas.estvaga, (TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i')) AS hrentrada, (TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i')) AS hrsaida 
		FROM nfvagas, vagas 
		exists CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d')
		
		
		
		
		
		SELECT tg.nfvagas.fkvaga, tg.vagas.estvaga, (TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i')) AS hrentrada, (TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i')) AS hrsaida 
		FROM nfvagas, vagas
		WHERE CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d')	
-- retorna as vagas que não foram reservadas para o dia atual ou foram reservadas para outro dia
union(
SELECT tg.vagas.pkvaga, tg.vagas.estvaga, 'null', 'null'
		FROM vagas 
		WHERE vagas.pkvaga NOT IN (
		SELECT tg.nfvagas.fkvaga 
				FROM nfvagas 
				WHERE CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d'))  GROUP by tg.vagas.pkvaga)) AS T GROUP by T.fkvaga;
		
		
		
		
		
		
		
		
		-- ------------------------------------------------
	
SELECT * FROM (
		SELECT tg.nfvagas.fkvaga, tg.vagas.estvaga, (TIME_FORMAT(tg.nfvagas.dthrentrada, '%H:%i')) AS hrentrada, (TIME_FORMAT(tg.nfvagas.dthrsaida, '%H:%i')) AS hrsaida 
				FROM nfvagas, vagas
				WHERE CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d')	
-- retorna as vagas que não foram reservadas para o dia atual ou foram reservadas para outro dia
		union(
				SELECT tg.vagas.pkvaga, tg.vagas.estvaga, 'null', 'null'
						FROM vagas 
						WHERE vagas.pkvaga NOT IN (
						SELECT tg.nfvagas.fkvaga 
								FROM nfvagas 
								WHERE CURRENT_DATE() = DATE_FORMAT(tg.nfvagas.dthrentrada, '%Y-%m-%d'))  GROUP by tg.vagas.pkvaga)) AS T GROUP by T.fkvaga;