<? php
--AULA DE BASE DE DADOS
			-- 	SELECT aluno.Id_Aluno, aluno.Nome_Aluno, turma.Id_Turma, turma.Nome_Turma
			-- 	FROM aluno
			-- 	INNER JOIN turma ON (turma.Id_Turma = aluno.Id_Turma)
			-- 	WHERE turma.Id_Turma = 1

			-- 	SELECT cliente.Nomec, extract(Month from date(data))
			-- 	from pedido
			-- 	INNER JOIN cliente ON (cliente.cod_cliente = pedido.cod_cliente)
			-- 	where cliente.Nomec = "Inacio";

			-- 	SELECT cliente.Nomec, count(pedido.cod_cliente)
			-- 	from pedido
			-- 	INNER JOIN cliente ON (cliente.cod_cliente = pedido.cod_cliente)
			-- 	where cliente.Nomec = "Iracelma";

--Inserir Cursos
	Insert into curso (Nome_Curso, Sigla) values ("Ciencias Economicas e Juridicas", "CEJ");
	Insert into curso (Nome_Curso, Sigla) values ("Ciencias Fisicas e Biologicas", "CFB");
	Insert into curso (Nome_Curso, Sigla) values ("Ciencias Humanas", "CH");
	

--Inserir Disciplinas
	insert into disciplina (Nome_Disciplina, Sigla, ano) values ("Introdução a Economia", "IntroEconomia", 10);

	insert into disciplina (Nome_Disciplina, Sigla, ano) values ("Introdução a Direito", "IntroDireito", 10);

	insert into disciplina (Nome_Disciplina, Sigla, ano) values ("Matemática", "Mat", 10);

	insert into disciplina (Nome_Disciplina, Sigla, ano) values ("Lingua Portuguesa", "LP", 10);

	insert into disciplina (Nome_Disciplina, Sigla, ano) values ("Inglês", "Ing", 10);

	insert into disciplina (Nome_Disciplina, Sigla, ano) values ("História", "Hist", 10);

	insert into disciplina (Nome_Disciplina, Sigla, ano) values ("Psicologia", "pscol", 10);

--Relacao Disciplina - Curso
	insert into disciplina_curso values (1, 1, 10);

	insert into disciplina_curso values (1, 2, 10);

	insert into disciplina_curso values (1, 3, 10);

	insert into disciplina_curso values (1, 4, 10);

	insert into disciplina_curso values (1, 5, 10);

	insert into disciplina_curso values (1, 6, 10);

	insert into disciplina_curso values (1, 7, 10);

			SELECT Nome_Curso, disc.Nome_Disciplina from curso c join disciplina_curso b on (c.idCurso = b.idCurso) join disciplina disc on (b.idDisciplina = disc.idDisciplina) where b.ano = 10
			SELECT disc.Nome_Disciplina from curso c join disciplina_curso b on (c.idCurso = b.idCurso) join disciplina disc on (b.idDisciplina = disc.idDisciplina) where b.ano = 10 and b.idCurso = 1


--select Nome_Curso, Nome_Disciplina from curso curs JOIN disciplina disc on (curs.idCurso = disc.idDisciplina);

	--select Nome_Curso, disc.Nome_Disciplina from curso curs join disciplina_curso dc on (curs.idCurso = dc.idDisciplina) join disciplina disc on (disc.idDisciplina = dc.idDisciplina);

SELECT Nome_Curso, disc.Nome_Disciplina from curso c join disciplina_curso b on (c.idCurso = b.idCurso) join disciplina disc on (b.idDisciplina = disc.idDisciplina)


--insert into professor values ("Anderson", "1997-06-11", "Licenciado", "00589178255LA048", "Dr. Antonio Agostinho Neto", "Bairro Azul", "Ingombotas", "Luanda");

--CRIACAO DE TABELAS
		--Tabela Telefone
			create table telefone(idTelefone int(10) auto_increment primary key, telefone1 int(10), telefone2 int(10), telefone3 int(10), idProfessor int(10) references professor(idProfessor);
		--Tabela Curso
			create table curso (Id_Curso int(10) auto_increment primary key, Nome_Curso varchar(40) not null, Sigla varchar(20) not null);

		--Tabela Sala
			create table sala (Id_Sala int(10), Numero_Sala int(10), Capacidade_Sala int(10), Id_Curso int(10) references curso(Id_Curso));
		--Tabela Turma
			create table turma (Id_Turma int(10), Nome_Turma varchar(40), Id_Sala int(10) references sala(Id_Sala));
			--create table turma (Id_Turma int(10), Nome_Turma varchar(40), Id_Sala int(10) references sala(Id_Sala), Id_Ano int(10) references ano(Id_Ano));

		--Tabela Ano
			create table ano (Id_Ano int(10) auto_increment primary key, Nome_Ano varchar(40));

		--Tabela Disciplina
			create table disciplina(Id_Disciplina int(10) auto_increment primary key, Nome_Disciplina varchar(40) not null, Sigla varchar(20) not null);

		--Tabela Professor
			create table professor (Id_Professor int(10), Nome_Professor varchar(40), Grau_Academico varchar(40), Provincia varchar(40));

		--Tabela Curso_Disciplina
			create table curso_disciplina (Id_Curso_Disciplina int(10) auto_increment primary key, Id_Curso int(10) references curso(Id_Curso), 
				Id_Disciplina int(10) references disciplina(Id_Disciplina), Cod_Disciplina varchar(20), 
				Id_Ano int(10) references ano(Id_Ano));

		--Tabela Professor_Curso_Disciplina
			create table professor_curso_disciplina(Id_Professor_Curso_Disciplina int(10), Id_Professor int(10), Id_Curso_Disciplina int(10), Id_Turma int(10) references turma(Id_Turma));
				create table professor_curso_disciplina(Id_Professor_Curso_Disciplina int(10) auto_increment primary key, 
					Id_Professor int(10) references professor(Id_Professor), Id_Curso_Disciplina int(10) references curso_disciplina(Id_Curso_Disciplina), 
					Id_Turma int(10) references turma(Id_Turma));
				-- create table professor_curso_disciplina(Id_Professor_Curso_Disciplina int(10), Id_Professor int(10), Id_Curso_Disciplina int(10));

		--Tabela Aluno
			create table aluno(Id_Aluno int(10), Nome_Aluno varchar(40), Provincia varchar(40), Id_Turma int(10) references turma(Id_Turma));

		--Tabela Trimestre
			create table trimeste (Id_Trimestre int(10), Nome_Trimestre varchar(20));

		--Tabela Trimestre_Curso_Disciplina
			create table trimestre_curso_disciplina (Id_Trimestre_Curso_Disciplina int(10), Id_Trimestre int(10) references trimestre(Id_Trimestre), Id_Curso_Disciplina int(10) references curso_disciplina(Id_Curso_Disciplina));


--INSERCAO DE DADOS
		--Inserir os cursos
			insert into curso (Nome_Curso, Sigla) values ("Ciências Econômicas e Jurídicas", "CEJ");
			insert into curso (Nome_Curso, Sigla) values ("Ciências Fisicas e Biológicas", "CFB");
			insert into curso (Nome_Curso, Sigla) values ("Ciências Humanas", "CH");
			insert into curso values (4, "Econômicas e Jurídicas", "EcoJuri");

		--Inserir as salas de uma escola
			insert into sala values (1, 1, 60, 1);
			insert into sala values (2,2,30,2);
			insert into sala values (3,3,40,3);
			insert into sala values (4,4,20,2);
			insert into sala values (5,5,60,3);

		--Inserir as turmas de uma escola
			insert into turma values (1,"CEJ10AM",1);
			insert into turma values (2,"CEJ11AM",1);
			insert into turma values (3,"CEJ12AM",1);
			insert into turma values (4,"CFB10AM",2);
			insert into turma values (5,"CFB11AM",2);
			insert into turma values (6,"CFB12AM",2);
				-- insert into turma values (1,"CEJ10AM",1,1);
				-- insert into turma values (2,"CEJ11AM",1,2);
				-- insert into turma values (3,"CEJ12AM",1,3);
				-- insert into turma values (4,"CFB10AM",2,1);
				-- insert into turma values (5,"CFB11AM",2,2);
				-- insert into turma values (6,"CFB12AM",2,3);

		--Inserir os professores de uma escola
			insert into professor values (1, "Luis", "Licenciado", "Luanda");
			insert into professor values (2, "Anderson", "Mestre", "Cabinda");
			insert into professor values (3, "Yussuf", "Doutorado", "Uige");

		--Inserir o nome dos Anos que uma escola pode ter
			insert into ano values(1,"10 Classe");
			insert into ano values(2,"11 Classe");
			insert into ano values(3,"12 Classe");
			insert into ano values(4," Classe");

		--Inserir Disciplinas
			insert into disciplina values(1, "Lingua Portuguesa", "LP");
			insert into disciplina values(2, "Matematica", "MAT");
			insert into disciplina values(3, "Ingles", "ING");
			insert into disciplina values(4, "Introdução a Economia", "IAE");
			insert into disciplina values(5, "Introdução a Direito", "IAD");
			insert into disciplina values(6, "Geográfia", "GEO");
			insert into disciplina values(7, "Historia", "HIST");
			insert into disciplina values(8, "Psicologia", "PSIC");
			insert into disciplina values(9, "Informática", "INF");
			insert into disciplina values(10, "Educação Física", "EDFIS");
			insert into disciplina values(11, "Filosofia", "FILO");
			insert into disciplina values(12, "Antopologia", "ANT");
			insert into disciplina values(13, "Desenvolvimento Economico Social", "DES");


		--Inserir Curso Disciplina 	Id_Curso, Id_Disciplina, Cod, Ano
			insert into curso_disciplina values (1,1,1, "CEJLP", 1);
			insert into curso_disciplina values (2,1,2, "CEJMAT", 1);
			insert into curso_disciplina values (3,1,3, "CEJING", 1);
			insert into curso_disciplina values (4,1,4, "CEJIAE", 1);
			insert into curso_disciplina values (5,1,5, "CEJIAD", 1);
			insert into curso_disciplina values (6,1,6, "CEJGEO", 1);
			insert into curso_disciplina values (7,1,7, "CEJHIST", 1);
			insert into curso_disciplina values (8,1,8, "CEJPSIC", 1);
			insert into curso_disciplina values (9,1,9, "CEJINF", 1);
			insert into curso_disciplina values (10,1,10, "CEJEDFIS", 1);

			insert into curso_disciplina values(11,1,5, "CEJIAE", 2);
			insert into curso_disciplina values(12,1,4, "CEJIAD", 2);
			insert into curso_disciplina values(13,1,2, "CEJMAT", 2);
			insert into curso_disciplina values(14,1,1, "CEJLP", 2);
			insert into curso_disciplina values(15,1,3, "CEJING", 2);
			insert into curso_disciplina values(16,1,6, "CEJGEO", 2);
			insert into curso_disciplina values(17,1,7, "CEJHIST", 2);
			insert into curso_disciplina values(18,1,11, "CEJFILO", 2);
			insert into curso_disciplina values(19,1,8, "CEJPSIC", 2);
			insert into curso_disciplina values(20,1,10, "CEJEDFIS", 2);

			insert into curso_disciplina values(21,1,5, "CEJIAE", 3);
			insert into curso_disciplina values(22,1,4, "CEJIAD", 3);
			insert into curso_disciplina values(23,1,1, "CEJLP", 3);
			insert into curso_disciplina values(24,1,3, "CEJING", 3);
			insert into curso_disciplina values(25,1,7, "CEJHIST", 3);
			insert into curso_disciplina values(26,1,12, "CEJANTO", 3);
			insert into curso_disciplina values(27,1,13, "CEJDES", 3);
			insert into curso_disciplina values(28,1,11, "CEJFILO", 3);
			insert into curso_disciplina values(29,1,6, "CEJGEO", 3);
			insert into curso_disciplina values(30,1,10, "CEJEDFIS", 3);
			



			
			insert into curso_disciplina values(3,1,1, "CEJLP", 3);

			
			insert into curso_disciplina values(5,1,2, "CEJMAT", 2);

			
			insert into curso_disciplina values(7,1,3, "CEJING", 2);
			insert into curso_disciplina values(8,1,3, "CEJING", 3);

			
			insert into curso_disciplina values(10,1,5, "CEJIAE", 2);
			insert into curso_disciplina values(11,1,5, "CEJIAE", 3);

		--Inserir Professores_Cursos_Disciplina
			
			insert into professor_curso_disciplina values(1,1,1,4);
				insert into professor_curso_disciplina values(1,1,1,3);
			insert into professor_curso_disciplina values(2,1,1,1);
			insert into professor_curso_disciplina values(2,1,2,7);
			insert into professor_curso_disciplina values(3,1,3,1);
			insert into professor_curso_disciplina values(4,2,5);
				-- insert into professor_curso_disciplina values(1,1,1);
				-- insert into professor_curso_disciplina values(2,1,2);
				-- insert into professor_curso_disciplina values(3,1,3);
				-- insert into professor_curso_disciplina values(4,2,5);

		--Inserir Alunos
			insert into aluno values(1, "Allicia", "Luanda", 1);
			insert into aluno values(2, "Rosa", "Zaire", 1);
			insert into aluno values(3, "Amelia", "Namibe", 2);
			insert into aluno values(4, "Amelia", "Namibe", 2);

		--Inserir Trimestre
			insert into trimestre values (1, "1º Trimestre");
			insert into trimestre values (2, "2º Trimestre");
			insert into trimestre values (3, "3º Trimestre");
		
		--Inserir Trimestre_Curso_Disciplina			
				--Ano 10
					insert into trimestre_curso_disciplina values (1, 1, 1);
					insert into trimestre_curso_disciplina values (2, 1, 2);
					insert into trimestre_curso_disciplina values (3, 1, 3);
					insert into trimestre_curso_disciplina values (4, 1, 4);
					insert into trimestre_curso_disciplina values (5, 1, 5);
					insert into trimestre_curso_disciplina values (6, 1, 6);
					insert into trimestre_curso_disciplina values (7, 1, 7);
					insert into trimestre_curso_disciplina values (8, 1, 8);
					insert into trimestre_curso_disciplina values (9, 1, 9);
					insert into trimestre_curso_disciplina values (10, 1, 10);
				
					insert into trimestre_curso_disciplina values (11, 2, 1);
					insert into trimestre_curso_disciplina values (12, 2, 2);
					insert into trimestre_curso_disciplina values (13, 2, 3);
					insert into trimestre_curso_disciplina values (14, 2, 4);
					insert into trimestre_curso_disciplina values (15, 2, 5);
					insert into trimestre_curso_disciplina values (16, 2, 6);
					insert into trimestre_curso_disciplina values (17, 2, 7);
					insert into trimestre_curso_disciplina values (18, 2, 8);
					insert into trimestre_curso_disciplina values (19, 2, 9);
					insert into trimestre_curso_disciplina values (20, 2, 10);
				
					insert into trimestre_curso_disciplina values (21, 3, 1);
					insert into trimestre_curso_disciplina values (22, 3, 2);
					insert into trimestre_curso_disciplina values (23, 3, 3);
					insert into trimestre_curso_disciplina values (24, 3, 4);
					insert into trimestre_curso_disciplina values (25, 3, 5);
					insert into trimestre_curso_disciplina values (26, 3, 6);
					insert into trimestre_curso_disciplina values (27, 3, 7);
					insert into trimestre_curso_disciplina values (28, 3, 8);
					insert into trimestre_curso_disciplina values (29, 3, 9);
					insert into trimestre_curso_disciplina values (30, 3, 10);

				insert into trimestre_curso_disciplina values (2, 2, 1);
				insert into trimestre_curso_disciplina values (3, 3, 1);

				insert into trimestre_curso_disciplina values (4, 1, 3);
				insert into trimestre_curso_disciplina values (4, 1, 3);
				insert into trimestre_curso_disciplina values (4, 1, 3);

				insert into trimestre_curso_disciplina values (4, 1, 3);
				insert into trimestre_curso_disciplina values (4, 1, 3);
				insert into trimestre_curso_disciplina values (4, 1, 3);

				insert into trimestre_curso_disciplina values (4, 1, 3);
				insert into trimestre_curso_disciplina values (4, 1, 3);
				insert into trimestre_curso_disciplina values (4, 1, 3);


			insert into trimestre_curso_disciplina values (4, 1, 3);
			insert into trimestre_curso_disciplina values (5, 2, 3);
			insert into trimestre_curso_disciplina values (6, 3, 3);


SELECT curs.Nome_Curso, tur.Nome_Turma, sal.Numero_Sala, sal.Capacidade_Sala from curso curs join sala sal on (curs.Id_Curso = sal.Id_Curso) join turma tur on (sal.Id_Sala = tur.Id_Sala)

-- SELECT prof_curs_disc.Id_Professor_Curso_Disciplina, prof.Nome_Professor, disc.Nome_Disciplina, curs_disc.Cod_Disciplina 
-- FROM professor_curso_disciplina prof_curs_disc 
-- JOIN professor prof ON (prof_curs_disc.Id_Professor = prof.Id_Professor) 
-- JOIN curso_disciplina curs_disc ON (curs_disc.Id_Curso_Disciplina = prof_curs_disc.Id_Curso_Disciplina) 
-- JOIN disciplina disc on (curs_disc.Id_Curso_Disciplina = disc.Id_Disciplina)

	--Saber A disciplina, codigo e o ano que todos os professores lecionam
		SELECT professor.Nome_Professor, disciplina.Id_Disciplina, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, ano.Nome_Ano
		from professor_curso_disciplina
		INNER JOIN professor ON (professor_curso_disciplina.Id_Professor = professor.Id_Professor)
		INNER JOIN curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina) 
		INNER JOIN disciplina ON (curso_disciplina.Id_Disciplina = disciplina.Id_Disciplina)
		INNER JOIN ano ON (curso_disciplina.Id_Ano = ano.Id_Ano)
		--Saber apenas sobre um determinado professor 	
			--where professor.Nome_Professor = "Anderson"
		--Saber o curso
			--curso.Nome_Curso
			--INNER JOIN curso ON (curso_disciplina.Id_Curso = curso.Id_Curso)

			
		--Saber as turmas, sala, disciplinas que um professor dá aulas
			SELECT professor.Nome_Professor, sala.Numero_Sala, turma.Nome_Turma, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, ano.Nome_Ano
			from professor_curso_disciplina
			INNER JOIN professor ON (professor_curso_disciplina.Id_Professor = professor.Id_Professor)
			INNER JOIN curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina) 
			INNER JOIN curso ON (curso_disciplina.Id_Curso = curso.Id_Curso)
			INNER JOIN sala ON (sala.Id_Curso = curso.Id_Curso)
			INNER JOIN turma ON ( turma.Id_Turma = professor_curso_disciplina.Id_Turma)
			INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
			INNER JOIN ano ON (ano.Id_Ano = turma.Id_Ano)
				WHERE professor.Nome_Professor = "Luis" AND turma.Id_Ano = curso_disciplina.Id_Ano


	--Saber as diciplinas de um aluno de acordo com o curso e o ano que frequenta
		SELECT aluno.Nome_Aluno, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, curso.Nome_Curso, curso_disciplina.Id_Ano, curso_disciplina.Id_Curso_Disciplina
		FROM curso_disciplina
		INNER JOIN disciplina ON (curso_disciplina.Id_Disciplina = disciplina.Id_Disciplina)
		INNER JOIN curso ON (curso.Id_Curso = curso_disciplina.Id_Curso)
		INNER JOIN turma ON (turma.Id_Curso = curso.Id_Curso)
		INNER JOIN aluno ON (turma.Id_Turma = aluno.Id_Turma)
			WHERE aluno.Id_Aluno = 6
			where aluno.Nome_Aluno = "Amelia"



	

	--Saber todos os alunos de um determinado professor, bem como as suas turmas turmas, sala, disciplinas que um professor dá aulas
			SELECT aluno.Id_Aluno, aluno.Nome_Aluno, sala.Numero_Sala, turma.Nome_Turma, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, ano.Nome_Ano
			from professor_curso_disciplina
			INNER JOIN professor ON (professor_curso_disciplina.Id_Professor = professor.Id_Professor)
			INNER JOIN curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina) 
			INNER JOIN curso ON (curso_disciplina.Id_Curso = curso.Id_Curso)
			INNER JOIN sala ON (sala.Id_Curso = curso.Id_Curso)
			INNER JOIN turma ON (sala.Id_Sala = turma.Id_Sala)
			INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
			INNER JOIN aluno ON (professor_curso_disciplina.Id_Turma = aluno.Id_Turma)
			INNER JOIN ano ON (ano.Id_Ano = turma.Id_Ano)
				WHERE professor.Id_Professor = 1 AND turma.Id_Ano = curso_disciplina.Id_Ano
				ORDER BY aluno.Id_Aluno
				--Determinada Turma
					--and turma.Nome_Turma = "CEJ10AM"
				--Determinado Curso
					-- AND curso.Id_Curso = 1

	--Selecionar todas as Diciplinas, Codigos e trimestre de TODOS OS CURSOS
			SELECT curso.Nome_Curso, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, trimestre.Nome_Trimestre, ano.Nome_Ano
			FROM curso_disciplina
			INNER JOIN curso ON (curso.Id_Curso = curso_disciplina.Id_Curso)
			INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
			INNER JOIN trimestre_curso_disciplina ON (trimestre_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina)
			INNER JOIN trimestre ON (trimestre.Id_Trimestre = trimestre_curso_disciplina.Id_Trimestre) 
			INNER JOIN ano ON (ano.Id_Ano = curso_disciplina.Id_Ano)
				ORDER BY trimestre.Id_Trimestre

	create table avaliacao (Id_Avaliacao int(10), Id_Aluno int(10) references aluno(Id_Aluno), nota1 int(10), nota2 int(10), nota3 int(10));
		
		create table avaliacao (Id_Avaliacao int(10) auto_increment primary key, Id_Aluno int(10) references aluno(Id_Aluno), 
			Id_Curso_Disciplina int(10) references curso_disciplina(Id_Curso_Disciplina),
			media1 int(10), media2 int(10), media3 int(10));
	
	create table avaliacao_trimestre_curso_disciplina (Id_Avaliacao_Trimestre_Curso int(1), Id_Avaliacao int(10) references avaliacao(Id_Avaliacao), Id_Trimestre_Curso_Disciplina int(10) references trimestre_curso_disciplina(Id_Trimestre_Curso_Disciplina));

	create table avaliacao (Id_Avaliacao int(10), Id_Aluno int(10) references aluno(Id_Aluno), Id_Trimestre_Curso_Disciplina int(10) references trimestre_curso_disciplina(Id_Trimestre_Curso_Disciplina),  nota1 int(10), nota2 int(10), nota3 int(10));

	--Id, Aluno, TCD...
	insert into avaliacao values (1, 1, 1, 10, 11, 8);
	insert into avaliacao values (2, 1, 2, 13, 14, 12);
	insert into avaliacao values (3, 1, 3, 18, 15, 17);
	insert into avaliacao values (4, 1, 4, 8, 11, 8);
	insert into avaliacao values (5, 1, 5, 10, 12, 14);
	insert into avaliacao values (6, 1, 6, 14, 11, 10);
	insert into avaliacao values (7, 1, 7, 14, 14, 13);
	insert into avaliacao values (8, 1, 8, 12, 16, 16);
	insert into avaliacao values (9, 1, 9, 15, 15, 13);
	insert into avaliacao values (10, 1, 10, 14, 15, 14);

	insert into avaliacao values (1, 2, 1, 11, 10, 12);
	insert into avaliacao values (2, 2, 2, 8, 12, 12);
	insert into avaliacao values (3, 2, 3, 10, 10, 11);
	insert into avaliacao values (4, 2, 4, 8, 5, 8);
	insert into avaliacao values (5, 2, 5, 10, 3, 5);
	insert into avaliacao values (6, 2, 6, 9, 10, 10);
	insert into avaliacao values (7, 2, 7, 16, 15, 13);
	insert into avaliacao values (8, 2, 8, 12, 10, 12);
	insert into avaliacao values (9, 2, 9, 8, 11, 13);
	insert into avaliacao values (10, 2, 10, 10, 10, 10);
	

--Pegar todas as avaliacoes de um Aluno
	SELECT aluno.Id_Aluno, aluno.Nome_Aluno, disciplina.Nome_Disciplina, avaliacao.media1, avaliacao.media2, avaliacao.media3
	FROM avaliacao
	INNER JOIN aluno ON (aluno.Id_Aluno = avaliacao.Id_Aluno)
	INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = avaliacao.Id_Curso_Disciplina)
	INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
	WHERE aluno.Id_Aluno = 18


--Saber a nota lancada de todos os alunos, que professor lancou
	SELECT aluno.Id_Aluno, aluno.Nome_Aluno, disciplina.Nome_Disciplina, avaliacao.nota1, avaliacao.nota2, avaliacao.nota3, trimestre.Nome_Trimestre
	FROM avaliacao
	INNER JOIN aluno ON (aluno.Id_Aluno = avaliacao.Id_Aluno)
	INNER JOIN trimestre_curso_disciplina ON (trimestre_curso_disciplina.Id_Trimestre_Curso_Disciplina = avaliacao.Id_Trimestre_Curso_Disciplina)
	INNER JOIN trimestre ON (trimestre.Id_Trimestre = trimestre_curso_disciplina.Id_Trimestre)
	INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = trimestre_curso_disciplina.Id_Curso_Disciplina)
	INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
	INNER JOIN professor_curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina)
	INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
	WHERE professor_curso_disciplina.Id_Turma = aluno.Id_Turma AND professor.Id_Professor = 1

--Pautas de uma turma
	SELECT turma.Nome_Turma, aluno.Id_Aluno, aluno.Nome_Aluno, disciplina.Nome_Disciplina, avaliacao.nota1, avaliacao.nota2, avaliacao.nota3, trimestre.Nome_Trimestre
	FROM avaliacao
	INNER JOIN aluno ON (aluno.Id_Aluno = avaliacao.Id_Aluno)
	INNER JOIN trimestre_curso_disciplina ON (trimestre_curso_disciplina.Id_Trimestre_Curso_Disciplina = avaliacao.Id_Trimestre_Curso_Disciplina)
	INNER JOIN trimestre ON (trimestre.Id_Trimestre = trimestre_curso_disciplina.Id_Trimestre)
	INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = trimestre_curso_disciplina.Id_Curso_Disciplina)
	INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
	INNER JOIN turma ON (turma.Id_Turma = aluno.Id_Turma)
	WHERE turma.Id_Turma = 1 AND disciplina.Id_Disciplina = 1

--Selecionar apenas as turmas que um professor leciona
	SELECT professor.Id_Professor, professor.Nome_Professor, turma.Nome_Turma
	FROM professor_curso_disciplina
	INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
	INNER JOIN turma ON (turma.Id_Turma = professor_curso_disciplina.Id_Turma)
		--Edicao para PHP de acordo com um professor
		SELECT professor.Id_Professor, professor.Nome_Professor, turma.Nome_Turma
		FROM professor_curso_disciplina
		INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
		INNER JOIN turma ON (turma.Id_Turma = professor_curso_disciplina.Id_Turma)
			WHERE professor.Id_Professor = 1


--Todos o nome do professor, bem como a sala, turma, disciplina e codigo, e o ano que ele leciona
			SELECT professor.Nome_Professor, sala.Numero_Sala, turma.Nome_Turma, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, ano.Nome_Ano
			from professor_curso_disciplina
			INNER JOIN professor ON (professor_curso_disciplina.Id_Professor = professor.Id_Professor)
			INNER JOIN curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina) 
			INNER JOIN curso ON (curso_disciplina.Id_Curso = curso.Id_Curso)
			INNER JOIN sala ON (sala.Id_Curso = curso.Id_Curso)
			INNER JOIN turma ON ( turma.Id_Turma = professor_curso_disciplina.Id_Turma)
			INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
			INNER JOIN ano ON (ano.Id_Ano = turma.Id_Ano)
				WHERE professor.Nome_Professor = "Luis" AND turma.Id_Ano = curso_disciplina.Id_Ano


			SELECT  avaliacao.nota1, avaliacao.nota2, avaliacao.nota3, aluno.Id_Aluno, aluno.Nome_Aluno, sala.Numero_Sala, turma.Nome_Turma, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, ano.Nome_Ano
			from professor_curso_disciplina
			INNER JOIN professor ON (professor_curso_disciplina.Id_Professor = professor.Id_Professor)
			INNER JOIN curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina) 
			INNER JOIN curso ON (curso_disciplina.Id_Curso = curso.Id_Curso)
			INNER JOIN sala ON (sala.Id_Curso = curso.Id_Curso)
			INNER JOIN turma ON (sala.Id_Sala = turma.Id_Sala)
			INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
			INNER JOIN aluno ON (professor_curso_disciplina.Id_Turma = aluno.Id_Turma)
			INNER JOIN ano ON (ano.Id_Ano = turma.Id_Ano)
			INNER JOIN trimestre_curso_disciplina ON (trimestre_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina)
			INNER JOIN avaliacao ON (avaliacao.Id_Trimestre_Curso_Disciplina = trimestre_curso_disciplina.Id_Trimestre_Curso_Disciplina)
				WHERE professor.Id_Professor = 1 AND turma.Id_Ano = curso_disciplina.Id_Ano 
				ORDER BY aluno.Id_Aluno		



			SELECT aluno.Nome_Aluno, sala.Numero_Sala, turma.Nome_Turma, disciplina.Nome_Disciplina, curso_disciplina.Cod_Disciplina, ano.Nome_Ano,  avaliacao.nota1, avaliacao.nota2
			from professor_curso_disciplina
			INNER JOIN professor ON (professor_curso_disciplina.Id_Professor = professor.Id_Professor)
			INNER JOIN curso_disciplina ON (professor_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina) 
			INNER JOIN curso ON (curso_disciplina.Id_Curso = curso.Id_Curso)
			INNER JOIN sala ON (sala.Id_Curso = curso.Id_Curso)
			INNER JOIN turma ON (sala.Id_Sala = turma.Id_Sala)
			INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
			INNER JOIN aluno ON (professor_curso_disciplina.Id_Turma = aluno.Id_Turma)
			INNER JOIN ano ON (ano.Id_Ano = turma.Id_Ano)
			INNER JOIN trimestre_curso_disciplina ON (trimestre_curso_disciplina.Id_Curso_Disciplina = curso_disciplina.Id_Curso_Disciplina)
			INNER JOIN avaliacao ON (avaliacao.Id_Trimestre_Curso_Disciplina = trimestre_curso_disciplina.Id_Trimestre_Curso_Disciplina)
				WHERE professor.Id_Professor = 1 AND turma.Id_Ano = curso_disciplina.Id_Ano 
				ORDER BY aluno.Id_Aluno				
		


			select professor.Id_Professor, professor.Nome_Professor, telefone.telefone1,  telefone.telefone2,  telefone.telefone3
			FROM telefone 
			LEFT JOIN professor ON (professor.Id_Professor = telefone.IdProfessor)

			-- Criar a tabela LOGIN
			create table login (Id_Login int(10) auto_increment primary key, nickname varchar(40) not null, password varchar(40) not null, perfil varchar(40) not null);
				INSERT INTO login (nickname, password, perfil) values ("Administrador", "administrador", "administrador");
			--Criar a tabela FUNCIONARIO 
			-- ORDEM => Id_Funcionario, Id_Login, Nome_Funcionario, Grau, Bi_Funcionario, Data_Nascimento, Email_Funcionario, telefone1, telefone2, rua, bairro, cidade, provincia, perfil
				CREATE TABLE funcionario (Id_Funcionario int(10) auto_increment primary key, Id_Login int(10) references login(Id_Login), 
					Nome_Funcionario varchar(40) not null, Grau_Academico varchar(40) not null, Bi_Funcionario varchar(40) not null,  Data_Nascimento DATE not null,
					Email_Funcionario varchar(40), telefone1 int(10) not null,
					rua varchar(40) not null, bairro varchar(40) not null, municipio varchar(40) not null, cidade varchar(40) not null, provincia varchar(40) not null, perfil varchar(20) not null);

				CREATE TABLE professor (Id_Professor int(10) auto_increment primary key, Id_Login int(10) references login(Id_Login), 
					Nome_Professor varchar(40) not null, Grau_Academico varchar(40) not null, Bi_Professor varchar(40) not null,  Data_Nascimento DATE not null,
					Email_Professor varchar(40), telefone1 int(10) not null, rua varchar(40) not null, bairro varchar(40) not null, 
					municipio varchar(40) not null, cidade varchar(40) not null, provincia varchar(40) not null);

			--Criar tabela Matricula
				CREATE TABLE matricula (Id_Matricula int(10) auto_increment primary key, Nome_Aluno varchar(40) not null, Sexo_Aluno varchar(10) not null,
					Filiacao_Primeiro varchar(40) not null, Filiacao_Segundo varchar(40) not null, Naturalidade varchar(40) not null, 
					Provincia varchar(40) not null, Data_Nascimento Date not null,  Bi_Aluno varchar(40) not null, 
					Identificacao_Bi varchar(40) not null, Identificacao_Bi_Data DATE not null, Id_Curso int(10) references curso(Id_Curso), Id_Ano int(10) references ano(Id_Ano));
			--Criar tabela Aluno
				CREATE TABLE aluno (Id_Aluno int(10) auto_increment primary key, Id_Login int(10) references login(Id_Login), Id_Matricula int(10) references matricula (Id_Matricula),
					Id_Turma int(10) references turma(Id_Turma), Nome_Aluno varchar(40) not null, Sexo_Aluno varchar(20) not null, Bi_Aluno varchar(40) not null,  
					Data_Nascimento DATE not null, Email_Aluno varchar(40), telefone1 int(10) not null, rua varchar(40) not null, bairro varchar(40) not null, 
					municipio varchar(40) not null, cidade varchar(40) not null, provincia varchar(40) not null);
				--Criar table Encarregado
				CREATE TABLE encarregado (Id_Encarregado int(10) auto_increment primary key, Nome_Encarregado varchar(40) not null, Profissao varchar(40) not null, 
					Local_Profissao varchar(40), telefone int(10) not null);
				--Criar table Encarregado
				CREATE TABLE encarregado_aluno (Id_Encarregado_Aluno int(10) auto_increment, Id_Encarregado int(10) references encarregado(Id_Encarregado), Id_Aluno int(10)
					references aluno(Id_Aluno), primary key (Id_Encarregado_Aluno, Id_Encarregado, Id_Aluno));

			--Criar tabela TURMA
				CREATE TABLE turma (Id_Turma int(10) auto_increment primary key, Nome_Turma varchar(30) not null, Capacidade_Turma int(10) not null, 
					Id_Curso int(10) references curso(Id_Curso));

				SELECT curso.Sigla FROM curso WHERE curso.Id_Curso = 1

				SELECt Numero_Ano from ano where ano.Id_Ano = 1

	CREATE TABLE turma (Id_Turma int(10) auto_increment primary key, Nome_Turma varchar(40) not null, 
	Capacidade_Turma int(10) not null, Id_Curso int(10) references curso(Id_Curso), Id_Ano int(10) references ano(Id_Ano));




	create table avaliacao (Id_Avaliacao int(10) auto_increment primary key, Id_Aluno int(10) references aluno(Id_Aluno), 
			Id_Curso_Disciplina int(10) references curso_disciplina(Id_Curso_Disciplina),
			media1 int(10), media2 int(10), media3 int(10));

	select * from aluno WHERE Id_Turma = 1

	SELECT Id_Curso_Disciplina from curso_disciplina where Id_Curso = 1 AND Id_Ano = 1;

	-- SELECT aluno.Id_Aluno, aluno.Nome_Aluno, disciplina.Nome_Disciplina, avaliacao.media1, avaliacao.media2, avaliacao.media3
	-- FROM professor_curso_disciplina
	-- INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
	-- INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = professor_curso_disciplina.Id_Curso_Disciplina)
	-- INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
	-- INNER JOIN avaliacao ON (avaliacao.Id_Curso_Disciplina = curso_disciplina.Id_Disciplina)
	-- INNER JOIN aluno ON (aluno.Id_Aluno = avaliacao.Id_Aluno)
	-- 	WHERE professor_curso_disciplina.Id_Turma = aluno.Id_Turma AND professor.Id_Professor = 1


	SELECT aluno.Id_Aluno, aluno.Nome_Aluno, disciplina.Nome_Disciplina
	FROM professor_curso_disciplina
	INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
	INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = professor_curso_disciplina.Id_Curso_Disciplina)
	INNER JOIN aluno ON (aluno.Id_Turma = professor_curso_disciplina.Id_Turma)
	INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
	WHERE professor.Id_Professor = 1

	SELECT aluno.Id_Aluno, aluno.Nome_Aluno, disciplina.Nome_Disciplina, avaliacao.media1, avaliacao.media2, avaliacao.media3
	FROM professor_curso_disciplina
	INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
	INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = professor_curso_disciplina.Id_Curso_Disciplina)
	INNER JOIN aluno ON (aluno.Id_Turma = professor_curso_disciplina.Id_Turma)
	INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
	INNER JOIN avaliacao ON (avaliacao.Id_Aluno = aluno.Id_Aluno)
	WHERE professor.Id_Professor = 1 AND curso_disciplina.Id_Curso_Disciplina = avaliacao.Id_Curso_Disciplina

	SELECT aluno.Id_Aluno, aluno.Nome_Aluno, disciplina.Nome_Disciplina, avaliacao.media1, avaliacao.media2, avaliacao.media3
  FROM professor_curso_disciplina
  INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
  INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = professor_curso_disciplina.Id_Curso_Disciplina)
  INNER JOIN aluno ON (aluno.Id_Turma = professor_curso_disciplina.Id_Turma)
  INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
  INNER JOIN avaliacao ON (avaliacao.Id_Aluno = aluno.Id_Aluno)
  WHERE professor.Id_Professor = 1 AND curso_disciplina.Id_Curso_Disciplina = avaliacao.Id_Curso_Disciplina
  AND disciplina.Id_Disciplina = 1 AND aluno.Id_Turma = 1

	SELECT aluno.Id_Aluno, aluno.Nome_Aluno, aluno.Data_Nascimento, aluno.Sexo_Aluno from aluno where Id_Turma = 1
	
	-- Apresentar alunos de todas uma turma especifica
		SELECT aluno.Id_Aluno, aluno.Nome_Aluno, aluno.Data_Nascimento, aluno.Sexo_Aluno 
		from aluno 
		INNER JOIN turma ON (turma.Id_Turma = aluno.Id_Turma)
		where turma.Id_Turma = 1

	--Apresentar todas as turma, bem como o ID
		SELECT turma.Id_Turma, turma.Nome_Turma FROM turma
	-- Apresentar todos os dados do aluno na CONTA
			-- What I Want?
			-- Numero Matricula, Curso, Ano que frequenta, Turma Actual, 
			-- Nome Aluno, Data Nascimento, Sexo, Filho de...e de..., Naturalidade, Provincia, Bilhete Aluno,
			-- Telefone Aluno, Email Aluno
			-- Rua, Bairro, Municipio, Cidade, Provincia
			-- Nome Encarregado, Profissão, Numero de Telefone

			SELECT matricula.Id_Matricula, curso.Nome_Curso, Ano.Nome_Ano, turma.Nome_Turma,
					aluno.Id_Aluno, aluno.Nome_Aluno, aluno.Data_Nascimento, aluno.Sexo_Aluno, aluno.Bi_Aluno, matricula.Filiacao_Primeiro, matricula.Filiacao_Segundo, matricula.Naturalidade, 
					aluno.telefone1, aluno.Email_Aluno,
					aluno.rua, aluno.bairro, aluno.municipio, aluno.cidade, aluno.provincia,
					encarregado.Nome_Encarregado, encarregado.Profissao, encarregado.telefone
			FROM matricula
			
			INNER JOIN aluno ON (aluno.Id_Matricula = matricula.Id_Matricula)
			INNER JOIN encarregado_aluno ON (encarregado_aluno.Id_Aluno = aluno.Id_Aluno)
			INNER JOIN encarregado ON (encarregado.Id_Encarregado = encarregado_aluno.Id_Encarregado)
			INNER JOIN turma ON (turma.Id_Turma = aluno.Id_Turma)
			INNER JOIN curso ON (curso.Id_Curso = turma.Id_Curso)
			INNER JOIN ano ON (ano.Id_Ano = turma.Id_Ano)
			WHERE aluno.Id_Aluno = 9;


	-- SELECIONAR o NOME do professor, bem como as turma e as disciplinas em que ele leciona
		-- Primeiro pegar todos os professor
		SELECT Id_Professor, Nome_Professor FROM professor

		-- Segundo pegar os dados relativos ao professor
		SELECT professor.Nome_Professor, turma.Nome_Turma, disciplina.Nome_Disciplina
		FROM professor_curso_disciplina
		INNER JOIN professor ON (professor.Id_Professor = professor_curso_disciplina.Id_Professor)
		INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso_Disciplina = professor_curso_disciplina.Id_Curso_Disciplina)
		INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
		INNER JOIN turma ON (turma.Id_Turma = professor_curso_disciplina.Id_Turma)
			WHERE professor.Id_Professor = 1

	-- Pegar todos os dados da tabela Curso_Disciplina
	SELECT curso_disciplina.Id_Curso_Disciplina, curso.Nome_Curso, disciplina.Nome_Disciplina, ano.Nome_Ano
	FROM curso_disciplina
	INNER JOIN curso ON (curso.Id_Curso = curso_disciplina.Id_Curso)
	INNER JOIN disciplina ON (disciplina.Id_Disciplina = curso_disciplina.Id_Disciplina)
	INNER JOIN ano ON (ano.Id_Ano = curso_disciplina.Id_Ano)

	-- Verificar se uma turma pertence a um curso e ano
	SELECT *
	FROM turma 
	WHERE Id_Curso = 1 AND Id_Ano = 1 AND Id_Turma = 1

		SELECT DISTINCT turma.Nome_Turma
		FROM turma 
		INNER JOIN curso_disciplina ON (curso_disciplina.Id_Curso = turma.Id_Curso)
		 WHERE curso_disciplina.Id_Ano = turma.Id_Ano AND Id_Turma = 1

